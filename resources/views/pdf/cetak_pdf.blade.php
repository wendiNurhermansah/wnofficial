<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak File</title>
</head>
<body>
    <div class="container">

        <h1 style="text-align: center; font-size: 20px">List Daftar Orderan</h1>
        <hr><hr>
    </div>

    <div style="margin-top: 10px; font-size: 10px;" >
       <table>
            <thead style="background-color: rgb(223, 217, 217)">
                <th style="width: 20px">NO</th>
                <th style="width: 60px">KODE</th>
                <th style="width: 100px">NAMA CUSTOMER</th>
                <th style="width: 80px">TELEPON</th>
                <th style="width: 120px">JENIS PESANAN</th>
                <th style="width: px">TANGGAL</th>
                <th style="width: 60px">STATUS PRODUKSI</th>
                <th style="width: 30px">STATUS BAYAR</th>
                <th style="width: 30px">TOTAL</th>
                <th style="width: px">ALAMAT</th>                                                
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($orderan as $item)
                
            
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

                @endforeach    

            </tbody>
       </table>
    </div>
</body>
</html>