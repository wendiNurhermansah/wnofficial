<?php

namespace App\Http\Controllers\masterPesanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class Tambah_orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pesanan.tambah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          
          'nama' => 'required',
          'no_hp' => 'required|max: 12',
          'alamat' => 'required',
          
          
          'tanggal_order' => 'required',
          'estimasi' => 'required',
          'jenis_pemesanan' => 'required',
          'kuantiti' => 'required',
          'status' => 'required',
        
          
      ]);
      
      if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $request->file('gambar')->move("assets/img/design/", $nama_file);
      }else{
        $nama_file = '';
      }

       Order::create([
        'kode' => $request->kode,
        'nama' => $request->nama,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'harga_vendor' => $request->harga_vendor,
        'harga_wn' => $request->harga_wn,
        'tanggal_order' => $request->tanggal_order,
        'estimasi' => $request->estimasi,
        'jenis_pemesanan' => $request->jenis_pemesanan,
        'kuantiti' => $request->kuantiti,
        'jumlah_panjang' => $request->jumlah_panjang,
        'jumlah_pendek' => $request->jumlah_pendek,
        'status' => $request->status,
        'dp' => $request->dp,
        'ket' => $request->ket,
        'total' => $request->total,
        'total_kotor' => $request->total_kotor,
        'qty_anak' => $request->qty_anak,
        'qty_dewasa' => $request->qty_dewasa,
        'harga_vendor_anak' => $request->harga_vendor_anak,
        'harga_anak' => $request->harga_anak,
        'gambar' => $nama_file,

      ]);

       return response()->json([
          'message' => 'data berhasil di simpan.'
      ]);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
