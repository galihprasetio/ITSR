@extends('admin.admin_template')
@section('tittle','Show Location')

@section('content')
<div class="box">
    <div class="box-header">
    <h3 class="box-tittle"> Show Location</h3>
    <div class="box-tools pull-right">

        <!-- Collapse Button -->
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
        </button>
    </div>
</div>
    
    <div class="box-body">
        {!! Form::model($location, ['method'=>'PATCH','route'=>['location.update',$location->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Location:</strong>
                    {!! Form::text('location', null, array('Placeholder' => 'Location','class'=>'form-control','readonly')) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <a href="{{route('location.index')}}" class="btn btn-default"> Back</a>
       
    </div>
</div>
{!! Form::close() !!}
@endsection