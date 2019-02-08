@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 pull-left">
                <div class="card border-primary">
                <div class="card-header bg-primary ">
                <h4><strong>Projects  </strong></h4>
                
                </div>
                <div class="card-body">
                  <h5 class="card-title"><strong>Projects Created</strong></h5>
                  <p class="card-text">
                  <ul class="list-group list-group-flush">
                      @foreach ($projects as $project)
                         <a href="/projects/{{$project->id}}"> <li class="list-group-item"><i class="fas fa-arrow-right"> </i> {{ $project->name}} </li></a>
                       
                      @endforeach
                        
                      @if (empty($project))
                     {{ 'No Data'}}
                   @endif
                   
                  </ul>
                </p>
                  <h5 class="card-title"> <strong>Projects Added To</strong></h5>
                  <p class="card-text">
                  <ul class="list-group list-group-flush">
                      @foreach ($projectsAddedTo as $project)
                      @if (!empty($project))
                      <a href="/projects/{{$project->id}}"> <li class="list-group-item"><i class="fas fa-arrow-right"></i> {{ $project->name}}</li></a>
                      @else
                      {{ 'No Data'}}
                      @endif
                        
                      @endforeach
                     
                    
                  </ul>
                </p>
                
                </div>
              </div> 
</div>


<div class="col-md-3 col-lg-3 col-sm-3 pull-right">
        <div class=" card p-3 mb-3 bg-light rounded">
          <h4 >Manage</h4>
          <ol class="list-unstyled">
            
          <li><a href="/projects/create"><i class="fas fa-plus-circle"></i> Add Project</a></li>
           
              </ol>
        </div>
  
  

    </div>
</div>
</div>

@endsection
