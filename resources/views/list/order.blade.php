@extends('layouts.main')
@section('title', 'Tambah Orderan')

@section('content')

<div class="page has-sidebar-left height-full">
    <header class="dark orange accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-plus mr-2"></i>
                        Tambah Orderan
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
                                <div id="alert"></div>
                                <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                                    {{ method_field('POST') }}
                                    <input type="hidden" id="id" name="id"/>
                                    <h4 id="formTitle">Tambah Orderan</h4><hr>

                                    
                                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                
                                                    
                                                    <div class="form-group mt-3">
                                                        <label for="nama_cs" class="col-form-label s-12 ">NAMA CUSTOMER</label>
                                                        <input type="text" name="nama_cs" id="nama_cs" class="form-control r-0 light s-12 col-md-10" autocomplete="off" required/>
                                                    </div>

                                                    <div class="form-group m-0">
                                                        <label for="tanggal" class="col-form-label s-12">TANGGAL</label>
                                                        <input type="date" name="tanggal" id="tanggal" class="form-control r-0 light s-12 col-md-10" autocomplete="off" required/>
                                                    </div>

                                                    <div class="form-group mt-3">
                                                        <label for="alamat" class="col-form-label s-12 ">ALAMAT</label>
                                                        <textarea name="alamat" id="" class="form-control r-0 light s-12 col-md-10" cols="20" rows="5" required></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                                
                                                        <div class="col-md-10 p-0 bg-light">
                                                            <label for="status" class="col-form-label s-12 ">STATUS</label>
                                                            <select class="select2 form-control r-0 light s-12" name="status" id="statsu"   autocomplete="off">
                                                                <option value="">Pilih</option>
                                                                   
    
                                                                    <option value="1">Belum Lunas</option>
                                                                    <option value="2">Sudah Lunas</option>
                                                                        
                                                                    
                                                               
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    
         
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mt-3">
                                                    <label for="telepon" class="col-form-label s-12 ">TELEPON</label>
                                                    <input type="text" name="telepon" id="telepon" class="form-control r-0 light s-12 col-md-10" autocomplete="off" required/>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="gambar" class="col-form-label s-12 ">DESIGN</label>
                                                    <input type="file" name="gambar" id="gambar" class="form-control r-0 light s-12 col-md-10" autocomplete="off"/>
                                                </div>
                                                
                                                <div class="form-group mt-3">
                                                    <label for="ket" class="col-form-label s-12 ">KETERANGAN</label>
                                                    <textarea name="ket" id="" class="form-control r-0 light s-12 col-md-10" cols="20" rows="5" required></textarea>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="uang_muka" class="col-form-label s-12 ">UANG MUKA</label>
                                                    <input type="text" name="uang_muka" id="uang_muka" class="form-control r-0 light s-12 col-md-10" autocomplete="off"/>
                                                </div>
                                                
                                        
                                            </div>
                                        </div>
                                        <div class="mt-5" >
                                            <button type="button" class="btn btn-primary btn-sm" id="jenis_pesanan" ><i class="icon-plus mr-2"></i>TAMBAH ORDERAN<span id="txtAction"></span></button>
                                            
                                            <button type="button" class="btn btn-light btn-sm text-center ml-2" id="resset" title="reset"><i class="icon icon-autorenew blue-text ml-2 s-18"></i><span id="txtAction"></span></button>
                                            
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
                                                    
                                                </tbody>
                                                <tfoot class="text-center">
                                                    <th colspan="4" class="text-right">TOTAL SEMUA</th>
                                                    <th>
                                                        <div class="form-group">
                                                            
                                                            <input type="text" class="form-control text-center" name="sub_total" id="sub_total" aria-describedby="emailHelp" readonly>
  
                                                        </div>
                                                    </th>
                                                </tfoot>
                                            </table>
                                        </div>

                                        



                                        <div class="mt-5" style="margin-left: 42%">
                                            <button type="submit" class="btn orange btn-sm" id="action"><i class="icon-save mr-2"></i>Simpan<span id="txtAction"></span></button>
                                            <a class="btn btn-light btn-sm" onclick="add()" id="reset">Reset</a>
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

@section('script')

<script type="text/javascript">

    //format rupiah
    function addPeriod(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}


    var addId = 0;
    $('#jenis_pesanan').click(function(){
        addId++;

        $('#myTable').append(`<tr id="tr`+addId+`">
                                                        <td>
                                                            <div class="form-group">
                                                                
                                                                <div class="col-md-12 p-0 bg-light">
                                                                    <select class="select2 form-control r-0 light s-12" name="jenis_pesanan[]" id="jenis_pesanan_`+addId+`" onchange="option2(this, `+addId+`)"  autocomplete="off">
                                                                        <option value="">Pilih</option>
                                                                            @foreach ($jenis_pesanan as $i )
                                                                            <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                                                                
                                                                            @endforeach
                                                                       
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        
                                                       
                                                        <td>
                                                            <div class="form-group">
                                                            
                                                                <input type="text" class="form-control text-center" name="harga[]" id="harga_`+addId+`" aria-describedby="emailHelp" readonly>
                                                                
                                                            </div>
                                                        </td>

                                                        <td>

                                                        <div class="form-group">
                                                            
                                                            <div class="col-md-12 p-0 bg-light">
                                                                <select class="select2 form-control r-0 light s-12" name="jenis_lengan[]" id="jenis_lengan_`+addId+`" autocomplete="off">
                                                                    <option value="">Pilih</option>
                                                                
                                                                        <option value="PANJANG">PANJANG</option>
                                                                        <option value="PENDEK">PENDEK</option>
                                                                        
                                                                
                                                                </select>
                                                            </div>
                                                        </div>

                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                            
                                                                <input type="text" class="form-control text-center" onkeyup="jumlah(`+addId+`)"  name="jumlah[]" id="jumlah_`+addId+`" aria-describedby="emailHelp">
                                                                
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                            
                                                                <input type="text" class="form-control text-center" name="total1[]" id="total_`+addId+`" aria-describedby="emailHelp" readonly>
                                                                <input type="hidden" class="form-control text-center" name="total[]" id="total_2`+addId+`" aria-describedby="emailHelp" readonly>
                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
        `);
       
    });

    //reset table
    $('#resset').click(function(){
        $('#tr'+addId).last().remove();
        addId--;

        var row = $("tbody > tr").length;
        console.log(row);
        total1 =0;
        for (let index = 1; index <= row; index++) {
            var sub = $("#total_2"+index).val();
            console.log(sub);
            var total1 = parseInt(total1) + parseInt(sub);
            $('#sub_total').val(addPeriod(total1));
           
        }
        
    });

    //get data jenis pesanan

    function option2(option,addId){
        // i++;
        var selected = $(option).find(':selected');
        var id = $(selected).val();

        $.get("{{ route('MasterPesanan.jenis_pesanan.pesanan', ':id') }}".replace(':id', id), function(data){
            // console.log(data.harga);
            $('#harga_'+addId).val(addPeriod(data.harga));
  
        });
    }


    //jumlah
    function jumlah(addId){
        // alert('wendi');
        var harga =   $('#harga_'+addId).val();
        var harga_convert = harga.replace('.','');
        var jumlah = $('#jumlah_'+addId).val();
        var sub_total = harga_convert*jumlah;
        
        
        $('#total_'+addId).val(addPeriod(sub_total));

        $('#total_2'+addId).val(sub_total);
       

        //total_jumlah

        var row = $("tbody > tr").length;
        console.log(row);
        total1 =0;
        for (let index = 1; index <= row; index++) {
            var sub = $("#total_2"+index).val();
            var sub_convert = sub.replace('.','');
            
           
            console.log(sub);
            total1 += parseInt(sub);
           
           
        }
        $('#sub_total').val(addPeriod(total1));
       
    }

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
    
    //submit
    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            url = "{{ route('MasterPesanan.list_orderan.store') }}",
            $.ajax({
                url : url,
                type : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                   
                    add();
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