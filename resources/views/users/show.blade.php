@extends('layouts.app')

@section('content')


<div  class=" container ">
    <div class="col-md-12">

    <div class="row">


                           <div class="col-lg-6">
                                 <div class="card mb-4 shadow-sm zone">
                                                 <h3 class="card-header text-center">
                                                  {{ $user->name }}
                                                 </h3>

                                   <div class="card-body">
                                     <p class="card-text">User Name : {{ $user->name }}</p>
                                     <p class="card-text">Permission :  {{ $user->role->name }}</p>

                                     <div class="d-flex justify-content-between align-items-center">
                                       <div class="btn-group">


                                            <a href="#"
                                            onclick="
                                            var result =confirm('Are you sure you want to delete this User?');
                                            if(result){
                                                event.preventDefault();
                                                document.getElementById('delete-form').submit();
                                                }"
                                            ><i class="fas fa-minus-circle"></i> Delete User</a>
                                            <form id="delete-form" action="/users/{{$user->id}}" method="post" display="none">
                                                @csrf
                                                @method('DELETE')
                                                </form>
                                                <br>


                                     </div>

                                 </div>
                                 <hr>
                                 <p> <a href="/users"> <i class="fas fa-arrow-left"></i> Back</a></p>
                               </div>

                         </div>



                </div>



                                   <div class="col-lg-6">
                                         <div class="card mb-4 shadow-sm zone">
                                                         <h3 class="card-header text-center">
                                                          Change Access Role
                                                         </h3>

                                           <div class="card-body">

                                             <div class="d-flex justify-content-between align-items-center">
                                               <div class="btn-group">
                                                    <form action="/users/{{$user->id}}" method="post">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="form-group">

                                                          <select class="form-control" disabled name="user_id" id="users">

                                                          <option value="{{$user->id}}">{{$user->name}}</option>


                                                          </select>
                                                        </div>
                                                        <div class="form-group">

                                                              <select class="form-control" name="role_id" id="users">
                                                              @foreach ($roles as $role)
                                                              <option value="{{$role->id}}">{{$role->name}}</option>
                                                              @endforeach

                                                              </select>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Change</button>



                                                    </form>


                                             </div>
                                           </div>

                                       </div>

                                 </div>


                 </div>

   </div>
</div>
</div>



@endsection
