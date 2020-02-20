
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class=" bg-primary card-header">Create Company</div>

                <div class="card-body">
                <form method="POST" action="/companies">
                        @csrf
                        @include('partials.errors')
                        <hr>


                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-8">
                            <input id="name" type="name"
                             class="form-control" name="name"
                              value="{{ old('name') }}" required autofocus>


                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>

                                <div class="col-md-8">
                                        <textarea name="description" id="" cols="50" rows="10"
                                         class="form-control"
                                         required autofocus>{{old('description')}}
                                            </textarea>



                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-plus-circle"></i> Create Company
                                        </button>

                                    </div>
                                </div>



                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-lg-3 col-sm-3 pull-right">
                <div class=" card p-3 mb-3 bg-light rounded">
                  <h4 >Manage</h4>
                  <ol class="list-unstyled">
                        <li><a href="/companies"><i class="fas fa-list"></i> List Companies</a></li>


                      </ol>
                </div>



            </div>


    </div>
</div>
@endsection

