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
                            <a href="http://127.0.0.1:8000/profile/edit/{{$row->id}}" class="btn btn-block btn-primary">Edit</a>
                        </td>
                        <td>                            
                            <a href="http://127.0.0.1:8000/profile/delete/{{$row->id}}" class="btn btn-block btn-danger delete ">Delete</a>                           
                        </td>
                      
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('javascript')

<script>

    $('.delete').click(function(){

        if(confirm("Are you sure you want to delete this profile"))
        {
            return true;
        }
        else
        {
            return false;
        }
      })
</script>

@endsection