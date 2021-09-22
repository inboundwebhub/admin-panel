@extends('dashboard.base')
@section('content')

 
  <div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Create new module</h4></div>
            <div class="card-body">
            <form method = "post" action="/moduleC">
            @method('POST')
            @csrf
   <br><br><input type="text" name = "module_name" placeholder="Module name here">
   <br><br><input type="textarea" name = "module_desc" placeholder= "Module Description">
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
    <input type ="submit" value="Submit Data" class="btn btn-lg btn-primary">
   </form>
   </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
   @endsection

 