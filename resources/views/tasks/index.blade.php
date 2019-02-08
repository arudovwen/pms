@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 pull-left">
                <div class="card border-primary">
                <div class="card-header bg-primary ">
                <h4><strong>My Tasks  </strong></h4>
                
                </div>
                <div class="card-body">
                  <h5 class="card-title"><strong>Tasks Created</strong></h5>
                  <p class="card-text">
                  <ul class="list-group list-group-flush">
                      @foreach ($tasks as $task)
                         <a href="/tasks/{{$task->id}}"> <li class="list-group-item"><i class="fas fa-arrow-right"> </i> {{ $task->body}}  &nbsp; &nbsp;- Duration : {{$task->duration}}</li></a>
                       
                      @endforeach
                        
                      @if (empty($task))
                     {{ 'No Data'}}
                   @endif
                   
                  </ul>
                </p>
                  <h5 class="card-title"> <strong>Tasks Added To</strong></h5>
                  <p class="card-text">
                  <ul class="list-group list-group-flush">
                      @foreach ($tasksAddedTo as $task)
                      <a href="/tasks/{{$task->id}}"> <li class="list-group-item"><i class="fas fa-arrow-right"> </i> {{ $task->body}}  &nbsp; &nbsp;- Duration : {{$task->duration}}</li></a>
                      @endforeach
                      @if (empty($task))
                      {{ 'No Data'}}
                    @endif
                    
                  </ul>
                </p>
                
                </div>
              </div> 
</div>

</div>
</div>

@endsection
