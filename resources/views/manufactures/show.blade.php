@extends('admin.admin_template')
@section('tittle','Show Manufacture')

@section('content')
<div class="box">
    <div class="box-header">
    <h3 class="box-tittle"> Show Manufacture</h3>
    <div class="box-tools pull-right">

        <!-- Collapse Button -->
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
        </button>
    </div>
</div>
    
    <div class="box-body">
        {!! Form::model($manufacture, ['method'=>'PATCH','route'=>['manufacture.update',$manufacture->id]]) !!}
        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Manufacture *:</strong>
                            {!! Form::text('manufacture', null, array('placeholder'=>'Manufacture','class'=>'form-control','readonly')) !!}
                        </div>
        
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Url:</strong>
                            {!! Form::text('url', null, array('placeholder'=>'Url','class'=>'form-control','readonly')) !!}
                        </div>
        
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Phone:</strong>
                                {!! Form::number('phone', null, array('placeholder'=>'Phone','class'=>'form-control','readonly')) !!}
                            </div>
        
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {!! Form::email('email', null, array('placeholder'=>'Email','class'=>'form-control','readonly')) !!}
                            </div>
        
                    </div>
        </div>
    </div>
    <div class="box-footer">
        <a href="{{route('manufacture.index')}}" class="btn btn-default"> Back</a>
       
    </div>
</div>
{!! Form::close() !!}
@endsection
