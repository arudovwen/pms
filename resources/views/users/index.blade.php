@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 pull-left">
                <div class="card  zone">
                <div class="card-header bg-primary ">
                <h4>Users</h4>

                </div>
                <div class="card-body">
                  <h5 class="card-title">List Of Users</h5>
                  <p class="card-text"></p>
                  <ul class="list-group list-group-flush">
                      @foreach ($users as $user)
                    <a href="/users/{{$user->id}}"> <li class="list-group-item"><i class="fas fa-user-circle"></i> {{$user->name.' - '. $user->role->name}} </li></a>
                      @endforeach

                  </ul>

                </div>
              </div>
</div>

    </div>
</div>
</div>

@endsection
