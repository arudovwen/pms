@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 pull-left">
                <div class="card zone">
                <div class="card-header bg-primary">
                 <h2>Companies</h2>
                </div>
                <div class="card-body">
                  <h5 class="card-title">List Of Companies</h5>
                  <p class="card-text"></p>
                  <ul class="list-group list-group-flush">
                      @foreach ($companies as $company)
                  <a href="/companies/{{$company->id}}"> <li class="list-group-item"><i class="fas fa-arrow-right"></i> {{ $company->name}} </li></a>
                      @endforeach
                      @if (empty($company))
                      {{ 'No Data'}}
                       @endif

                  </ul>

                </div>
              </div>
        </div>


<div class="col-md-3 col-lg-3 col-sm-3 pull-right">
        <div class=" card p-3 mb-3 bg-light rounded zone">
          <h4 >Manage</h4>
          <ol class="list-unstyled">

                <li><a href="/companies/create"> <i class="fas fa-plus-circle"></i> Add Company  </a></li>
              </ol>
        </div>



    </div>

</div>
</div>

@endsection
