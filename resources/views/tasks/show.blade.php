@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-3 pull-left">

                          <section class="jumbotron ">

                              <h1 class="jumbotron-heading">{{ $task->body }}</h1>
                              <p class="lead text-muted">{{ $task->duration }}</p>

                          </section>

                              <hr>
                              @include('partials.comments')
                              <hr>

                    <div class="bg-white container-fluid">
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
                            <li><a href="/tasks"><i class="fas fa-list"></i> List tasks</a></li>

                            @if ($task->user_id == auth()->user()->id)
                            <li><a href="/tasks/{{$task->id}}/edit"><i class="fas fa-edit"></i> Edit task</a></li>
                            <br>

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
                          <h4>Add member</h4>

                              <form id="add-user" method="post" action="{{route('tasks.adduser')}}">
                                  @csrf
                         <div class="input-group mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Email" aria-describedby="basic-addon2" required>
                                  <input type="hidden" name="task_id" value="{{$task->id}}">
                            <div class="input-group-append">
                              <button class="btn btn-outline-secondary" type="submit">Add</button>
                            </div>
                          </div>
                              </form>

                              @endif
                    <h5>Team Members</h5>
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
                         <form id="delete-user" action="/tasks/{{$task->id}}" method="post" display="none">
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
            {{-- Comment section starts --}}

</div>


@endsection
