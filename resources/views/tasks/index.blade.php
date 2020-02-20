@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 pull-left ">
                <div class="card  zone">
                <div class="card-header bg-primary ">
                <h4><strong>My Tasks  </strong></h4>

                </div>
                <div class="card-body">
                  <h5 class="card-title"><strong>Tasks Created</strong></h5>
                  <p class="card-text">
                      <table class="table table-striped">
                          <tbody>
                                @foreach ($tasks as $task)
                              <tr>

                                  <td>
                                    @if ($task->completed)
                                    <a href="/tasks/{{$task->id}}"> {{ $task->body}}  &nbsp; &nbsp;- Duration : {{$task->duration}}</a>  <button type="button" class="btn btn-success btn-sm">completed</button>
                                    @else
                                    <a href="/tasks/{{$task->id}}"> {{ $task->body}}  &nbsp; &nbsp;- Duration : {{$task->duration}}</a> &nbsp; <button type="button" class="btn btn-info btn-sm">open</button>
                                    @endif
                                    @if (empty($task))
                                    {{ 'No Data'}}
                                  @endif
                                </td>

                              </tr>
                              @endforeach
                          </tbody>
                      </table>

                  <h5 class="card-title"> <strong>Tasks Added To</strong></h5>
                  <p class="card-text">
                  <ul class="list-group list-group-flush">
                        <table class="table table-striped">
                                <tbody>
                      @foreach ($tasksAddedTo as $task)
                      <tr>

                         <td>
                                @if ($task->completed)
                                {{ $task->body}}  &nbsp; &nbsp;- Duration : {{$task->duration}} <button type="button" class="btn btn-success btn-sm">completed</button>
                                @else
                                <a href="/tasks/{{$task->id}}"> {{ $task->body}}  &nbsp; &nbsp;- Duration : {{$task->duration}}</a>
                                @endif

                              @if (empty($task))
                              {{ 'No Data'}}
                            @endif
                          </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
              </div>
</div>

</div>
</div>

@endsection
