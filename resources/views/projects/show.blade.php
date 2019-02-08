@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-3 pull-left">

                          <section class="jumbotron ">

                              <h1 class="jumbotron-heading">{{ $project->name }}</h1>
                              <p class="lead text-muted">{{ $project->description }}</p>

                          </section>

    {{-- task list --}}
                          <div class="card">
                            <div class="card-header bg-primary">
                             <h2>Tasks</h2>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">List Of task</h4>
                              <p class="card-text"></p>

                                  @foreach ($project->tasks as $task)

                             <table class="table">

                               <tbody>
                                 <tr>
                                   <td scope="row"></td>
                                   <td>
                                      @if ($project->user_id == auth()->user()->id)
                                    <form class="list-group-item">
                                      <label class="checkbox" for="completed">
                                        <input type="checkbox" class="form-check-input" name="completed" id="completed" value="checkedValue" checked>
                                        <a href="/tasks/{{$task->id}}"> {{ $task->body}}

                                      </label>
                                  </form>
                                  @else
                               <strong>   Task being Worked on</strong> : {{ $task->body}}
                                    @endif
                                   </td>

                                 </tr>

                               </tbody>
                             </table>

                                  @endforeach

                              </ul>

                            </div>


                   <div class="card">
                      <h5 class="card-header bg-dark text-white">My Tasks</h5>
                     <div class="card-body">

                        <ul class="list-group list-group-flush">
                            @foreach ($tasksAddedTo as $task)
                            <li class="list-group-item">
                                <a href="/tasks/{{$task->id}}"> <li class="list-group-item"><i class="fas fa-arrow-right"> </i> {{ $task->body}}  &nbsp; &nbsp;- Duration : {{$task->duration}}</li></a>
                            </li>
                            @endforeach
                            @if (empty($task))
                            {{ 'No Data'}}
                             @endif

                          </ul>
                     </div>

                   </div>
           </div>

                              <hr>
                              @include('partials.comments')
                              <hr>

                    <div class="bg-white container-fluid">
                    <form method="post" action="{{route('comments.store')}}">
                          @csrf

                          <input type="hidden" name="commentable_type" value="App\Project">
                          <input type="hidden" name="commentable_id" value="{{$project->id}}">

                    <div class="form-group">
                      <label for="comment-content"><strong>Comment</strong></label>
                      <textarea type="text" name="body" id="comment-content"
                      spellcheck="false" style="resize:vertical" rows="1"
                      class="form-control autosize-target text-left" placeholder="Enter Comment"
                      aria-describedby="helpId">
                      </textarea>

                    </div>
                    <div class="form-group">
                        <label for="comment-content"><strong>Proof of Work done </strong>(Url/Photos)</label>
                        <textarea type="text" name="url" id="comment-content"
                        spellcheck="false" style="resize:vertical" rows="2"
                        class="form-control autosize-target text-left" placeholder="Enter Url or Screenshots"
                        aria-describedby="helpId">
                        </textarea>

                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-2 offset-md-0">
                              <button type="submit" class="btn btn-primary">
                                Comment
                              </button>

                          </div>
                      </div>

                      </form>

                    </div>
                    <hr>


            </div>


              <div class="col-md-3 col-lg-3 col-sm-3 pull-right">
                    <div class=" card p-3 mb-3 bg-light rounded">
                      <h4 >Manage</h4>
                      <ol class="list-unstyled">
                            <li><a href="/projects"><i class="fas fa-list"></i> List Projects</a></li>

              @if ($project->user_id == auth()->user()->id)
                            <li><a href="/projects/{{$project->id}}/edit"><i class="fas fa-edit"></i> Edit Project</a></li>
                            <br>

                          <li>

                            <a href="#"
                            onclick="
                            var result =confirm('Are you sure you want to delete this Project?');
                            if(result){
                                event.preventDefault();
                                document.getElementById('delete-form').submit();
                                }"
                            >
                            <i class="fas fa-minus-circle"></i> Delete Project</a>
                            <form id="delete-form" action="/projects/{{$project->id}}" method="post" display="none">
                                @csrf
                                @method('DELETE')
                                </form>
                        </li>

                            <hr>
                     <li><a href="/tasks/create/{{$project->id}}"><i class="fas fa-list"></i> Add Task</a></li>
                          </ol>

                          @include('partials.errors')
                          @include('partials.error')
                          <h4>Add member</h4>

                              <form id="add-user" method="post" action="{{route('projects.adduser')}}">
                                  @csrf
                         <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" aria-describedby="basic-addon2" required>
                                  <input type="hidden" name="project_id" value="{{$project->id}}">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary" type="submit">Add</button>
                            </div>
                          </div>
                              </form>

                             @endif
                    <h5>Team Members</h5>
                      <ol class="list-unstyled">
                        @foreach ($project->addedUsers as $user)
                        <li><a href="/projects"> {{ $user->name }}</a>

                          @if ($project->user_id == auth()->user()->id)
                         <a href="#"
                         onclick="
                         var result =confirm('Are you sure you want to delete this User?');
                         if(result){
                             event.preventDefault();
                             document.getElementById('delete-user').submit();
                             }"
                         >
                         <i class="fas fa-minus-circle"></i></a>
                         <form id="delete-user" action="/projects/{{$project->id}}/deleteuser" method="post" display="none">
                             @csrf
                             @method('DELETE')
                             <input type="hidden" name="project_id" value="{{$project->id}}">
                             <input type="hidden" name="user_id" value="{{$user->id}}">
                             </form>
                             @endif
                        </li>

                        @endforeach


                      </ol>
                    </div>



                </div>
</div>
            {{-- Comment section starts --}}
</div>



@endsection
