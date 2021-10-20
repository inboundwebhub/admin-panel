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
                            <!-- <th> Access Assigned to </th> -->
                            <th> </th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($permissions as $permission)
                            <tr>
                              <td>{{ $permission->module_name }}</td>
                              <td>{{ $permission->module_description }}</td>
                              @if($permission->Activate_Deactivate == 'Activate')
                              <td>{{ "Activated" }}</td>
                              @else:
                                <td> {{"Deactivated"}}</td>
                              @endif
                              @if($permission->isGeneralModule == 'True')
                              <td>{{ "Yes" }}</td>
                              @else:
                                <td> {{"No"}} </td>
                              @endif
                              <!-- <td> </td> -->

                              @can('admin')
                              @if($permission->AssignedtoRole == 'admin')
                              <td>  <a href="{{ url('/modules/'.$permission->module_id) }}" class="btn btn-block btn-primary">View</a></td>
                              <td>  <a href="{{ url('/modules/'.$permission->module_id.'/edit') }}" class="btn btn-block btn-primary">Edit</a></td>
                              @endif
                             @endcan
                             @can('user')
                              @if($permission->AssignedtoRole == 'user' and in_array('can_view',explode(',',$permission->allowed_permissions)))
                              <td>  <a href="{{ url('/modules/'.$permission->module_id) }}" class="btn btn-block btn-primary">View</a></td>
                              <td>  <a href="{{ url('/modules/'.$permission->module_id.'/edit') }}" class="btn btn-block btn-primary" style="pointer-events: none;">Edit</a></td>
                              @endif
                              @if($permission->AssignedtoRole == 'user' and in_array('can_edit',explode(',',$permission->allowed_permissions)))
                              <td>  <a href="{{ url('/modules/'.$permission->module_id) }}" class="btn btn-block btn-primary" style="pointer-events: none;">View</a></td>
                              <td>  <a href="{{ url('/modules/'.$permission->module_id.'/edit') }}" class="btn btn-block btn-primary">Edit</a></td>
                              @endif
                            @endcan
                              <td><form action="" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-block btn-danger">Delete User</button>
                                </form>
                              
                            </tr>
                              </td>
                          @endforeach
                        </tbody>
                </table>
@endsection