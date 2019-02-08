
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">

                {{--  --}}
                <div class="card-header"><strong>Create Task</strong></div>

                <div class="card-body">
                <form method="POST" action="/tasks">
                        @csrf
                        @include('partials.errors')
                        <hr>


                <input hidden type="text" name="project_id" value="{{ $task->project->id}}">


                        <div class="form-group">
                           
                                <textarea name="body" id=""  rows="3"
                                            spellcheck="false" style="resize:vertical" rows="2"
                                            class="form-control autosize-target text-left"
                                            placeholder="Enter description"
                                            required autofocus>{{old('body')}}
                                </textarea>

                        </div>
                        <div class="input-group mb-3">
                            <input type="text"  name="duration" placeholder="Duration" aria-describedby="basic-addon2"  value="{{ old('duration')}}" >

                            </div>


                            <div class="input-group mb-3">
                             <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-plus-circle"></i>  Create Task
                                        </button>

                                    </div>




                    </form>
                </div>
            </div>

            <br><hr>


        </div>

        <div class="col-md-3 col-lg-3 col-sm-3 pull-right">
                <div class=" card p-3 mb-3 bg-light rounded">
                  <h4 >Manage</h4>
                  <ol class="list-unstyled">
                        <li><a href="/tasks"><i class="fas fa-list"></i> List tasks</a></li>


                      </ol>
                </div>



            </div>


    </div>
</div>
@endsection

