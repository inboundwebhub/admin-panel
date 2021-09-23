@extends('dashboard.base')
@section('style')
<style>
    .disabled-link {
        pointer-events: none;
    }
</style>
@endsection
@section('content')
   
     <h1> Modules</h1>
     <a class="btn btn-lg btn-primary" href="{{url('/newmodule')}}">Add new module</a>
     <a class= "btn btn-lg btn-primary" href="{{url('/viewPermissions')}}"> View Permissions </a>
     <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Module Name</th>
                            <th>Module Description</th>
                            <th> Activated/Deactivated </th>
                            <th> Is General? </th>
                            <th> Access Assigned to </th>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($modules as $module)
                            <tr>
                              <td>{{ $module->module_name }}</td>
                              <td>{{ $module->module_description }}</td>
                              @if($module->Activate_Deactivate == 'Activate')
                              <td>{{ "Activated" }}</td>
                              @else:
                                <td> {{"Deactivated"}}</td>
                              @endif
                              @if($module->isGeneralModule == 'True')
                              <td>{{ "Yes" }}</td>
                              @else:
                                <td> {{"No"}} </td>
                              @endif
                              <td> {{$module->AssignedtoRole}} </td>
                        @can('admin')
                              <td>  <a href="{{ url('/modules/'.$module->id) }}" class="btn btn-block btn-primary">View</a></td>
                              <td>  <a href="{{ url('/modules/'.$module->id.'/edit') }}" class="btn btn-block btn-primary">Edit</a></td>
                        
                              <td><form action="" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger">Delete User</button>
                                </form>
                                @else
                                <td>  <a href="{{ url('/modules/'.$module->id) }}" class="btn btn-block btn-primary" style = " pointer-events: none;" >View</a></td>
                              <td>  <a href="{{ url('/modules/'.$module->id.'/edit') }}" class="btn btn-block btn-primary disabled-link" style = " pointer-events: none;">Edit</a></td>
                                @endcan
                            </tr>
                              </td>
                          @endforeach
                        </tbody>
                </table>
@endsection