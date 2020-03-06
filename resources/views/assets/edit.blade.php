@extends('admin.admin_template')
@section('tittle','Edit Asset')

@section('content')
<div class="box">
    <div class="box-header">
    <h3 class="box-tittle"> Edit Asset</h3>
    <div class="box-tools pull-right">

        <!-- Collapse Button -->
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
        </button>
    </div>
</div>
    
    <div class="box-body">
        {!! Form::model($asset, ['method'=>'PATCH','route'=>['assets.update',$asset->id],'enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Manufacture:</strong>
                    {!! Form::select('id_manufacture', $manufacture, null, ['class' => 'form-control','id' =>'id_manufacture','name' => 'id_manufacture','placeholder'=> 'Select Manufacture']) !!}
                    
                </div>
                 <div class="form-group">
                    <strong>Asset Tag:</strong>
                    {!! Form::text('asset_tag', null, ['class' => 'form-control','placeholder'=>'Asset Tag','style' => 'text-transform:uppercase']) !!}
                </div>
                
                <div class="form-group">
                    <strong>Category:</strong>
                    {!! Form::select('id_category', $category, null, ['class' => 'form-control','id' =>'id_category','name' => 'id_category','placeholder'=> 'Select Category']) !!}
                </div>
                
                <div class="form-group">
                    <strong>Serial:</strong>
                    {!! Form::text('serial', null, ['class' => 'form-control','placeholder'=>'Serial','style' => 'text-transform:uppercase']) !!}
                </div>
                <div class="form-group">
                    <strong>Asset Name:</strong>
                    {!! Form::text('asset_name', null, ['class' => 'form-control','placeholder'=>'Asset Name','style' => 'text-transform:uppercase']) !!}
                </div>
                <div class="form-group">
                    <strong>Order Number:</strong>
                    {!! Form::text('order_number', null, ['class' => 'form-control','placeholder'=>'Order Number','style' => 'text-transform:uppercase']) !!}
                </div>
                <div class="form-group">
                    <strong>Warranty:</strong>
                    {!! Form::text('warranty', null, ['class' => 'form-control','placeholder'=>'Warranty']) !!}
                </div>
                <div class="form-group">
                    <strong>Qty:</strong>
                    {!! Form::Number('qty', null, ['class' => 'form-control','placeholder'=>'qty']) !!}
                </div>
                <div class="form-group">
                    <strong>Min Qty:</strong>
                    {!! Form::Number('min_qty', null, ['class' => 'form-control','placeholder'=>'Min Qty']) !!}
                </div>
                <div class="form-group">
                    <strong>Notes:</strong>
                    {!! Form::textarea('notes', null, ['class' => 'form-control','placeholder'=>'Notes']) !!}
                </div>
                
                <div class="form-group">
                    <strong>Location:</strong>
                    {!! Form::select('id_location', $location, null, ['class' => 'form-control','id' =>'id_location','name' => 'id_location','placeholder'=> 'Select Location']) !!}
                </div>
                
                <div class="form-group">
                    <strong>Image:</strong>
                    {!! Form::file('image', ['class' =>'form-control','name'=>'image','accept'=>'image/jpeg','onchange'=>'readURL(this);']) !!}
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
        <button type="submit" class="btn btn-primary pull-right"> Submit</button>
    </div>
</div>
{!! Form::close() !!}
@push('script')

<script src="{{ asset('js/assets.js')}}"></script>
<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#preview')
                    .attr('src', e.target.result);
            };
    
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
@endsection
