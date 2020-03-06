@extends('admin.admin_template')
@section('tittle','Show Asset')

@section('content')
<div class="box">
    <div class="box-header">
    <h3 class="box-tittle"> Show Asset</h3>
    <div class="box-tools pull-right">

        <!-- Collapse Button -->
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
        </button>
    </div>
</div>
    
    <div class="box-body">
        {!! Form::model($asset, ['method'=>'PATCH','route'=>['assets.update',$asset->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Manufacture:</strong>
                    {!! Form::select('id_manufacture', $manufacture, null, ['class' => 'form-control','id' =>'id_manufacture','name' => 'id_manufacture','placeholder'=> 'Select Manufacture','disabled' => 'true']) !!}
                    
                </div>
                 <div class="form-group">
                    <strong>Asset Tag:</strong>
                    {!! Form::text('asset_tag', null, ['class' => 'form-control','placeholder'=>'Asset Tag','style' => 'text-transform:uppercase','readonly']) !!}
                </div>
                
                <div class="form-group">
                    <strong>Category:</strong>
                    {!! Form::select('id_category', $category, null, ['class' => 'form-control','id' =>'id_category','name' => 'id_category','placeholder'=> 'Select Category','disabled' => 'true']) !!}
                </div>
                
                <div class="form-group">
                    <strong>Serial:</strong>
                    {!! Form::text('serial', null, ['class' => 'form-control','placeholder'=>'Serial','style' => 'text-transform:uppercase','readonly']) !!}
                </div>
                <div class="form-group">
                    <strong>Asset Name:</strong>
                    {!! Form::text('asset_name', null, ['class' => 'form-control','placeholder'=>'Asset Name','style' => 'text-transform:uppercase','readonly']) !!}
                </div>
                <div class="form-group">
                    <strong>Order Number:</strong>
                    {!! Form::text('order_number', null, ['class' => 'form-control','placeholder'=>'Order Number','style' => 'text-transform:uppercase','readonly']) !!}
                </div>
                <div class="form-group">
                    <strong>Warranty:</strong>
                    {!! Form::text('warranty', null, ['class' => 'form-control','placeholder'=>'Warranty','readonly']) !!}
                </div>
                <div class="form-group">
                    <strong>Qty:</strong>
                    {!! Form::Number('qty', null, ['class' => 'form-control','placeholder'=>'qty','readonly']) !!}
                </div>
                <div class="form-group">
                    <strong>Min Qty:</strong>
                    {!! Form::Number('min_qty', null, ['class' => 'form-control','placeholder'=>'Min Qty','readonly']) !!}
                </div>
                <div class="form-group">
                    <strong>Notes:</strong>
                    {!! Form::textarea('notes', null, ['class' => 'form-control','placeholder'=>'Notes','readonly']) !!}
                </div>
                
                <div class="form-group">
                    <strong>Location:</strong>
                    {!! Form::select('id_location', $location, null, ['class' => 'form-control','id' =>'id_location','name' => 'id_location','placeholder'=> 'Select Location','disabled' => 'true']) !!}
                </div>
                
                <div class="form-group">
                    <strong>Image:</strong>
                    <br>
                    <img id="preview"
                    src="{{asset((isset($asset) && $asset->image!='')?'storage/assets/'.$asset->image:'storage/noimageavailable.png')}}"
                    height="200px" width="200px" />
                    
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <a href="{{route('assets.index')}}" class="btn btn-default"> Back</a>
       
    </div>
</div>
{!! Form::close() !!}
@endsection
