<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INVOICE - WN-OFFICIAL</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
    
</head>
<body>
    <div class="container">
        <div  class="mt-4 mb-1">
        <a class="btn btn-primary"  href="{{route('MasterPesanan.list_orderan.index')}}">Home</a> 
        <a class="btn btn-dark" id="btn-Preview-Image" href="#">Convert Invoice Ke PNG</a> 
        <a id="klik_cetak" class="btn btn-info" href="#">Download Invoice</a>
        
        </div>
        <div id="convert">
            <h6>Hasil Convert Invoice Jadi PNG :</h6>
        </div>
        <div id="show">

            <div id="previewImage" class="mt-2">
                
            </div> 
        </div>

        <div id="sebelum" class="mt-4">
            <h6>Hasil Sebelum di Convert Invoice Ke PNG :</h6>
        </div>

        <div id="hide">
            <div class="card" id="cetak_invoice" style="margin-top: 10px;">
                <div class="card-header" >
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{asset('assets/img/logo/WN_OFFICIAL.png')}}" alt="" style="width: 25%;">
    
                        </div>
                        <div class="col-md-4">
                           <h2 style="margin-top: 20px;">INVOICE</h2>
                           
    
                        </div>
                        <div class="col-md-4">
                           
                           <h6 style="margin-top: 20px; margin-left: 40px;">KODE : {{$orderan->kode}}</h6>
                           <h6 style="margin-LEFT: 40px; ">TANGGAL : {{$orderan->tanggal}}</h6>
                           
    
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-8">
                            <h6 class="mb-3">Dari:</h6>
                            <div>
                                <strong>WN-OFFICIAL</strong>
                            </div>
                            
                            <div>
                                <p> Paradise Serpong City, Babakan,Setu  </p>
                                
                                <p>Kota Tangerang Selatan - Banten, Id 15315</p>

                            </div>
                            <div>081214255669</div>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">Untuk:</h6>
                            <div>
                                <strong>{{$orderan->nama_cs}}</strong>
                            </div>
                            
                            <div>{{$orderan->alamat}}</div>
                           
                            <div>{{$orderan->telepon}}</div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">No</th>
                                    <th>Jenis Pesanan</th>
                                    <th>Jenis Tangan</th>
                                    <th>Qty</th>
                                    <th class="right">Harga</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                 $no = 1;
                                @endphp
                                @foreach($jenis_orderan as $i)
                                <tr>
                                    <td class="center">{{$no++}}</td>
                                    <td class="left strong">{{$i->Pesanan->nama}}</td>
                                    <td>{{$i->jenis_lengan}}</td>
                                    <td class="left">{{$i->jumlah}}</td>
                                    <td class="right">{{number_format($i->harga)}}</td>
                                    
                                    <td class="right">{{number_format($i->total)}}</td>
                                </tr>
    
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                       
                        <div class="col-lg-4 col-sm-5 mt-1" style="margin-left: 690px;">
                            <table class="table table-clear" style="margin-left: 55px;">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Ongkir</strong>
                                        </td>
                                        <td class="right">{{number_format($orderan->ongkir)}}</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="right">{{number_format($orderan->sub_total+$orderan->ongkir)}}</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Uang Muka</strong>
                                        </td>
                                        <td class="right">{{number_format($orderan->uang_muka)}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong>{{number_format($orderan->sub_total+$orderan->ongkir-$orderan->uang_muka)}}</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        

    

        

    
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/html2canvas.js')}}"></script>

    <script> 
        $('#convert').hide();
        $('#klik_cetak').hide();
        $('#sebelum').hide();

        $("#btn-Preview-Image").click(function(){
            $('#klik_cetak').show();
            $('#btn-Preview-Image').hide();
            $('#convert').show();
            $('#sebelum').show();
           
        });
        $(document).ready(function() { 

            // $('#cetak_invoice').hide();
           
            // Global variable 
            var element = $("#cetak_invoice");  
           
            // Global variable 
            var getCanvas;  
            $("#btn-Preview-Image").on('click', function() { 
                html2canvas(element, { 
                onrendered: function(canvas) { 
                        $("#previewImage").append(canvas); 
                        getCanvas = canvas; 
                    } 
                }); 
            }); 
           
            $("#klik_cetak").on('click', function() { 
                var imgageData =  
                    getCanvas.toDataURL("image/png",1); 
               
                // Now browser starts downloading  
                // it instead of just showing it 
                var newData = imgageData.replace( 
                /^data:image\/png/, "data:application/octet-stream"); 
               
                $("#klik_cetak").attr( 
                "download", "Invoice.png").attr( 
                "href", newData); 
            }); 
        }); 
    </script> 

    
</body>


</html>