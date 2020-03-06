@extends('admin.admin_template')
@section('tittle','List Service Request')
@push('header-name')
<h1>
    IT Service Request
<small><a class="btn btn-success" href="{{route('manufacture.create')}}"> Create Service Request</a></small>

</h1>

<ol class="breadcrumb">
    <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Service Request</li>
</ol>
@endpush
@section('content')
<div class="box">
    <div class="box-header">


            <div class="box-tools pull-right">

                    <!-- Collapse Button -->
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
    </div>
    <div class="box-body">
        <table id="service-table" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    {{-- <th>Id</th> --}}
                    <th>Doc Number</th>
                    <th>Requestor</th>
                    <th>Department</th>
                    <th>Doc Status</th>
                    <th>Subject</th>
                    <th>Created at</th>
                    <th>Action</th>
                    
                </tr>
            </thead>

        </table>
    </div>
</div>
    @push('script')
    <script>
    $('#service-table').DataTable({
        "paging":   false,
        "info":     false,
        "searching": false,
        dom: 'l<"toolbar">frtip',
   initComplete: function(){
      $("div.toolbar")
         .html('<button type="button" id="any_button" class="btn btn-success pull-right btn-addDetail">Add</button>');           
   }       
    });

    </script>
    @endpush
@endsection