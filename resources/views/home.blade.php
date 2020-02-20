@extends('layouts.app')

@section('content')
 @include('partials.success')



<!------ Include the above in your HEAD tag ---------->

<div class="container" >
    <div class="row" style="justify-content:center">
        <div class="col-lg-9 col-md-12 col-sm-8 col-xs-9 bhoechie-tab-container zone " >
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <ul class="list-group">
                <a href="#" class="list-group-item active">
                  <br/><br/><i class="glyphicon glyphicon-home"></i> Home<br/><br/>
                  </a>

                <a href="#" class="list-group-item ">
                  <br/><br/><i class="glyphicon glyphicon-th-list"></i> Projects<br/><br/>
                </a>
                <a href="#" class="list-group-item">
                  <br/><br/><h4 class="glyphicon glyphicon-wrench"></h4> Edit My Information<br/><br/>
                </a>
              </ul>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab" style="text-align:center">
                <!-- flight section -->
                <div class="bhoechie-tab-content active">
                    <div>
                      <h1 class="glyphicon glyphicon-user" style="font-size:14em;color:#00001a"></h1>
                      <h2 style="margin-top: 0;color:#00001a">Welcome {{auth()->user()->first_name}}</h2>
                      <h3 style="margin-top: 0;color:#00001a">User HomePage</h3>
                    </div>
                </div>


        

                <div class="bhoechie-tab-content">
                    <div>
                      <h1 class="glyphicon glyphicon-th-list" style="font-size:12em;color:#00001a"></h1>
                      <h2 style="margin-top: 0;color:#00001a"><a href="/projects" class="btn  btn-primary btn-block" role="button">My Projects</a></h2>
                      <h2 style="margin-top: 0;color:#00001a">Projects </h2>
                    </div>
                </div>

                <div class="bhoechie-tab-content">
                    <div>
                      <h1 class="glyphicon glyphicon-edit" style="font-size:12em;color:#00001a"></h1>
                      <h2 style="margin-top: 0;color:#00001a"><a href="#" class="btn  btn-primary btn-block" role="button">Edit</a></h2>
                      <h2 style="margin-top: 0;color:#00001a">information Settings</h2>
                    </div>
                </div>
            </div>
        </div>
  </div>

</div>
@endsection
