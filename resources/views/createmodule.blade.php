@extends('dashboard.base')
@section('content')

 
  <div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Create new module</h4></div>
            <div class="card-body">
            <form method = "post" action="/moduleC" id = "cForm">
            @method('POST')
            @csrf
   <br><br><input type="text" name = "module_name" placeholder="Module name here">
   <br><br><textarea name="module_desc" rows="4" cols="50" placeholder="Module's description here">
</textarea>
   <br><br>Please select if you want to keep this module activated or deactivated:
    <br><br><select name = "selected_option">
        <option> Activate </option>
        <option> Deactivate </option>
   </select>

   <br><br>Do you want to keep this module General:- 
   <br><br><select name = "isGeneral">
       <option> True </option>
       <option> False </option>
    </select>


    <br><br> Select an option to assign this module a particular role
    <br><br> <select name = "roles" class = "roles">
      <option> {{"all"}} </option>
      @foreach($rolestopush as $role):
        <option> {{$role->name}} </option>
        @endforeach
      </select>
      <br>
      <br>
      <div style = "display:inline">
      <h2 style="display:inline">Select Permissions</h2>&nbsp&nbsp&nbsp<input type ="button" value="Make Global" class="btn btn-lg btn-primary make-global" style="display:inline">
      </div>
    
      @foreach($perms as $perm)
      <br><br><input type = "checkbox" name = "permissions[]" class = "check" value = "{{$perm->Permission_name}}"> {{$perm->Permission_name}}
      @endforeach
      
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

 @section('javascript')
 <script src = "https://code.jquery.com/jquery-3.6.0.min.js"> </script>
 <script src = {{ asset('js/auto_select.js') }}> </script>



 @endsection
