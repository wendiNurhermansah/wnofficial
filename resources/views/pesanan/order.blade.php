@extends('layouts.main')
@section('title', 'Order')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="dark orange accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-clipboard-list2 text-success s-18"></i>
                        Data Orderan
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                    <li class="nav-item">
                        <a class="nav-link active show" id="tab1" data-toggle="tab" href="#semua-data" role="tab"><i class="icon icon-home2"></i>Semua Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2" data-toggle="tab" href="#tambah-data" role="tab"><i class="icon icon-plus"></i>Tambah Pesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
<div class="container-fluid relative animatedParent animateOnce">
    <div class="container-fluid my-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="container-fluid relative animatedParent animateOnce">
            <div class="tab-content my-3" id="pills-tabContent">
                <div class="tab-pane animated fadeInUpShort show active" id="semua-data" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{session('status')}}
                                </div>
                            @endif
                            <div class="card no-b">
                                <div class="card-body">
                                    
                                        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <th width="30">No</th>
                                                <th>KODE</th>
                                                <th>NAMA</th>
                                                <th>NO HP</th>
    
                                                <th>QTY</th>
                                                <th>TOTAL</th>
                                               
                                                <th>TANGGAL</th>
                                                <TH>STATUS</TH>
                                                <th>INVOICE</th>
                                                <th>AKSI</th>                                   
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane animated fadeInUpShort" id="tambah-data" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="alert"></div>
                            
                            <div class="card">
                                <div class="card-body">
                                    <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                                        {{ method_field('POST') }}
                                        <input type="hidden" id="id" name="id"/>
                                        <h4 id="formTitle">Tambah Pesanan</h4><hr>
                                        <div class="form-row form-inline">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="row col-md-6">
                                                        <label for="nama" class="s-12 col-md-3 mt-3">Nama <span class="text-danger ml-1">*</span></label>
                                                       
                                                        <input type="text" name="nama" id="nama" class="form-control col-md-8 r-0 light s-12 mt-3 " autocomplete="off" required/>
                                                                        
                                                    </div>
                                                    <div class="row col-md-6">
                                                        <label for="tanggal_order" class="s-12 col-md-3 mt-3">Tanggal Order <span class="text-danger ml-1">*</span></label>
                                                        
                                                        <input type="date" name="tanggal_order" id="tanggal_order" class="form-control col-md-8 r-0 light s-12 mt-3 " autocomplete="off" required/>
                                                
                                                       
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="row col-md-6">
                                                        <label for="no_hp" class="s-12 col-md-3 mt-3">Telepon <span class="text-danger ml-1">*</span></label>
                                                        
                                                        <input type="text" name="no_hp" id="no_hp" class="form-control col-md-8 r-0 light s-12 mt-3 " autocomplete="off" required/>
                                                                        
                                                    </div>
                                                    <div class="row col-md-6">
                                                        <label for="estimasi" class="s-12 col-md-3 mt-3">Tanggal Selesai <span class="text-danger ml-1">*</span></label>
                                                        
                                                        <input type="date" name="estimasi" id="estimasi" class="form-control col-md-8 r-0 light s-12 mt-3 " autocomplete="off" required/>
                                                
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="row col-md-6">
                                                        <label for="gambar" class="s-12 col-md-3 mt-3">Gambar</label>
                                                        
                                                        <input type="file" name="gambar" id="gambar" class="form-control col-md-8 r-0 light s-12 mt-3 " autocomplete="off"/>
                                                       
                                                                        
                                                    </div>
                                                    <div class="row col-md-6">
                                                        <label for="status" class="s-12 col-md-3 mt-3">Status</label>
                                                        <div class="col-md-8 p-0 bg-light mt-3">
                                                            <select class="select2 form-control r-0 light s-12" name="status" id="status" autocomplete="off">
                                                                <option value="">Pilih :</option>
                                                                <option value="0">Belum Lunas</option>
                                                                <option value="1">Lunas</option>
                                                            
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="row col-md-6">
                                                        <label for="alamat" class="s-12 col-md-3 mt-3">Alamat <span class="text-danger ml-1">*</span></label>
                                                        
                                                        <textarea class="form-control col-md-8 r-0 light mt-3" name="alamat" id="alamat" cols="5" rows="5" required></textarea>
                                                
                                                        
                                                                        
                                                    </div>
                                                    <div class="row col-md-6">

                                                        <label for="ket" class="s-12 col-md-3 mt-3">Keterangan</label>
                                                            
                                                        <textarea class="form-control col-md-8 r-0 light mt-3" name="ket" id="ket" cols="5" rows="5"></textarea>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="row col-md-6">
                                                        
                                                        <label for="dp" class="s-12 col-md-3 mt-3">Uang Muka <span class="text-danger ml-1">*</span></label>
                                                        
                                                        <input type="text" name="dp" id="dp" class="form-control col-md-8 r-0 light s-12 mt-3 " onkeyup="convertToRupiah(this)" autocomplete="off" />
                                                        
                                                                        
                                                    </div>
                                                    <div class="row col-md-6">
                                                        
                                                       
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="row col-md-6">
                                                        <label for="nama_perusahaan" class="s-12 col-md-3 mt-3">Jenis Pesanan</label>
                                                        <div class="col-sm-6">
                                                            
                                                        </div>
                                                                        
                                                    </div>
                                                    <div class="row col-md-6">
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                                
                                                
                                                <div class="form-group mt-3">
                                                    
                                                    <div class="col-md-12">
                                                        <table id="dinamic" class="table table-striped table-bordered" style="width:50%">
                                                            <thead class="text-center">
                                                                <th class="text-center"><i class="icon icon-plus text-success" id="tambah"></i></th>
                                                            
                                                                <th>JENIS PESANAN</th>
                                                                <th>HARGA</th>
                                                                <th>JUMLAH</th>
                                                                <th>TOTAL</th>
                                                                
                                                                
                                                                
                                                            </thead>
                                                            <tbody id="tbody">
                                                            
                                                            
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                <td colspan="3" class="text-center">Total</td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="qty_semua" id="qty" autocomplete="off" readonly/>
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="total_semua" id="total" autocomplete="off" readonly/>      
                                                                </td>
                                                               
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>    
                                                </div>

                                            
                                                
                                                
                                                
                                                <div class="mt-4" style="margin-left: 17%">
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
       
       {data: 'qty_semua', name: 'qty_semua'},
       {data: 'total_semua', name: 'total_semua', render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp ' )},
      
       
       {data: 'tanggal_order', name: 'tanggal_order'},
       {data: 'status', name: 'status'},
       {data: 'invoice', name: 'invoice', orderable: false, searchable: false, align: 'center', className: 'text-center'},
       {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
   ]
});

//input format rupiah

function convertToRupiah(objek) {
	  separator = ".";
	  a = objek.value;
	  b = a.replace(/[^\d]/g,"");
	  c = "";
	  panjang = b.length; 
	  j = 0; 
	  for (i = panjang; i > 0; i--) {
	    j = j + 1;
	    if (((j % 3) == 1) && (j != 1)) {
	      c = b.substr(i-1,1) + separator + c;
	    } else {
	      c = b.substr(i-1,1) + c;
	    }
	  }
	  objek.value = c;

	}       

	function convertToAngka()
	{	var nominal= document.getElementById("nominal").value;
		var angka = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
		document.getElementById("angka").innerHTML= angka;
	}       

	function convertToAngka()
	{	var nominal1= document.getElementById("nominal1").value;
		var angka1 = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
		document.getElementById("angka1").innerHTML= angka;
	}



$(document).ready(function(){
        var i = 0;
        var no = 1;
        $('#tambah').click(function(){
            i++;
            no++;
            $('#dinamic').append(`<tr id="trTable`+i+`">
                                                                <td class="text-center" ><i class='icon icon-remove' id="hapus`+i+`" onclick='hapusTable(`+i+`)'></i></td>
                                                               
                                                                <td>
                                                                    <select class="select2 form-control r-0 light s-12" name="id_jenis_barang[]" id="id_jenis_barang" onchange="option2(this, `+i+`)" autocomplete="off">
                                                                        <option value="">Pilih Pesanan</option>
                                                                        @foreach ($barang as $item)
                                                                            <option value="{{$item->id}}">{{$item->nama_barang}}</option>
                                                                        @endforeach
                                                                       
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="harga[]" id="harga_`+i+`" autocomplete="off" readonly />
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="qty[]" id="jumlah_`+i+`" onkeyup="onjumlah2(`+i+`)"  autocomplete="off" />
                                                                </td>
                                                                <td>
                                                                    <input class="text-center" type="text" name="total[]" id="total_`+i+`" autocomplete="off" readonly />
                                                                </td>
                                                                
                                                                
                                                                
                                                            </tr>`);
        });

        
    });


    function hapusTable(i){
        
        //qty
        $("#trTable"+i).remove();
        var row = $("#tbody > tr").length;
        console.log(row);
        total1 =0;
        for (let index = 1; index <= row; index++) {
            var sub = $("#jumlah_"+index).val();
            console.log(sub);
            var total1 = parseInt(total1) + parseInt(sub);
            $('#qty').val(total1);
           
        }

        //jumlah_harga

        var raw = $("#tbody > tr").length;
        console.log(raw);
        total2 =0;
        for (let index = 1; index <= raw; index++) {
            var sub2 = $("#total_"+index).val();
            console.log(sub2);
            var total2 = parseInt(total2) + parseInt(sub2);
            $('#total').val(total2);
           
        }
       
    }

    // var i = 1;
    function option2(option, i){
        // i++;
        var selected = $(option).find(':selected');
        var id = $(selected).val();

        $.get("{{ route('MasterPesanan.order.barang', ':id') }}".replace(':id', id), function(data){
            // console.log(data);
            $("#harga_"+i).val(data.harga_customer);
        });
    }

    function onjumlah2(i){
        var jumlah = $("#jumlah_"+i).val();
        var jumlah2 = 0;
        // console.log(jumlah);
        var harga = $("#harga_"+i).val();
        // console.log(harga);
        var total = jumlah * harga ;

        $("#total_"+i).val(total);

        //qty

        var row = $("#tbody > tr").length;
        console.log(row);
        total1 =0;
        for (let index = 1; index <= row; index++) {
            var sub = $("#jumlah_"+index).val();
            console.log(sub);
            var total1 = parseInt(total1) + parseInt(sub);
            $('#qty').val(total1);
           
        }

        //jumlah_harga

        var raw = $("#tbody > tr").length;
        console.log(raw);
        total2 =0;
        for (let index = 1; index <= raw; index++) {
            var sub2 = $("#total_"+index).val();
            console.log(sub2);
            var total2 = parseInt(total2) + parseInt(sub2);
            $('#total').val(total2);
           
        }
       
        
    }

    //create data
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
            url = "{{ route('MasterPesanan.order.store') }}",
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
                        $.post("{{ route('MasterPesanan.order.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
                           table.api().ajax.reload();
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