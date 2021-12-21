@extends('layouts.main')
@section('title', 'Order')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-clipboard-list2 text-success s-18"></i>
                        Data Orderan
                    </h4>
                </div>
            </div>
        </div>
    </header>
<div class="container-fluid relative animatedParent animateOnce">
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card no-b">
                    <div class="card-body">   
                        <div class="table-responsive">                   
                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th width="30">No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>No Hp</th>
                                    <th>Harga</th>
                                    <th>Dp</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                   
                                    <th>Status</th>
                                    <th>Invoice</th>
                                    <th>Aksi</th>
                                    
                                </thead>
                                <tbody></tbody>
                            </table> 
                        </div>                    
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
var table = $('#dataTable').dataTable({
   processing: true,
   serverSide: true,
   order: [ 0, 'asc' ],
   ajax: {
       url: "{{ route('MasterPesanan.order.dataTable') }}",
       method: 'POST'
   },
  
   columns: [
       {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
       {data: 'kode', name: 'kode'},
       {data: 'nama', name: 'nama'},
       {data: 'no_hp', name: 'no_hp'},
       {data: 'harga_wn', name: 'harga_wn', render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp' )},
       {data: 'dp', name: 'dp', render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp' )},
       {data: 'tanggal_order', name: 'tanggal_order'},
       {data: 'kuantiti', name: 'kuantiti'},
      
       {data: 'total', name: 'total', render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp' )},
       {data: 'status', name: 'status'},
       {data: 'invoice', name: 'invoice'},
       {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
   ]
});
</script>
@endsection