@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-3 pull-left">

                          <section class="jumbotron zone">

                              <h1 class="jumbotron-heading">{{ $task->body }}</h1>
                              <p class="lead text-muted">{{ $task->duration }}</p>

                              @if ($task->completed)
                              <strong>Status:</strong> <button type="button" class="btn btn-success btn-sm">completed</button>
                                @else
                              <strong>Status:</strong> <button type="button" class="btn btn-info btn-sm">open</button>
                              @endif

                          </section>



                          @include('partials.comments')

                    <div class=" bg-primary container-fluid">

                    <form method="post" action="{{route('comments.store')}}">
                          @csrf

                          <input type="hidden" name="commentable_type" value="App\task">
                          <input type="hidden" name="commentable_id" value="{{$task->id}}">

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
                              <button type="submit" class="btn btn-default">
                                Comment
                              </button>


                          </div>
                      </div>

                      </form>

                    </div>
                    <hr>


            </div>

{{-- side navigation starts here--}}
              <div class="col-md-3 col-lg-3 col-sm-3 pull-right ">
                    <div class=" card p-3 mb-3 bg-light rounded zone">
                      <h4 >Manage</h4>
                      <ol class="list-unstyled">
                      <li><a href="/projects/{{$task->project->id}}"><i class="fas fa-list"></i> Back to project</a></li>
                                <hr>
                            <li><a href="/tasks"><i class="fas fa-list"></i> List tasks</a></li>

                            @if ($task->user_id == auth()->user()->id)

                            <form method="POST" action="/tasks/{{$task->id}}">
                                @csrf
                                @method('PUT')
                                @include('partials.errors')
                                <hr>

                                    <div class="input-group mb-3">
                                        <input type="hidden"  name="completed" placeholder="Duration" aria-describedby="basic-addon2"  value="true" >

                                        </div>

                                    <div class="form-group">

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-plus-circle"></i>  Mark as Complete
                                                </button>

                                            </div>
                            </form>

                          <li>

                            <a href="#"
                            onclick="
                            var result =confirm('Are you sure you want to delete this task?');
                            if(result){
                                event.preventDefault();
                                document.getElementById('delete-form').submit();
                                }"
                            >
                            <i class="fas fa-minus-circle"></i> Delete task</a>
                            <form id="delete-form" action="/tasks/{{$task->id}}" method="post" display="none">
                                @csrf
                                @method('DELETE')
                                </form>
                        </li>

                            <hr>

                          </ol>
                          @include('partials.errors')
                          @include('partials.error')
                          <h5>Add member</h5>

                              <form id="add-user" method="post" action="{{route('tasks.adduser')}}">
                                  @csrf
                         <div class="input-group mb-3">
                            <div class="form-group ">
                                <select name="email" id=""  class="form-control">
                                    <option value="#"> Select</option>
                                    @foreach ($users as $user)
                                    <option value="{{$user->email}}">{{$user->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                                  <input type="hidden" name="task_id" value="{{$task->id}}">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary form-control" type="submit">Add</button>
                            </div>
                          </div>
                              </form>

                              @endif
                    <h5>Task Members</h5>
                      <ol class="list-unstyled">
                        @foreach ($task->addedUsers as $user)
                        <li><a href="/tasks"> {{ $user->name }}</a>
                          @if ($task->user_id == auth()->user()->id)
                         <a href="#"
                         onclick="
                         var result =confirm('Are you sure you want to delete this User?');
                         if(result){
                             event.preventDefault();
                             document.getElementById('delete-user').submit();
                             }"
                         >
                         <i class="fas fa-minus-circle"></i></a>
                         <form id="delete-user" action="/tasks/{{$task->id}}/deleteuser" method="post" display="none">
                             @csrf
                             @method('DELETE')
                             <input type="hidden" name="task_id" value="{{$task->id}}">
                             <input type="hidden" name="user_id" value="{{$user->id}}">
                             </form>
                             @endif
                        </li>

                        @endforeach


                      </ol>
                    </div>



                </div>
</div>


</div>


@endsection
