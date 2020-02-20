<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Company;
use App\Project;
use App\TaskUser;
use App\ProjectUser;
use Illuminate\Http\Request;
use App\Notifications\CreateProject;
use App\Notifications\EditedProject;
use App\Notifications\ProjectedUser;

class ProjectsController extends Controller
{
    public function index(Project $project, User $user)
    {
        if (auth()->check()) {
            $projectsAddedTo = auth()->user()->projectsAddedTo;
            $projects = auth()->user()->projects;


            return view('projects.index', compact('projects', 'projectsAddedTo'));
        }

        return view('auth.login');
    }

    public function adduser(Request $request)
    {
        $project = Project::findorfail(request('project_id'));
        if (auth()->user()->id == $project->user_id) {
            request()->validate([
                'email' => ['required', 'min:3'],

            ]);
            $user = User::where('email', request('email'))->first();
            if (!$user) {
                return back()
                    ->with('error', request('email') . ' is not registered');
            }

            $projectUser = ProjectUser::where('project_id', $project->id)
                ->where('user_id', $user->id)->first();

            if ($projectUser) {
                return back()
                    ->with('error', request('email') . ' is already a member');
            }


            if ($user && $project) {
                $project->addedUsers()->attach($user->id);
                $users = auth()->user();
                $users->notify(new ProjectedUser($project, $user));

                return redirect()->route('projects.show', ['project' => $project->id])
                    ->with('success', request('email') . ' was added successfully');
            }
        }
        return back();
    }

    public function deleteuser(Request $request)
    {
        $project = Project::findorfail(request('project_id'));
        $user = User::where('id', request('user_id'))->first();

        $project->addedUsers()->detach($user);

        return back()->with('success', $user->email . ' was deleted successful');
    }



    public function create($company_id = null)
    {
        $companies = null;
        if (!$company_id) {
            $companies = auth()->user()->companies;
        }

        return view('projects.create', ['company_id' => $company_id, 'companies' => $companies]);
    }
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required', 'min:3'],
            'description' => 'required'

        ]);
        $attributes = request(['name', 'description', 'company_id']);
        $attributes['user_id'] = auth()->id();
        if (auth()->check()) {
            $project = Project::create($attributes);

            if ($project) {
                $user = auth()->user();
                $user->notify(new CreateProject($project, $user));
                return redirect()->route('projects.show', ['project' => $project->id])->with('success', 'Project created successful');
            }
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\    Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, User $user, Task $task)
    {
        $tasks = auth()->user()->tasks;
        $tasksAddedTo = auth()->user()->tasksAddedTo;
        $users = User::all();

        $comments = $project->comments;
        return  view('projects.show', compact('project', 'users', 'comments', 'tasks', 'tasksAddedTo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\    Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return  view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\    Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        request()->validate([
            'name' => ['required', 'min:3'],
            'description' => 'required'

        ]);
        $project->update(request(['name', 'description']));
        if ($project) {
            $user = auth()->user();
            $user->notify(new EditedProject($project, $user));
            return redirect()->route('projects.show', compact('project'))->with('success', 'Project Update successful');
        } else {
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\    Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        if ($project) {
            return redirect('/projects')->with('success', 'Project deleted successful');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
