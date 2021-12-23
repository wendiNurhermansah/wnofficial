@extends('layouts.main')
@section('title', 'Tambah  Data Order')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="dark orange accent-3 relative nav-sticky">
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
                    <div id="alert"></div>
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
                                                <!-- <div class="form-group m-0">
                                                    <label for="kode" class="col-form-label s-12 ">Kode <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="kode" id="kode" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div> -->

                                                <div class="form-group mt-0">
                                                    <label for="nama" class="col-form-label s-12 ">Nama <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="nama" id="nama" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                

                                                <div class="form-group mt-3">
                                                    <label for="no_hp" class="col-form-label s-12 ">Telepon <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="no_hp" id="no_hp" class="form-control r-0 light s-12 col-md-12" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" maxlength="12" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="no_hp" class="col-form-label s-12 ">Alamat <span class="text-danger ml-1">*</span></label>
                                                    <textarea class="form-control r-0 light s-12 col-md-12" name="alamat" id="alamat" cols="5" rows="5" required></textarea>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="harga_vendor" class="col-form-label s-12 ">Harga Vendor Dewasa</label>
                                                    <input type="number" name="harga_vendor" id="harga_vendor" class="form-control r-0 light s-12 col-md-12" autocomplete="off"/>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="harga_vendor_anak" class="col-form-label s-12 ">Harga Vendor Anak </label>
                                                    <input type="number" name="harga_vendor_anak" id="harga_vendor_anak" class="form-control r-0 light s-12 col-md-12" autocomplete="off"/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="harga_wn" class="col-form-label s-12 ">Harga Consumen Dewasa </label>
                                                    <input type="number" name="harga_wn" id="harga_wn" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="harga_anak" class="col-form-label s-12 ">Harga Consumen anak </label>
                                                    <input type="number" name="harga_anak" id="harga_anak" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="tanggal_order" class="col-form-label s-12 ">Tanggal Order <span class="text-danger ml-1">*</span></label>
                                                    <input type="date" name="tanggal_order" id="tanggal_order" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="estimasi" class="col-form-label s-12 ">Estimasi selesai <span class="text-danger ml-1">*</span></label>
                                                    <input type="date" name="estimasi" id="estimasi" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group m-3">
                                                    <label class="col-form-label s-12 ">Jenis Pesanan <span class="text-danger ml-1">*</span></label>
                                                    <div class="col-md-12 p-0 bg-light">
                                                        <select class="select2 form-control r-0 light s-12" name="jenis_pemesanan" id="jenis_pemesanan" autocomplete="off" required>
                                                            <option value="">Pilih :</option>
                                                            <option value="KAOS/T-SHIRT">KAOS / T-SHIRT</option>
                                                            <option value="KEMEJA">KEMEJA</option>
                                                            <option value="JAKET/HODDIE">JAKET / HODDIE</option>
                                                            <option value="JERSEY">JERSEY</option>
                                                            <option value="LAINNYA">LAINNYA</option>

                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group m-3">
                                                    <label class="col-form-label s-12">Status Pesanan <span class="text-danger ml-1">*</span></label>
                                                    <div class="col-md-12 p-0 bg-light">
                                                        <select class="select2 form-control r-0 light s-12" name="status" id="status" autocomplete="off" required>
                                                            <option value="">Pilih :</option>
                                                            <option value="0">Belum Lunas</option>
                                                            <option value="1">Lunas</option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>

                                                
                                                
                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group mt-0">
                                                    <label for="gambar" class="col-form-label s-12 ">Design </label>
                                                    <input type="file" name="gambar" id="gambar" class="form-control r-0 light s-12 col-md-12" autocomplete="off"/>
                                                </div>
                                                
                                                

                                                <div class="form-group mt-3">
                                                    <label for="kuantiti" class="col-form-label s-12 ">Jumlah Kuantiti <span class="text-danger ml-1">*</span></label>
                                                    <input type="number" name="kuantiti" id="kuantiti" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="jumlah_panjang" class="col-form-label s-12 ">Tangan Panjang </label>
                                                    <input type="number" name="jumlah_panjang" id="jumlah_panjang" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="jumlah_pendek" class="col-form-label s-12 ">Tangan Pendek </label>
                                                    <input type="number" name="jumlah_pendek" id="jumlah_pendek" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="qty_dewasa" class="col-form-label s-12 ">Jumlah Ukuran Dewasa </label>
                                                    <input type="number" name="qty_dewasa" id="qty_dewasa" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="qty_anak" class="col-form-label s-12 ">Jumlah Ukuran Anak </label>
                                                    <input type="number" name="qty_anak" id="qty_anak" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="dp" class="col-form-label s-12 ">Uang Muka <span class="text-danger ml-1">*</span></label>
                                                    <input type="number" name="dp" id="dp" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                

                                                <div class="form-group mt-3">
                                                    <label for="total_kotor" class="col-form-label s-12 ">Total Vendor <span class="text-danger ml-1">*</span></label>
                                                    <input type="text" name="total_kotor" id="total_kotor" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="total" class="col-form-label s-12 ">Total <span class="text-danger ml-1">*</span></label>
                                                    <input type="number" name="total" id="total" class="form-control r-0 light s-12 col-md-12" autocomplete="off" />
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

@section ('script')

<script type="text/javascript">

function add(){
        save_method = "add";
        $('#form').trigger('reset');
        $('#formTitle').html('Tambah Data');
        $('input[name=_method]').val('POST');
        $('#txtAction').html('');
        $('#reset').show();
        $('#preview').attr({ 'src': '-', 'alt': ''});
        $('#changeText').html('Browse Image')
        $('#username').focus();
    }

    add();
    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            url = "{{ route('MasterPesanan.tambah_order.store') }}",
            $.ajax({
                url : url,
                type : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    add();
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                    // table.api().ajax.reload();
                  
                },
                error : function(data){
                    err = '';
                    respon = data.responseJSON;
                    if(respon.errors){
                        $.each(respon.errors, function( index, value ) {
                            err = err + "<li>" + value +"</li>";
                        });
                    }
                    $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
                }
            });
            return false;
        }
        $(this).addClass('was-validated');
    });


</script>

@endsection
