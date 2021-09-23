@extends('dashboard.base')
@section('content')

 
  <div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Create new module</h4></div>
            <div class="card-body">
            <form method = "post" action="/permissionC">
            @method('POST')
            @csrf
   <br><br><input type="text" name = "permission_name" placeholder="Module name here">
   <br><br><textarea name="permission_description" rows="4" cols="50" placeholder="Permission's description here">
</textarea>
     <br><br> <input type ="submit" value="Submit Data" class="btn btn-lg btn-primary">
   </form>
   </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
   @endsection

 