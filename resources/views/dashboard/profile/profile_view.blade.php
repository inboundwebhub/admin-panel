@extends('dashboard.base')

@section('content')
<div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
    <a href="http://127.0.0.1:8000/profile/insert" >
        <input type="button" class="btn btn-primary next ui-wizard-content ui-formwizard-button" value="Insert" id="next1">
    </a>
</div>

<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i>Users    
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->first_name}}</td>
                        <td>{{$row->last_name}}</td>
                        <td>{{$row->emailid}}</td>
                        <td>
                            <a href="http://127.0.0.1:8000/profile/{{$row->id}}" class="btn btn-block btn-primary">View</a>
                        </td>
                        <td>
                            <a href="http://127.0.0.1:8000/profile/insert/{{$row->id}}" class="btn btn-block btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="http://127.0.0.1:8000/users/{{$row->id}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE"> <input type="hidden" name="_token" value="3sid7yJavx5iuEuWWjRmwdJj4bHthQbaRfVtykuT"> <button class="btn btn-block btn-danger">Delete User</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection