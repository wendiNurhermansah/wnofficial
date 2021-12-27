@extends('layouts.main')
@section('title', 'Edit Jenis Barang')



@section('content')

<div class="page has-sidebar-left height-full">
    <header class="orange accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>                       
                        <i class="icon icon-users mr-2"></i>
                        Edit Jenis Barang               
                    </h4>
                </div>
            </div>
        </div>
    </header>
        <div class="container-fluid relative animatedParent animateOnce">
            <div class="container-fluid relative animatedParent animateOnce">
                <div class="tab-content my-3" id="pills-tabContent">
                    <div class="tab-pane animated fadeInUpShort show active"  id="semua-data" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{session('status')}}
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-body">
                                        <form class="needs-validation" id="form" method="POST" action="{{ route('MasterPesanan.jenis_barang.update', $jenis->id) }}" enctype="multipart/form-data" novalidate>
                                            {{ method_field('PATCH') }}
                                            @csrf
                                            <input type="hidden" id="id" name="id" value="{{$jenis->id}}"/>
                                            <h4 id="formTitle">Edit Jenis Barang</h4><hr>
                                            <div class="form-row form-inline">
                                                <div class="col-md-8">
                                                    <div class="form-group m-0">
                                                        <label for="nama_barang" class="col-form-label s-12 col-md-2">Nama Barang</label>
                                                        <input type="text" name="nama_barang" id="nama_barang" class="form-control r-0 light s-12 col-md-6" autocomplete="off" value="{{$jenis->nama_barang}}"/>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="harga_vendor" class="col-form-label s-12 col-md-2">Harga Vendor</label>
                                                        <input type="text" name="harga_vendor" id="harga_vendor" onkeyup="convertToRupiah(this)" class="form-control r-0 light s-12 col-md-6" autocomplete="off" value="{{$jenis->harga_vendor}}"/>
                                                    </div>
                                                
                                                    <div class="form-group mt-3">
                                                        <label for="harga_customer" class="col-form-label s-12 col-md-2">Harga Customer</label>
                                                        <input type="text" name="harga_customer" id="harga_customer" onkeyup="convertToRupiah(this)" class="form-control r-0 light s-12 col-md-6" autocomplete="off" value="{{$jenis->harga_customer}}"/>
                                                    </div>
                                                    
                                                    <div class="mt-4" style="margin-left: 17%">
                                                        <button type="submit" class="btn btn-success btn-sm" id="action"><i class="icon-save mr-2"></i>Rubah<span id="txtAction"></span></button>
                                                    
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


    

  

    </script>

@endsection