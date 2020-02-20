
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 pull-left">
            <div class="card">
                <div class=" bg-primary card-header"><strong>{{ __('Edit Project') }}</strong></div>

                <div class="card-body">
                <form method="POST" action="/projects/{{$project->id}}">
                        @csrf
                        @method('PATCH')
                        @include('partials.errors')
                        <hr>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Project Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" value="{{$project->name}}"  class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>


                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Project Description') }}</label>

                                <div class="col-md-6">
                                        <textarea name="description" id="" cols="50" rows="10"
                                         class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                          placeholder="Description" required autofocus>{{$project->description}}
                                            </textarea>


                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-plus-circle"></i>  {{ __('Update') }}
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
                        <li><a href="/projects/{{$project->id}}"><i class="fas fa-eye"></i> View Project</a></li>
                        <li><a href="/projects"><i class="fas fa-list"></i> All projects</a></li>

                      </ol>
                </div>


            </div>
    </div>
</div>
@endsection

