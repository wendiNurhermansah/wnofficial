<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>
<body>

    
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   

    <title>Laporan</title>
  </head>
  <body>
      @php
          setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
      @endphp
    <div class="container">
        <h4 style="text-align: center;">Laporan Rekafitulasi Orderan</h4>
        <h4 style="text-align: center;">WN-OFFICIAL</h4>
        <h5 style="text-align: center;">Periode : {{ $tanggaldari }}  s/d {{$tanggalsampai}}</h5>
        <hr>


        <h4>Laporan Selesai Produksi :</h4>
        <table style="border: 1px solid black; font-size: 8px; width: 100%">
            <thead style="background-color: rgb(223, 217, 217)">
                <th style="width: 20px">NO</th>
                <th style="width: 40px">KODE</th>
                <th style="width: 80px">NAMA CUSTOMER</th>
                <th style="width: 60px">TELEPON</th>
                <th style="width: 80px">JENIS PESANAN</th>
                <th style="width: 40px">TANGGAL</th>
                <th style="width: 60px">STATUS PRODUKSI</th>
                <th style="width: 30px">STATUS BAYAR</th>
                <th style="width: 30px">TOTAL</th>
                <th style="width: 80px">ALAMAT</th>                                                
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @forelse ($orderan as $item)
                
                <tr style="text-align: center">
                    <td>{{ $no++ }}</td>
                    <td class="text-left">{{ $item->kode }}</td>
                    <td class="text-left">{{ $item->nama_cs }}</td>
                    <td class="text-left">{{ $item->telepon }}</td>
                    <td class="text-left">{{ $item->jumlah_pesanan->Pesanan->nama }}</td>
                    <td class="text-left">{{ $item->tanggal }}</td>
                    <td>
                        @if ($item->status == 1)
                            <p class="btn btn-warning btn-sm" style="background-color: orange">Sedang Produksi</p>
                            
                        @else
                            <p class="btn btn-success btn-sm" style="background-color: rgb(43, 247, 115)">Selesai</p>
                        @endif
                        
                    </td>
                    <td>
                        @if ($item->status_bayar == 1)
                            <p class="btn btn-danger btn-sm" style="background-color: rgb(245, 39, 39)">Belum Lunas</p>
                            
                        @else
                            <p class="btn btn-success btn-sm" style="background-color: rgb(43, 247, 115)">Lunas</p>
                        @endif
                        
                    </td>
                    <td class="text-left">{{ number_format("$item->sub_total") }}</td>
                    <td class="text-left">{{ $item->alamat }}</td>
                    
                </tr>
                @empty
                <tr>
                    <td style="text-align: center" colspan="10">Data Tidak Ditemukan!</td>
                </tr>
                    
                @endforelse

            </tbody>
        </table>

       <h4 style="margin-top: 50px;">Laporan Sedang Proses Produksi :</h4>
       <table style="border: 1px solid black; font-size: 8px; width: 100%">
        <thead style="background-color: rgb(223, 217, 217)">
            <th style="width: 20px">NO</th>
                <th style="width: 40px">KODE</th>
                <th style="width: 80px">NAMA CUSTOMER</th>
                <th style="width: 60px">TELEPON</th>
                <th style="width: 80px">JENIS PESANAN</th>
                <th style="width: 40px">TANGGAL</th>
                <th style="width: 60px">STATUS PRODUKSI</th>
                <th style="width: 30px">STATUS BAYAR</th>
                <th style="width: 30px">TOTAL</th>
                <th style="width: 80px">ALAMAT</th>                                                 
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @forelse ($orderan2 as $item)
                
            <tr style="text-align: center">
                <td>{{ $no++ }}</td>
                <td class="text-left">{{ $item->kode }}</td>
                <td class="text-left">{{ $item->nama_cs }}</td>
                <td class="text-left">{{ $item->telepon }}</td>
                <td class="text-left">{{ $item->jumlah_pesanan->Pesanan->nama }}</td>
                <td class="text-left">{{ $item->tanggal }}</td>
                <td>
                    @if ($item->status == 1)
                        <p class="btn btn-warning btn-sm" style="background-color: orange">Sedang Produksi</p>
                        
                    @else
                        <p class="btn btn-success btn-sm" style="background-color: rgb(43, 247, 115)">Selesai</p>
                    @endif
                    
                </td>
                <td>
                    @if ($item->status_bayar == 1)
                        <p class="btn btn-danger btn-sm" style="background-color: rgb(245, 39, 39)">Belum Lunas</p>
                        
                    @else
                        <p class="btn btn-success btn-sm" style="background-color: rgb(43, 247, 115)">Lunas</p>
                    @endif
                    
                </td>
                <td class="text-left">{{ number_format("$item->sub_total") }}</td>
                <td class="text-left">{{ $item->alamat }}</td>
                
            </tr>
            @empty
            <tr>
                <td style="text-align: center" colspan="10">Data Tidak Ditemukan!</td>
            </tr>
                
            @endforelse 
            
            
            

           

        </tbody>
    </table>


    <div style="margin-top: 30px">
        <h4>KETERANGAN : </h4>
         <h5 style="margin-left: 20px;">Jumlah Orderaran :  {{ $jumlahorderan1 }} pcs</h5>
         <h5 style="margin-left: 20px;">Jumlah Orderaran Selesai : {{ $jumlahorderan2 }} pcs</h5>
         <h5 style="margin-left: 20px;">Jumlah Orderaran Sedang Proses Produksi : {{ $jumlahorderan }} pcs</h5>
         <h5 style="margin-left: 20px;">Laba Kotor : Rp. {{ number_format($laba_kotor, 2) }} </h5>
         <h5 style="margin-left: 20px;">Laba Bersih : Rp. {{ number_format($laba_bersih, 2) }} </h5>
    </div>
          

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>

    
</body>
</html>