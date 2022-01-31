<?php

namespace App\Http\Controllers\masterPesanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jenis_pesanan;
use App\Models\Jumlah_orderan;
use App\Models\Orderan;
use Illuminate\Support\Facades\DB;

class OrderanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        
        $orderan = Orderan::with('jumlah_pesanan')->orderBy('status')->paginate(25);
        // dd($orderan);

        return view('list.index', compact('orderan'));
    }

    public function order(){

        
        $jenis_pesanan = Jenis_pesanan::all();
        return view('list.order', compact('jenis_pesanan'));
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
        
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $request->file('gambar')->move("upload_gambar", $nama_file);


        $Orderan = new Orderan();
        $Orderan-> kode = $request->kode;
        $Orderan-> tanggal = $request->tanggal;
        $Orderan-> nama_cs =  $request->nama_cs;
        $Orderan-> alamat = $request->alamat;
        $Orderan-> telepon = $request->telepon;
        $Orderan-> ket = $request->ket;
        $Orderan-> uang_muka = $request->uang_muka;
        $Orderan-> gambar = $nama_file;
        $Orderan-> status = $request->status;
        $Orderan-> sub_total = str_replace(".", "",$request->sub_total);
        $Orderan->save();

        foreach($request->jenis_pesanan as $key => $jumlah_orderan){

            $jumlah_orderan = new Jumlah_orderan();
            
            $jumlah_orderan->id_orderan = $Orderan->id;
            $jumlah_orderan->jenis_pesanan = $request->jenis_pesanan[$key];
            $jumlah_orderan->jenis_lengan = $request->jenis_lengan[$key];
            $jumlah_orderan->harga = str_replace(".", "",$request->harga[$key]);
            $jumlah_orderan->total = $request->total[$key];
            $jumlah_orderan->jumlah = $request->jumlah[$key];
           
            $jumlah_orderan->save();
    
            
           
               
            
            }

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
        $orderan = Orderan::with('jumlah_pesanan')->find($id);
        
        $jenis_orderan = Jumlah_orderan::where('id_orderan', $id)->get();
        // dd($jenis_orderan);

        return view('list.detail', compact('orderan', 'jenis_orderan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderan = Orderan::with('jumlah_pesanan')->find($id);
        return view('list.edit_status', compact('orderan'));
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
        $orderan = Orderan::with('jumlah_pesanan')->find($id);
        // dd($orderan);

        
        $orderan->update([
            'status' => $request->status, 
        ]);
       
        return redirect('/MasterPesanan/list_orderan')->with('status', 'data berhasil diubah');


        
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

    public function pencarian(Request $request){
        $cari = $request->pencarian;
    
        // mengambil data dari table pegawai sesuai pencarian data
        $orderan = Orderan::with('jumlah_pesanan')
        ->orderBy('status')
        ->where('nama_cs','like',"%".$cari."%")
        ->paginate();

        return view('list.index', compact('orderan'));
    }
}