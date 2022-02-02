@extends('layouts.main')
@section('title', 'Daftar Orderan')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="dark orange accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list mr-2"></i>
                        List Orderan Masuk
                    </h4>
                </div>
            </div>
            
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content my-3" id="pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="semua-data" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card no-b">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <div class="box">
                                                <div class="box-header">

                                                    <div  style="margin-left: 340px; margin-bottom: 50px;">
                                                        <form action="{{route('MasterPesanan.orderan.pencarian')}}" method="GET">
                                                            
                                                            <div class="input-group w-50">
                                                                <input type="search" class="form-control rounded" placeholder="Cari nama customer" name="pencarian"  aria-label="Search" aria-describedby="search-addon" />
                                                                <input type="submit" class="btn btn-primary"  name="" id="" value="Cari">
                                                            </div>
                                                        
                                                        </form>
                                                    </div>
                                                    
                                                    
                                                </div>

                                                @if (session('status'))
                                                    <div class="alert alert-success">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif
                                                <!-- /.box-header -->
                                                <div class="box-body table-responsive no-padding">
                                                    <table class="table table-hover" >
                                                        <thead>
                                                            <th>NO</th>
                                                            <th>KODE</th>
                                                            <th>NAMA CUSTOMER</th>
                                                            <th>TELEPON</th>
                                                            <th>JENIS PESANAN</th>
                                                            <th>STATUS</th>
                                                            <th>INVOICE</th>
                                                            <th>TINDAKAN</th>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $no = 1;
                                                            @endphp
                                                            @foreach ($orderan as $item)
                                                                
                                                            
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td class="text-left">{{ $item->kode }}</td>
                                                                <td class="text-left">{{ $item->nama_cs }}</td>
                                                                <td class="text-left">{{ $item->telepon }}</td>
                                                                <td class="text-left">{{ $item->jumlah_pesanan->Pesanan->nama }}</td>
                                                                <td>
                                                                    @if ($item->status == 1)
                                                                        <button class="btn btn-danger btn-sm">Belum Lunas</button>
                                                                        
                                                                    @else
                                                                        <button class="btn btn-success btn-sm">Sudah Lunas</button>
                                                                    @endif
                                                                    
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('MasterPesanan.invoice.index', $item->id) }}" class="btn btn-dark btn-sm"><i class="icon icon-download ml-2"></i>Download</a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('MasterPesanan.list_orderan.show', $item->id) }}" class="text-primary mr-1" title="Lihat Detail"><i class="icon icon-eye ml-2"></i></a>
                                                                    <a href="{{ route('MasterPesanan.list_orderan.edit', $item->id) }}" class="text-dark" title="Edit Status"><i class="icon icon-pencil ml-2"></i></a>
                                                                    <a href="#" class="text-danger ml-1" onclick="remove('{{ $item->id }}')" title="Hapus Orderan"><i class="icon icon-remove ml-2"></i></a>
                                                                </td>
                                                                
                                                            </tr>

                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                    {{ $orderan->links() }}
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                    </div>
                                </div>
                            </div>
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

function remove(id){
        $.confirm({
            title: '',
            content: 'Apakah Anda yakin akan menghapus data ini ?',
            icon: 'icon icon-question amber-text',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'red',
            buttons: {
                ok: {
                    text: "ok!",
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function(){
                        $.post("{{ route('MasterPesanan.list_orderan.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
                           location.reload();
                            if(id == $('#id').val()) add();
                        }, "JSON").fail(function(){
                            location.reload();
                        });
                    }
                },
                cancel: function(){}
            }
        });
    }

</script>
    
@endsection