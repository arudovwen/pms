@if (isset($errors)&&count($errors)>0)
    
    <div class="alert alert-dismissable alert-success fade show">
        <button type="button" class="close" data-dismiss='alert' aria-label="close">
            <span aria-hidden="true"> &times;</span>
        </button>
      @foreach ($errors->all() as $error)
     <li>
            <strong>
                    {!!$error!!}
                </strong>
     </li>
      @endforeach
    </div>
@endif


{{-- @if ($errors)
<div style="background:red;border:1px solid red;padding:5px;">
       @foreach ($errors->all() as $error)
           <ul><li>{{ $error }}</li></ul>
       @endforeach
   </div>
@endif --}}
