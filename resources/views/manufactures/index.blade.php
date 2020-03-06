@extends('admin.admin_template')
@section('tittle','List Manufacture')
@push('header-name')
<h1>
    Manufacture Management
<small><a class="btn btn-success" href="{{route('manufacture.create')}}"> Create New Manufacture</a></small>

</h1>

<ol class="breadcrumb">
    <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Manufacture</li>
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
        <table id="manufacture-table" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    {{-- <th>Id</th> --}}
                    <th>Manufacture</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Created by</th>
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
        $('#manufacture-table').DataTable({
        scrollX:true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('manufacture.datamanufacture') }}",
        columns: [
            {
                data: 'manufacture',
                name: 'manufacture'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'created_by',
                name: 'created_by'
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