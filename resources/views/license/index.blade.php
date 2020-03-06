@extends('admin.admin_template')
@section('tittle','List License')
@push('header-name')
<h1>
    License Management
<small><a class="btn btn-success" href="{{route('license.create')}}"> Create New License</a></small>

</h1>

<ol class="breadcrumb">
    <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">License</li>
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
        <table id="license-table" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    {{-- <th>Id</th> --}}
                    <th>Software Name</th>
                    <th>Product Key</th>
                    <th>License Name</th>
                    <th>License Email</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                    
                </tr>
            </thead>

        </table>
    </div>
</div>
    @push('script')
    <script>
        $('#license-table').DataTable({
        scrollX:true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('license.datalicense') }}",
        columns: [
            {
                data: 'software_name',
                name: 'software_name'
            },
            {
                data: 'product_key',
                name: 'product_key'
            },
            {
                data: 'license_name',
                name: 'license_name'
            },
            {
                data: 'license_email',
                name: 'license_email'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'updated_at',
                name: 'updated_at'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ],
        "bStateSave": true,
        "fnStateSave": function (oSettings, oData) {
        localStorage.setItem('offersDataTables', JSON.stringify(oData));
        },
        "fnStateLoad": function (oSettings) {
        return JSON.parse(localStorage.getItem('offersDataTables'));
        }
    });

    </script>
    @endpush
@endsection