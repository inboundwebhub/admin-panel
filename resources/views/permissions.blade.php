@extends('dashboard.base')
@section('content')

<h1> Permissions </h1>
     <a class="btn btn-lg btn-primary" href="{{url('/newpermission')}}">Add new permission</a>
     <!--  -->
     <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Permission Name</th>
                            <th>Permission Description</th>
                            <th> </th>
                            <th> </th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($permissions as $permission)
                            <tr>
                              <td>{{ $permission->Permission_name }}</td>
                              <td>{{ $permission->Permission_description }}</td>
                              <td> </td>
                        @can('admin')
                              <td>  <a href="{{ url('/permissions/'.$permission->id) }}" class="btn btn-block btn-primary">View</a></td>
                              <td>  <a href="{{ url('/permissions/'.$permission->id.'/edit') }}" class="btn btn-block btn-primary">Edit</a></td>
                        
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