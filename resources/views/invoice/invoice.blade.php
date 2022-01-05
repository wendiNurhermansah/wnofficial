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
        <a class="btn btn-primary"  href="{{route('MasterPesanan.order.index')}}">Home</a> 
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
                           
                           <h6 style="margin-top: 20px; margin-left: 40px;">KODE : {{$order->kode}}</h6>
                           <h6 style="margin-LEFT: 40px; ">TANGGAL : {{$order->tanggal_order}}</h6>
                           <h6 style="margin-LEFT: 40px;">ESTIMASI : {{$order->estimasi}}</h6>
    
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
                            
                            <div>Paradise Serpong City, Babakan,Setu <br> 
                                 KOTA TANGERANG SELATAN - BANTEN, ID 15315</div>
                            <div>081214255669</div>
                        </div>
                        <div class="col-sm-4">
                            <h6 class="mb-3">Untuk:</h6>
                            <div>
                                <strong>{{$order->nama}}</strong>
                            </div>
                            
                            <div>{{$order->alamat}}</div>
                           
                            <div>{{$order->no_hp}}</div>
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">No</th>
                                    <th>Jenis Pesanan</th>
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
                                    <td class="left strong">{{$i->barang->nama_barang}}</td>
                                    <td class="left">{{$i->qty}}</td>
                                    <td class="right">{{number_format($i->harga)}}</td>
                                    
                                    <td class="right">{{number_format($i->total)}}</td>
                                </tr>
    
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                            <h6 style="margin-top: 20px; color: red;">Terimakasih Atas Kepercayaan Anda Kepada Kami !!!</h6>
                        </div>
                        <div class="col-lg-4 col-sm-5 mt-1" style="margin-left: 670px;">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="right">{{number_format($order->total_semua)}}</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Uang Muka</strong>
                                        </td>
                                        <td class="right">{{number_format($order->dp)}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong>{{number_format($order->total_semua-$order->dp)}}</strong>
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