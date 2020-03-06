@extends('admin.admin_template')
@section('tittle','Detail Accessories')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-tittle">Detail Accessories</h3>
        <div class="box-tools pull-right">

                <!-- Collapse Button -->
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
    </div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="box-body">
        {!! Form::model($accessories, ['method'=>'PATCH','route'=>['accessories.update',$accessories->id],'enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                            <strong>Manufacture:</strong>
                            {!! Form::select('id_manufacture', $manufacture, null, ['class' => 'form-control','id' =>'id_manufacture','name' => 'id_manufacture','placeholder'=> 'Select Manufacture','disabled' => 'true']) !!}
                            
                        </div>
                         <div class="form-group">
                            <strong>Accessories Name:</strong>
                            {!! Form::text('accessories_name', null, ['class' => 'form-control','placeholder'=>'Accessories Name','style' => 'text-transform:uppercase','readOnly']) !!}
                        </div>
                        <div class="form-group">
                            <strong>Order Number:</strong>
                            {!! Form::text('order_number', null, ['class' => 'form-control','placeholder'=>'Order Number','style' => 'text-transform:uppercase','readOnly']) !!}
                        </div>
                        
                        <div class="form-group">
                            <strong>Warranty:</strong>
                            {!! Form::text('warranty', null, ['class' => 'form-control','placeholder'=>'Warranty','readOnly']) !!}
                        </div>
                        <div class="form-group">
                            <strong>Qty:</strong>
                            {!! Form::Number('qty', null, ['class' => 'form-control','placeholder'=>'qty','readOnly']) !!}
                        </div>
                        <div class="form-group">
                            <strong>Min Qty:</strong>
                            {!! Form::Number('min_qty', null, ['class' => 'form-control','placeholder'=>'Min Qty','readOnly']) !!}
                        </div>
                        <div class="form-group">
                            <strong>Notes:</strong>
                            {!! Form::textarea('notes', null, ['class' => 'form-control','placeholder'=>'Notes','readOnly']) !!}
                        </div>
                        
                        <div class="form-group">
                            <strong>Location:</strong>
                            {!! Form::select('id_location', $location, null, ['class' => 'form-control','id' =>'id_location','name' => 'id_location','placeholder'=> 'Select Location','disabled' => 'true']) !!}
                        </div>
                        
                        <div class="form-group">
                            <strong>Image:</strong>
                            <br>
                                <img id="preview"
                                src="{{asset((isset($accessories) && $accessories->image!='')?'storage/accessories/'.$accessories->image:'storage/noimageavailable.png')}}"
                                height="200px" width="200px" />
                                
                        </div>
                        

            </div>
        </div>
    </div>
    <div class="box-footer">
        <a href="{{ route('accessories.index')}}" class="btn btn-default"> Back</a>
        
    </div>
</div>
{!! Form::close() !!}
@push('script')

<script src="{{ asset('js/accessories.js')}}"></script>
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