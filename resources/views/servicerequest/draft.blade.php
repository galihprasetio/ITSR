@extends('admin.admin_template')
@section('tittle','List Service Request')
@push('header-name')
<h1>
    IT Service Request
{{-- <small><a class="btn btn-success" href="{{route('manufacture.create')}}"> Create Service Request</a></small> --}}

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
           <tbody>
               @foreach ($serviceRequest as $item)
                   <tr>
                       <td>{{ $item->doc_number}}</td>
                       <td>{{ $item->name}}</td>
                       <td>{{ $item->department}}</td>
                       <td>{{ $item->doc_status}}</td>
                       <td>{{ $item->subject}}</td>
                       <td>{{ $item->created_at}}</td>
                       <td>
                           
                            <a href="{{route('serviceRequest.show',$item->id)}}" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
                            <a href="{{route('serviceRequest.edit',$item->id)}}" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                            {{-- <a href="" class="btn btn-xs btn-default btn-delete"><i class="glyphicon glyphicon-trash"></i> Delete</a> --}}
                            <div class="btn-group">
                            <form method="POST" action="{{route('serviceRequest.destroy',$item->id)}}">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                            </form> 
                        </div>
                       </td>
                   </tr>
               @endforeach
           </tbody>
        </table>
    </div>
</div>
    @push('script')
    <script>
    var table = $('#service-table').DataTable({
        paging:   true,
        info:     true,
        searching: true,
        select: true, 
        scrollX:true,
        "bStateSave": true,
        "fnStateSave": function (oSettings, oData) {
        localStorage.setItem('offersDataTables', JSON.stringify(oData));
        },
        "fnStateLoad": function (oSettings) {
        return JSON.parse(localStorage.getItem('offersDataTables'));
        }
          
    });
    
    
//     dom: 'l<"toolbar">frtip',
//      initComplete: function(){
//       $("div.toolbar")
//          .html('<button type="button" id="any_button" class="btn btn-success pull-right btn-addDetail">Add</button>');           
//    }      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // $("#btn-delete").click(function(e){
    //     e.preventDefault();
    //         var id = document.getElementById('id').value;
    //         alert(id);
    //         // $.ajax({
    //         // url:'{{route('serviceRequest.delete')}}',
    //         // type: "POST",
    //         // dataType: 'json',
    //         // data: "id="+id,
    //         // success:function(data){
    //         //     window.location = '{{route('serviceRequest.listDraft')}}';
                
    //         // }
    //         // });
            
    // })
    </script>
    @endpush
@endsection