@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-3 pull-left">

                <section class="jumbotron  zone">

                    <h1 class="jumbotron-heading">{{ $company->name }}</h1>
                    <p class="lead text-muted">{{ $company->description }}</p>
                    <p>
                      <a class="btn btn-primary my-2" href="#">Main call to action</a>
                      <a class="btn btn-secondary my-2" href="#">Secondary action</a>
                    </p>

                </section>

                <div class="album py-5 bg-light zone">
                        <h3 style="text-align:center; ">Projects</h3>
                        <hr>
               <div class="container">
                    <div class="row">

                            @foreach ($company->projects as $project)

                          <div class="col-md-4 ">
                                <div class="card mb-4 shadow-sm">
                                                <h3 class="card-header text-center">
                                                 {{ $project->name }}
                                                </h3>

                                  <div class="card-body">
                                    <p class="card-text"> {{ $project->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                      <div class="btn-group">
                                     <div> <a href="/projects/{{$project->id}}"> <button class="btn btn-sm btn-primary" type="button">View <i class="fas fa-eye"></i></button></a></div>&nbsp;&nbsp;
                                    <div>  <a href="/projects/{{$project->id}}/edit"> <button class="btn btn-sm btn-secondary" type="button">Edit <i class="fas fa-edit"></i></button></a></div>
                                      </div>
                                      <small class="text-muted">9 mins</small>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            @endforeach


                        </div>
               </div>


                </div>

            </div>
              <div class="col-md-3 col-lg-3 col-sm-3 pull-right">
                    <div class=" card p-3 mb-3 bg-light rounded">
                      <h4 >Manage</h4>
                      <ol class="list-unstyled">
                            <li><a href="/companies"><i class="fas fa-list"></i> List Companies</a></li>
                            <li><a href="/companies/{{$company->id}}/edit"><i class="fas fa-edit"></i> Edit Company</a></li>
                            <br>
                            <li>

                                <a href="#"
                                onclick="
                                var result =confirm('Are you sure you want to delete this Company?');
                                if(result){
                                    event.preventDefault();
                                    document.getElementById('delete-form').submit();
                                    }"
                                ><i class="fas fa-minus-circle"></i> Delete Company</a>
                                <form id="delete-form" action="/companies/{{$company->id}}" method="post" display="none">
                                    @csrf
                                    @method('DELETE')
                                    </form>
                            </li>
                            <hr>
                            <li><a href="/projects/create/{{$company->id}}"><i class="fas fa-plus-circle"></i> Add Project</a></li>

                          </ol>
                    </div>



                </div>
</div>
@endsection
