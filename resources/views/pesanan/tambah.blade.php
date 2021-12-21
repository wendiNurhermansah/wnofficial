@extends('layouts.main')
@section('title', 'Tambah  Data Order')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row">
                <div class="col">
                    <h4>
                        <i class="icon icon-plus mr-2"></i>
                        Tambah Orderan
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
                        <div class="card">
                            <h6 class="card-header"><strong>Data Pemesan</strong></h6>
                            <div class="card-body">

                            <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                                    {{ method_field('POST') }}
                                    <input type="hidden" id="id" name="id"/>
                                    
                                    <div class="form-row form-inline">
                                       
                                       
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group m-0">
                                                    <label for="kode" class="col-form-label s-12 ">Kode <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="kode" id="kode" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="nama" class="col-form-label s-12 ">Nama <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="nama" id="nama" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                

                                                <div class="form-group mt-3">
                                                    <label for="no_hp" class="col-form-label s-12 ">Telepon <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="no_hp" id="no_hp" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="no_hp" class="col-form-label s-12 ">Alamat <span class="text-danger ml-1">*</span></label>
                                                    <textarea class="form-control r-0 light s-12 col-md-12" name="alamat" id="alamat" cols="5" rows="5"></textarea>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="harga_vendor" class="col-form-label s-12 ">Harga Vendor <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="harga_vendor" id="harga_vendor" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="harga_wnx" class="col-form-label s-12 ">Harga Consumen <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="harga_wnx" id="harga_wnx" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="tanggal_order" class="col-form-label s-12 ">Tanggal Order <span class="text-danger ml-1">*</span></label>
                                                    <input type="date" name="tanggal_order" id="tanggal_order" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="estimasi" class="col-form-label s-12 ">Estimasi selesai <span class="text-danger ml-1">*</span></label>
                                                    <input type="date" name="estimasi" id="estimasi" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>
                                                
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group mt-0">
                                                    <label for="gambar" class="col-form-label s-12 ">Design <span class="text-danger ml-1">*</span></label>
                                                    <input type="file" name="gambar" id="gambar" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>
                                                
                                                <div class="form-group m-3">
                                                    <label class="col-form-label s-12 ">Jenis Pesanan <span class="text-danger ml-1">*</span></label>
                                                    <div class="col-md-12 p-0 bg-light">
                                                        <select class="select2 form-control r-0 light s-12" name="jenis_pemesanan" id="jenis_pemesanan" autocomplete="off">
                                                            <option value="">Pilih :</option>
                                                            <option value="KAOS/T-SHIRT">KAOS / T-SHIRT</option>
                                                            <option value="KEMEJA">KEMEJA</option>
                                                            <option value="JAKET/HODDIE">JAKET / HODDIE</option>
                                                            <option value="JERSEY">JERSEY</option>
                                                            <option value="LAINNYA">LAINNYA</option>

                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="kuantiti" class="col-form-label s-12 ">Jumlah <span class="text-danger ml-1">*</span></label>
                                                    <input type="number" name="kuantiti" id="kuantiti" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="jumlah_panjang" class="col-form-label s-12 ">Tangan Panjang <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="jumlah_panjang" id="jumlah_panjang" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="jumlah_pendek" class="col-form-label s-12 ">Tangan Pendek <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="jumlah_pendek" id="jumlah_pendek" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="dp" class="col-form-label s-12 ">Uang Muka <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="dp" id="dp" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group m-3">
                                                    <label class="col-form-label s-12">Status Pesanan <span class="text-danger ml-1">*</span></label>
                                                    <div class="col-md-12 p-0 bg-light">
                                                        <select class="select2 form-control r-0 light s-12" name="status" id="status" autocomplete="off">
                                                            <option value="">Pilih :</option>
                                                            <option value="0">Belum Lunas</option>
                                                            <option value="1">Lunas</option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="ket" class="col-form-label s-12">Keterangan </label>
                                                    <textarea class="form-control r-0 light s-12 col-md-12" name="ket" id="ket" cols="5" rows="5"></textarea>
                                                </div>

                                               
                                            </div>

                                        </div>
                                            
                                           
                                            
                                            <div class="mt-5" style="margin-left: 45%">
                                                <button type="submit" class="btn btn-primary btn-sm" id="action"><i class="icon-save mr-2"></i>Simpan<span id="txtAction"></span></button>
                                                <a class="btn btn-sm" onclick="add()" id="reset">Reset</a>
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
