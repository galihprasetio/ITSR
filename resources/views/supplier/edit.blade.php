@extends('admin.admin_template')
@section('tittle','Edit Supplier')

@section('content')
<div class="box">
    <div class="box-header">
    <h3 class="box-tittle"> Edit Supplier</h3>
    <div class="box-tools pull-right">

        <!-- Collapse Button -->
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
        </button>
    </div>
</div>
    
    <div class="box-body">
        {!! Form::model($supplier, ['method'=>'PATCH','route'=>['supplier.update',$supplier->id]]) !!}
        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Supplier Name*:</strong>
                        {!! Form::text('supplier_name', null, array('placeholder'=>'Supplier Name','class'=>'form-control','style' => 'text-transform:uppercase')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Address*:</strong>
                        {!! Form::textarea('address', null, array('placeholder'=>'Address','class'=>'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>City*:</strong>
                        {!! Form::text('city', null, array('placeholder'=>'City','class'=>'form-control','style' => 'text-transform:uppercase')) !!}
                    </div>
                    <div class="form-group">
                        <strong>State*:</strong>
                        {!! Form::text('state', null, array('placeholder'=>'State','class'=>'form-control','style' => 'text-transform:uppercase')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Country*:</strong>
                        {!! Form::text('country', null, array('placeholder'=>'Country','class'=>'form-control','style' => 'text-transform:uppercase')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Zip*:</strong>
                        {!! Form::number('zip', null, array('placeholder'=>'Zip','class'=>'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Contact Name*:</strong>
                        {!! Form::text('contact_name', null, array('placeholder'=>'Contact Name','class'=>'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Phone*:</strong>
                        {!! Form::number('phone', null, array('placeholder'=>'Phone','class'=>'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Fax:</strong>
                        {!! Form::number('fax', null, array('placeholder'=>'Fax','class'=>'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Email*:</strong>
                        {!! Form::text('email', null, array('placeholder'=>'Email','class'=>'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Url:</strong>
                        {!! Form::text('url', null, array('placeholder'=>'Url','class'=>'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>Notes:</strong>
                        {!! Form::textarea('notes', null, array('placeholder'=>'Notes','class'=>'form-control')) !!}
                    </div>   
        
                </div>
                    
        </div>
    </div>
    <div class="box-footer">
        <a href="{{route('supplier.index')}}" class="btn btn-default"> Back</a>
        <button type="submit" class="btn btn-primary pull-right"> Submit</button>
    </div>
</div>
{!! Form::close() !!}
@endsection
