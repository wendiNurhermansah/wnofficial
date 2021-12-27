@extends('layouts.main')
@section('title', 'Edit Data Order')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="dark orange accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h4>
                        <i class="icon icon-pencil mr-2"></i>
                        Edit Orderan
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                   
                    
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content my-3" id="pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="semua-data" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                    <div id="alert"></div>
                        <div class="card">
                            <h6 class="card-header"><strong>Data Orderan</strong></h6>
                            <div class="card-body">

                            <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" action="{{ route('MasterPesanan.order.update', $order->id) }}" novalidate>
                                    {{ method_field('PATCH') }}
                                    @csrf
                                    <input type="hidden" id="id" name="id" value="{{$order->id}}"/>
                                    <input type="hidden" name="kode" id="kode" value="{{$order->id}}" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                    
                                    <div class="form-row form-inline">
                                       
                                       
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- <div class="form-group m-0">
                                                    <label for="kode" class="col-form-label s-12 ">Kode <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="kode" id="kode" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div> -->

                                                <div class="form-group mt-0">
                                                    <label for="nama" class="col-form-label s-12 ">Nama <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" value="{{$order->nama}}" name="nama" id="nama" class="form-control r-0 light s-12 col-md-12"  autocomplete="off" required/>
                                                </div>

                                                

                                                <div class="form-group mt-3">
                                                    <label for="no_hp" class="col-form-label s-12 ">Telepon <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" value="{{$order->no_hp}}" name="no_hp" id="no_hp" class="form-control r-0 light s-12 col-md-12" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" maxlength="12" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="no_hp" class="col-form-label s-12 ">Alamat <span class="text-danger ml-1">*</span></label>
                                                    <textarea class="form-control r-0 light s-12 col-md-12" name="alamat" id="alamat" cols="5" rows="5" required>{{$order->alamat}}</textarea>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="harga_vendor" class="col-form-label s-12 ">Harga Vendor Dewasa</label>
                                                    <input type="number" value="{{$order->harga_vendor}}" name="harga_vendor" id="harga_vendor" class="form-control r-0 light s-12 col-md-12" autocomplete="off"/>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="harga_vendor_anak" class="col-form-label s-12 ">Harga Vendor Anak </label>
                                                    <input type="number" value="{{$order->harga_vendor_anak}}" name="harga_vendor_anak" id="harga_vendor_anak" class="form-control r-0 light s-12 col-md-12" autocomplete="off"/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="harga_wn" class="col-form-label s-12 ">Harga Consumen Dewasa </label>
                                                    <input type="number" value="{{$order->harga_wn}}" name="harga_wn" id="harga_wn" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="harga_anak" class="col-form-label s-12 ">Harga Consumen anak </label>
                                                    <input type="number" value="{{$order->harga_anak}}" name="harga_anak" id="harga_anak" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="tanggal_order" class="col-form-label s-12 ">Tanggal Order <span class="text-danger ml-1">*</span></label>
                                                    <input type="date" value="{{$order->tanggal_order}}" name="tanggal_order" id="tanggal_order" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="estimasi" class="col-form-label s-12 ">Estimasi selesai <span class="text-danger ml-1">*</span></label>
                                                    <input type="date" value="{{$order->estimasi}}" name="estimasi" id="estimasi" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group m-3">
                                                    <label class="col-form-label s-12 ">Jenis Pesanan <span class="text-danger ml-1">*</span></label>
                                                    <div class="col-md-12 p-0 bg-light">
                                                        <select class="select2 form-control r-0 light s-12" name="jenis_pemesanan" id="jenis_pemesanan" autocomplete="off" required>
                                                            <option value="">Pilih :</option>
                                                            <option value="KAOS/T-SHIRT" {{ $order->jenis_pemesanan == 'KAOS/T-SHIRT' ? 'selected' : '' }}>KAOS / T-SHIRT</option>
                                                            <option value="KEMEJA" {{ $order->jenis_pemesanan == 'KEMEJA' ? 'selected' : '' }}>KEMEJA</option>
                                                            <option value="JAKET/HODDIE" {{ $order->jenis_pemesanan == 'JAKET/HODDIE' ? 'selected' : '' }}>JAKET / HODDIE</option>
                                                            <option value="JERSEY" {{ $order->jenis_pemesanan == 'JERSEY' ? 'selected' : '' }}>JERSEY</option>
                                                            <option value="LAINNYA" {{ $order->jenis_pemesanan == 'LAINNYA' ? 'selected' : '' }}>LAINNYA</option>

                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group m-3">
                                                    <label class="col-form-label s-12">Status Pesanan <span class="text-danger ml-1">*</span></label>
                                                    <div class="col-md-12 p-0 bg-light">
                                                        <select class="select2 form-control r-0 light s-12" name="status" id="status" autocomplete="off" required>
                                                            <option value="">Pilih :</option>
                                                            <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Belum Lunas</option>
                                                            <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Lunas</option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>

                                                
                                                
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group mt-0">
                                                    <label for="gambar" class="col-form-label s-12 ">Design </label>
                                                    <input type="file" name="gambar"  id="gambar" class="form-control r-0 light s-12 col-md-12" autocomplete="off"/>
                                                    <p>Nama File Design : {{$order->gambar}} </p>
                                                </div>
                                                
                                                

                                                <div class="form-group mt-1">
                                                    <label for="kuantiti" class="col-form-label s-12 ">Jumlah Kuantiti <span class="text-danger ml-1">*</span></label>
                                                    <input type="number" value="{{$order->kuantiti}}" name="kuantiti" id="kuantiti" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="jumlah_panjang" class="col-form-label s-12 ">Tangan Panjang </label>
                                                    <input type="number" value="{{$order->jumlah_panjang }}" name="jumlah_panjang" id="jumlah_panjang" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="jumlah_pendek" class="col-form-label s-12 ">Tangan Pendek </label>
                                                    <input type="number" name="jumlah_pendek" value="{{$order->jumlah_pendek}}" id="jumlah_pendek" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="qty_dewasa" class="col-form-label s-12 ">Jumlah Ukuran Dewasa </label>
                                                    <input type="number" name="qty_dewasa" value="{{$order->qty_dewasa}}" id="qty_dewasa" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="qty_anak" class="col-form-label s-12 ">Jumlah Ukuran Anak </label>
                                                    <input type="number" name="qty_anak" value="{{$order->qty_anak}}" id="qty_anak" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="dp" class="col-form-label s-12 ">Uang Muka <span class="text-danger ml-1">*</span></label>
                                                    <input type="number" name="dp" id="dp" value="{{$order->dp}}" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                

                                                <div class="form-group mt-3">
                                                    <label for="total_kotor" class="col-form-label s-12 ">Total Vendor <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="total_kotor" value="{{$order->total_kotor}}" id="total_kotor" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="total" class="col-form-label s-12 ">Total <span class="text-danger ml-1">*</span></label>
                                                    <input type="number" name="total" id="total" value="{{$order->total}}" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="ket" class="col-form-label s-12">Keterangan </label>
                                                    <textarea class="form-control r-0 light s-12 col-md-12" name="ket" id="ket" cols="5" rows="5">{{$order->ket}}</textarea>
                                                </div>

                                                

                                               
                                            </div>

                                        </div>
                                            
                                           
                                            
                                            <div class="mt-4" style="margin-left: 47%">
                                                <button type="submit" class="btn btn-success btn-sm" id="action"><i class="icon-save mr-2"></i>Ubah<span id="txtAction"></span></button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section ('script')

<script type="text/javascript">


</script>

@endsection
