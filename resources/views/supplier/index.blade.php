@extends('admin.admin_template')
@section('tittle','List Supplier')
@push('header-name')
<h1>
    Supplier Management
<small><a class="btn btn-success" href="{{route('supplier.create')}}"> Create New Supplier</a></small>

</h1>

<ol class="breadcrumb">
    <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Supplier</li>
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
        <table id="supplier-table" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    {{-- <th>Id</th> --}}
                    <th>Supplier Name</th>
                    <th>Contact</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                    
                </tr>
            </thead>

        </table>
    </div>
</div>
    @push('script')
    <script>
        $('#supplier-table').DataTable({
        scrollX:true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('supplier.datasupplier') }}",
        columns: [
            {
                data: 'supplier_name',
                name: 'supplier_name'
            },
            {
                data: 'contact_name',
                name: 'contact_name'
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