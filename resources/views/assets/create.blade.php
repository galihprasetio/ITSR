@extends('admin.admin_template')
@section('tittle','Create Asset')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-tittle">Create New Asset</h3>
        <div class="box-tools pull-right">

                <!-- Collapse Button -->
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
    </div>
    {{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <div class="box-body">
        {!! Form::open(array('route'=>'assets.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                            <strong>Manufacture:</strong>
                            {!! Form::select('id_manufacture', $manufacture, null, ['class' => 'form-control','id' =>'id_manufacture','name' => 'id_manufacture','placeholder'=> 'Select Manufacture']) !!}
                            
                        </div>
                         <div class="form-group">
                            <strong>Asset Tag:</strong>
                            {!! Form::text('asset_tag', null, ['class' => 'form-control','placeholder'=>'Asset Tag','style' => 'text-transform:uppercase','id'=>'asset_tag','onkeyup' =>'auto_fill()']) !!}
                        </div>
                        
                        <div class="form-group">
                            <strong>Category:</strong>
                            {!! Form::select('id_category', $category, null, ['class' => 'form-control','id' =>'id_category','name' => 'id_category','placeholder'=> 'Select Category']) !!}
                        </div>
                        
                        <div class="form-group">
                            <strong>Serial:</strong>
                            {!! Form::text('serial', null, ['class' => 'form-control','placeholder'=>'Serial','style' => 'text-transform:uppercase','id'=>'serial']) !!}
                        </div>
                        <div class="form-group">
                            <strong>Asset Name:</strong>
                            {!! Form::text('asset_name', null, ['class' => 'form-control','placeholder'=>'Asset Name','style' => 'text-transform:uppercase','id'=>'asset_name']) !!}
                        </div>
                        <div class="form-group">
                            <strong>Order Number:</strong>
                            {!! Form::text('order_number', null, ['class' => 'form-control','placeholder'=>'Order Number','style' => 'text-transform:uppercase','id'=>'order_number']) !!}
                        </div>
                        <div class="form-group">
                            <strong>Warranty:</strong>
                            {!! Form::text('warranty', null, ['class' => 'form-control','placeholder'=>'Warranty','id' => 'warranty']) !!}
                        </div>
                        <div class="form-group">
                            <strong>Qty:</strong>
                            {!! Form::Number('qty', null, ['class' => 'form-control','placeholder'=>'qty','id' => 'qty']) !!}
                        </div>
                        <div class="form-group">
                            <strong>Min Qty:</strong>
                            {!! Form::Number('min_qty', null, ['class' => 'form-control','placeholder'=>'Min Qty']) !!}
                        </div>
                        <div class="form-group">
                            <strong>Notes:</strong>
                            {!! Form::textarea('notes', null, ['class' => 'form-control','placeholder'=>'Notes','id' => 'notes']) !!}
                        </div>
                        
                        <div class="form-group">
                            <strong>Location:</strong>
                            {!! Form::select('id_location', $location, null, ['class' => 'form-control','id' =>'id_location','name' => 'id_location','placeholder'=> 'Select Location']) !!}
                        </div>
                        
                        <div class="form-group">
                            <strong>Image:</strong>
                            {!! Form::file('image', ['type'=>'file','class'=>'form-control','name'=>'image','accept'=>'image/jpeg','onchange'=>'readURL(this);']) !!}
                            <br>
                            <img id="preview" src="{{asset('storage/noimageavailable.png')}}" height="200px" width="200px" />
                        </div>
                        

            </div>
        </div>
    </div>
    <div class="box-footer">
        <a href="{{ route('assets.index')}}" class="btn btn-default"> Back</a>
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
function auto_fill(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        id = document.getElementById('asset_tag').value;
        //alert(id);
            $.ajax({
            url:'{{route('assets.searchAsset')}}',
            type: "GET",
            dataType: 'json',
            data: "id="+id,
            success:function(data){
               //alert(data.asset_tag);
               $('#serial').val(data.serial);
               $('#asset_name').val(data.asset_name);
               $("#id_manufacture").val(data.id_manufacture).change();
               $("#id_category").val(data.id_category).change();
               $("#id_location").val(data.id_location).change();  
               //document.getElementById('id_manufacture').value = data.id_manufacture;
               //$("#id_manufacture option[value="+data.id_manufacture+"]").attr('selected', 'selected');
               $('#warranty').val(data.id_manufacture); 
               $('#order_number').val(data.order_number);
               $('#qty').val(data.qty);
               $('#notes').val(data.notes);
               
               
            }
            });
                
      
    }
</script>
@endpush
@endsection