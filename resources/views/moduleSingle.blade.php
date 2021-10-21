@extends('dashboard.base')

@section('content')
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> {{ $module->module_name }}</div>
                    <div class="card-body">
                        <h4>Name: {{ $module->module_name }}</h4>
                        <br>
                        <h4>Module Description: {{ $module->module_description }}</h4>
                        <br>
                        @if($module->isGeneralModule == "True")
                        <h4>Is General: {{"Yes"}} </h4>
                        @else
                        <h4>Is General: {{"No"}} </h4>
                        @endif
                        <br>
                        @if($module->Activate_Deactivate =='Activate')
                        <h4>Module Status: {{"Activated"}}</h4>
                        @else
                        <h4>Module Status:{{"Deactivated"}}</h4>
                        @endif
                        <br>
                        <h4> Assigned To: {{$module->AssignedtoRole}} </h4>
                        <a href="{{ url('/') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
