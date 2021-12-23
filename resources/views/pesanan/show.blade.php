@extends('layouts.main')
@section('title', 'Detail Pemesan')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="dark orange accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h4>
                        <i class="icon icon-users mr-2"></i>
                        Detail  | {{ $order->nama }}
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                    <li>
                        <a class="nav-link" href="{{route('MasterPesanan.order.index')}}"><i class="icon icon-arrow_back"></i>Semua Orderan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active show" id="tab1" data-toggle="tab" href="#semua-data" role="tab"><i class="icon icon-user"></i>Pemesan</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content my-3" id="pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="semua-data" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <h6 class="card-header"><strong>Data Pemesan</strong></h6>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Kode</strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">{{$order->kode}}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Nama </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">{{$order->nama}}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>No Hp </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">{{$order->no_hp}}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Alamat </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">{{$order->alamat}}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Harga Vendor </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">Rp. {{number_format($order->harga_vendor)}}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Harga Konsumen  </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">Rp. {{number_format($order->harga_wn)}}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Tanggal Order </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">{{$order->tanggal_order}}</label>
                                    </div>
                                    
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Estimasi </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">{{$order->estimasi}}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Jenis Pemesanan </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">{{$order->jenis_pemesanan}}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Jumlah Kuantiti </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">{{$order->kuantiti}} Pcs</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Tangan Panjang </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">{{$order->jumlah_panjang}} Pcs</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Tangan Pendek </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">{{$order->jumlah_pendek}} Pcs</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Status </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">
                                            @if($order->status == 0)
                                                Belum Lunas
                                            @else
                                                Lunas
                                            @endif

                                        </label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Keterangan </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">{{$order->ket}}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Uang Muka </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">Rp. {{number_format($order->dp)}}</label>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Total Kotor </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">Rp. {{number_format($order->total_kotor)}}</label>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Total </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12">Rp. {{number_format($order->total)}}</label>
                                    </div>

                                    <div class="row">
                                        <label class="col-md-2 text-left s-12"><strong>Gambar Design </strong></label>
                                        <label class="s-12">:</label>
                                        <label class="ml-2 s-12"><img src="{{asset('assets/img/design/' . $order->gambar)}}" alt="" style="width: 300px;"></label>
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
