
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">

                {{--  --}}
                <div class="card-header"><strong>Create Project</strong></div>

                <div class="card-body">
                <form method="POST" action="/projects">
                        @csrf
                        @include('partials.errors')
                        <hr>
                    

                        <div class="form-group ">
                            <label for="name" >Name</label>

                            <input id="name" type="name" 
                            placeholder="Enter Name"
                             class="form-control" name="name"
                              value="{{ old('name') }}" required autofocus>

                     
                            
                        </div>
                      
                        @if ($companies != null)
                        <div class="form-group">
                              <label for="company-content">Select Company</label>
                              <label for=""></label>
                              <select  class="form-control" name="company_id" id="company-content">
                                      @foreach ($companies as $company)
                                      <option value=" {{ $company->id }}">   {{ $company->name }} </option>
                                  @endforeach
                           
                              </select>
                         </div>
                                 
                        @endif   
                        @if ($companies == null)

                            <input type="hidden" name="company_id" value="{{$company_id}}">

                        @endif   


                            
                            
                            
                            <div class="form-group">
                                <label for="description" >Description</label>
                                    <textarea name="description" id=""  rows="3" 
                                                spellcheck="false" style="resize:vertical" rows="2"
                                                class="form-control autosize-target text-left"
                                                placeholder="Enter Description" 
                                                required autofocus>{{old('description')}}
                                    </textarea>
                  
                            </div>

                            <div class="form-group">
                                    
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-plus-circle"></i>  Create Project
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
                        <li><a href="/projects"><i class="fas fa-list"></i> List Projects</a></li>
                       
                      
                      </ol>
                </div>
          
          
       
            </div>
            
        
    </div>
</div>
@endsection

