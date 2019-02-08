
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">

                {{--  --}}
                <div class="card-header"><strong>Create Task</strong></div>

                <div class="card-body">
                <form method="POST" action="/tasks/{{$task->id}}">
                        @csrf
                        @method('PUT')
                        @include('partials.errors')
                        <hr>

 
                            
                        <div class="form-group">
                            <label for="body" >Description</label>
                                <textarea name="body" id=""  rows="3" 
                                            spellcheck="false" style="resize:vertical" rows="2"
                                            class="form-control autosize-target text-left"
                                            placeholder="Enter body" 
                                            required autofocus>{{$task->body}}
                                </textarea>
              
                        </div>

                            <div class="input-group mb-3">
                                <input type="text"  name="duration" placeholder="Duration" aria-describedby="basic-addon2"  value="{{ $task->duration}}" >
                         
                                </div>
                         

                            <div class="form-group">
                                    
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-plus-circle"></i>  Update
                                        </button>
        
                                    </div>
                        

            
               
                    </form>
                </div>
            </div>
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

