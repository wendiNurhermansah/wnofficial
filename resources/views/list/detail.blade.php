@extends('layouts.main')
@section('title', 'Detail Orderan')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="dark orange accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list mr-2"></i>
                        Detail Orderan Masuk
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
                                <h6 class="card-header"><strong>Data Orderan - {{ $orderan->kode }}</strong></h6>
                                <div class="card-body">
                                    <div class="box-body table-responsive no-padding mt-2" id="load">
                                        <table class="table table-hover" id="myTable">
                                            <tr>

                                                <td style="width: 200px;">KODE</td>
                                                <td style="width: 30px;">:</td>
                                                <td>{{ $orderan->kode }}</td>
                                            </tr>
                                            <tr>

                                                <td style="width: 200px;">NAMA CUSTOMER</td>
                                                <td style="width: 30px;">:</td>
                                                <td>{{ $orderan->nama_cs }}</td>
                                            </tr>
                                            <tr>

                                                <td style="width: 200px;">TELEPON</td>
                                                <td style="width: 30px;">:</td>
                                                <td>{{ $orderan->telepon }}</td>
                                            </tr>
                                            <tr>

                                                <td style="width: 200px;">TANGGAL</td>
                                                <td style="width: 30px;">:</td>
                                                <td>{{ $orderan->tanggal }}</td>
                                            </tr>
                                            <tr>

                                                <td style="width: 200px;">ALAMAT</td>
                                                <td style="width: 30px;">:</td>
                                                <td>{{ $orderan->alamat }}</td>
                                            </tr>
                                            <tr>

                                                <td style="width: 200px;">KETERANGAN</td>
                                                <td style="width: 30px;">:</td>
                                                <td>{{ $orderan->ket }}</td>
                                            </tr>
                                            <tr>

                                                <td style="width: 200px;">JENIS PESANAN</td>
                                                <td style="width: 30px;">:</td>
                                                <td>{{ $orderan->jumlah_pesanan->Pesanan->nama }}</td>
                                            </tr>
                                            

                                            <tr>

                                                <td style="width: 200px;">DESIGN</td>
                                                <td style="width: 30px;">:</td>
                                                <td><img src="{{ asset('upload_gambar/'.$orderan->gambar) }}" style="width: 50%" alt=""></td>
                                            </tr>
                                            
                                        </table>

                                        
                                    </div>
                                    <div class="box-body table-responsive no-padding mt-5" id="load">
                                        <table class="table table-hover" id="myTable">
                                            
                                            <thead class="text-center">
                                               
                                                <th>JENIS PESANAN</th>
                                                <th>HARGA</th>
                                                <th>JENIS LENGAN</th>
                                                <th>JUMLAH</th>
                                                <th>TOTAL</th>
                                                
                                            </thead>
                                            <tbody id="tbody">
                                                @foreach ($jenis_orderan as $i)
                                                    
                                              
                                                <tr>
                                                    
                                                    <td class="text-center">{{ $i->Pesanan->nama }}</td>
                                                    <td class="text-center">{{ number_format($i->harga) }}</td>
                                                    <td class="text-center">{{ $i->jenis_lengan}}</td>
                                                    <td class="text-center">{{ $i->jumlah }}</td>
                                                    <td class="text-center">{{ number_format($i->total) }}</td>
                                                </tr>

                                                @endforeach
                                                
                                            </tbody>
                                            <tfoot class="text-center">
                                                <tr>

                                               
                                                    <th colspan="4" class="text-right">TOTAL ORDERAN</th>
                                                    <th>
                                                        {{ number_format($orderan->sub_total) }}
                                                    </th>
                                                </tr>
                                                <tr>

                                               
                                                    <th colspan="4" class="text-right">UANG MUKA</th>
                                                    <th>
                                                       {{ number_format($orderan->uang_muka) }}
                                                    </th>
                                                </tr>
                                                <tr>

                                               
                                                    <th colspan="4" class="text-right">SISA BAYAR</th>
                                                    <th>
                                                        {{ number_format($orderan->sub_total-$orderan->uang_muka)}}
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
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