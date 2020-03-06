@extends('admin.admin_template')
@section('tittle','List Accessories')
@push('header-name')
<h1>
    Accessories Management
<small><a class="btn btn-success" href="{{route('accessories.create')}}"> Create New Accessories</a></small>

</h1>

<ol class="breadcrumb">
    <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Accessories</li>
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
        <table id="accessories-table" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    {{-- <th>Id</th> --}}
                    <th>Accessories Name</th>
                    <th>Order Number</th>
                    <th>Qty</th>
                    <th>Location</th>
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
        $('#accessories-table').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('accessories.dataaccessories') }}",
        columns: [
            {
                data: 'accessories_name',
                name: 'accessories_name'
            },
            {
                data: 'order_number',
                name: 'order_number'
            },
            {
                data: 'qty',
                name: 'qty'
            },
            {
                data: 'location',
                name: 'location'
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