<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Company;
use App\Project;
use App\TaskUser;
use Illuminate\Http\Request;
use App\Notifications\EditedTask;
use App\Notifications\TaskedUser;
use App\Notifications\CreatedTask;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Task $task, User $user)
    {

        if (auth()->check()) {

            $tasksAddedTo= auth()->user()->tasksAddedTo;
            $tasks= auth()->user()->tasks;



                  return view('tasks.index', compact('tasks', 'tasksAddedTo'));

           }

          return view('auth.login');
      }


public function adduser(Request $request)
{
    $task = Task::findorfail(request('task_id'));
    if (auth()->user()->id == $task -> user_id) {
        request()->validate([
            'email'=> ['required','min:3'],

        ]);
      $user= User::where('email', request('email'))->first();
      if(!$user){

        return back()
                 ->with('error',  request('email').' is not registered');
    }

      $taskUser = TaskUser::where('task_id',$task->id)
                                ->where('user_id', $user->id)->first();

      if($taskUser){

            return back()
                 ->with('error',  request('email').' is already a member');
      }


        if ($user && $task) {
         $task-> addedUsers()->attach($user->id);
         $users = auth()->user();
         $users->notify(new TaskedUser($task, $user));

         return redirect()->back()
         ->with('success', request('email').' was added successfully');
        }
    }
    return back();

   }

public function deleteuser(Request $request){

       $task = Task::findorfail(request('task_id'));
       $user= User::where('id', request('user_id'))->first();

            $task-> addedUsers()->detach($user);

            return back() ->with('success', $user->email.' was deleted successful');
           }




    public function create( )
    {

       $task = Task::first();


        return view('tasks.create', compact( 'task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $attributes = request(['body','duration','project_id' ]);
        $attributes['user_id'] = auth()->id();

        if(auth()->check()){
        $task = Task::create($attributes);

        if ($task){
            $user = auth()->user();
            $user->notify(new CreatedTask($task, $user));
          return redirect()->route('tasks.show', ['task'=>$task->id])->with('success', 'task created successful');
        }
        }else{
          return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task, User $user )
    {

         $users = User::all();
         $taskUser = TaskUser::all();
         $comments = $task->comments;

        return view('tasks.show', compact('task', 'comments','taskUser','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return  view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {

        // $task->update(request(['completed']));
        $task->completed = 1;
        $task->save();

        if ($task){
            $user = auth()->user();
            $user->notify(new EditedTask($task,$user));
          return back()->with('success', 'Task Update successful');
        }else{
          return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        if ($task){
        return redirect('/tasks')->with('success', 'Task deleted successful');
    }else{
        return redirect()->back()->withInput();
      }

    }
}
