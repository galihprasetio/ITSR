@extends('admin.admin_template')
@section('tittle','Create License')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-tittle">Create New License</h3>
        <div class="box-tools pull-right">

                <!-- Collapse Button -->
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
    </div>
    
    <div class="box-body">
        {!! Form::open(array('route'=>'license.store','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Software Name *:</strong>
                    {!! Form::text('software_name', null, array('placeholder'=>'Software Name','class'=>'form-control','style' => 'text-transform:uppercase')) !!}
                </div>
                <div class="form-group">
                        <strong>Category:</strong>
                        {!! Form::select('id_category', $category, null, ['class' => 'form-control','id' =>'id_category','name' => 'id_category','placeholder'=> 'Select Category']) !!}
                </div>
                <div class="form-group">
                    <strong>Product Key:</strong>
                    {!! Form::text('product_key', null, array('placeholder'=>'Product Key','class'=>'form-control','style' => 'text-transform:uppercase')) !!}
                </div>
                <div class="form-group">
                    <strong>Seats:</strong>
                    {!! Form::number('seats', null, array('placeholder'=>'Seats','class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                        <strong>Manufacture:</strong>
                        {!! Form::select('id_manufacture', $manufacture, null, ['class' => 'form-control','id' =>'id_manufacture','name' => 'id_manufacture','placeholder'=> 'Select Manufacture']) !!}
                </div>
                <div class="form-group">
                    <strong>License Name:</strong>
                    {!! Form::text('license_name', null, array('placeholder'=>'License Name','class'=>'form-control','style' => 'text-transform:uppercase')) !!}
                </div>
                <div class="form-group">
                    <strong>License Email:</strong>
                    {!! Form::text('license_email', null, array('placeholder'=>'License Email','class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                        <strong>Supplier:</strong>
                        {!! Form::select('id_supplier', $supplier, null, ['class' => 'form-control','id' =>'id_supplier','name' => 'id_supplier','placeholder'=> 'Select Supplier']) !!}
                </div>
                <div class="form-group">
                    <strong>Purchase Order:</strong>
                    {!! Form::text('purchase_order', null, array('placeholder'=>'Purchase Order','class'=>'form-control','style' => 'text-transform:uppercase')) !!}
                </div>
                <div class="form-group">
                    <strong>Purchase Cost:</strong>
                    {!! Form::number('purchase_cost', null, array('placeholder'=>'Purchase Cost','class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Purchase Date:</strong>
                    {!! Form::date('purchase_date', null, array('placeholder'=>'Purchase Date','class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Expiration Date:</strong>
                    {!! Form::date('expiration_date', null, array('placeholder'=>'Expiration Date','class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Termination Date:</strong>
                    {!! Form::date('termination_date', null, array('placeholder'=>'Termination Date','class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>Notes:</strong>
                    {!! Form::textarea('notes', null, array('placeholder'=>'Notes','class'=>'form-control')) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <a href="{{ route('license.index')}}" class="btn btn-default"> Back</a>
        <button type="submit" class="btn btn-primary pull-right"> Submit</button>
    </div>
</div>
{!! Form::close() !!}
@push('script')
<script src="{{ asset('js/license.js')}}"></script>
    
@endpush
@endsection