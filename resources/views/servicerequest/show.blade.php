@extends('admin.admin_template')
@section('tittle','Detail Service Request')

@section('content')
<div class="box">
    <div class="box-header">
    <h3 class="box-tittle"> Detail Service Request</h3>
    <div class="box-tools pull-right">

        <!-- Collapse Button -->
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
            <i class="fa fa-minus"></i>
        </button>
    </div>
</div>
    
<div class="box-body">
    {!! Form::model($serviceRequest, ['method'=>'PATCH','route'=>['serviceRequest.update',$serviceRequest->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Doc Number :</strong>
                {!! Form::hidden('id', null, ['id' => 'id']) !!}
                {!! Form::text('doc_number', null, array('placeholder'=>'Doc Number','class'=>'form-control','style' => 'text-transform:uppercase','readOnly')) !!}
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Department:</strong>
               {{-- {!! Form::select('id_department', $departments, null, ['placeholder'=>$department->department,'id' => 'id_department','name'=>'id_department','class'=>'form-control','disabled'=>'true']) !!} --}}
               {{-- {!! Form::select('id_department', $departments, null, ['placeholder'=>$department->department,'class'=>'form-control','disabled' =>'true']) !!} --}}
               {!! Form::text('department', $department->department, ['class' => 'form-control','disabled' => 'true']) !!}
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Requestor:</strong>
                    {!! Form::text('id_requestor', Auth::user()->name, array('placeholder'=>Auth::user()->name,'class'=>'form-control','readOnly')) !!}
                </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Submit Date:</strong>
                    {!! Form::text('submit_date', ''.date('d-M-Y H:i:s').'', array('class'=>'form-control','readOnly')) !!}
                </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Doc Status:</strong>
                    {!! Form::text('doc_status', null, array('placeholder'=>'Draft','class'=>'form-control','readonly')) !!}
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Current Author:</strong>
                    {!! Form::text('id_author', $author->name, array('placeholder'=>$author->name,'class'=>'form-control','readonly')) !!}
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Subject:</strong>
                    {!! Form::text('subject', null, array('placeholder'=>'Subject','class'=>'form-control','id'=>'subject','readonly')) !!}
                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    {!! Form::textarea('description', null, array('placeholder'=>'Description','class'=>'form-control','id'=>'description','readonly')) !!}
                </div>
        </div>
        
    </div>
</div>
<div class="box-footer">
    <a href="{{ route('serviceRequest.listDraft')}}" class="btn btn-default"> Back</a>
    
</div>
</div>
{!! Form::close() !!}
@endsection
@push('script')
<script>

</script>
@endpush