@extends('dashboard.base')
@section('content')

<h1> Permissions page </h1>

<table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Module Name</th>
                            <th>Module Description</th>
                            <th> Activated/Deactivated </th>
                            <th> Is General? </th>
                            <th> Permissions granted </th>
                        
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
                              <td> {{$permission->allowed_permissions}}</td>
                       
                            </tr>
                              </td>
                          @endforeach
                        </tbody>
                </table>
       

@endsection