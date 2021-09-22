@extends('dashboard.base')
@section('content')
   
     <h1> Modules</h1>
     <a class="btn btn-lg btn-primary" href="{{url('/newmodule')}}">Add new module</a>
     <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Module Name</th>
                            <th>Module Description</th>
                            <th> Activated/Deactivated </th>
                            <th> Is General? </th>

                            
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($modules as $module)
                            <tr>
                              <td>{{ $module->module_name }}</td>
                              <td>{{ $module->module_description }}</td>
                              <td>{{ $module->Activate_Deactivate }}</td>
                              <td>{{ $module->isGeneralModule }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                </table>
@endsection