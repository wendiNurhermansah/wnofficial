<?php

namespace App\Http\Controllers\masterPesanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Jenis_barang;
use App\Models\Jenis_orderan;
use DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    

        $barang = Jenis_barang::all();

        // dd($barang);

        return view('pesanan.order', compact('barang'));
    }

    public function barang($id)
    {
        $jenis = Jenis_barang::find($id);

        return $jenis;
    }

    public function dataTable(){
        $data = Order::all();
        // dd($data);
        return DataTables::of($data)
            ->addColumn('action', function ($p) {
                return "
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Orderan'><i class='icon-remove'></i></a>";
            })

            ->editColumn('nama', function ($p) {
                return "<a href='" . route( 'MasterPesanan.order.show', $p->id) . "' class='text-primary' title='Show Data'>".$p->nama."</a>";
            })

            ->editColumn('invoice', function($p){
                return "<a href='#' onclick='remove(" . $p->id . ")' class='text-info btn btn-dark btn-sm' title='download'><i class='icon-download'></i></a>";
            })

            ->editColumn('status', function($p){

                if ($p->status == 0) {
                    return "<button type='button' class='btn btn-outline-danger btn-sm'>Belum Lunas</button>";
                }else{

                    return "<button type='button' class='btn btn-outline-success btn-sm'>Lunas</button>";
                }
            })


            ->addIndexColumn()
            ->rawColumns(['action', 'invoice', 'nama', 'status'])
            ->toJson();
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
            'alamat' => 'required',
            'no_hp' => 'required| max: 12',
            'tanggal_order' => 'required',
            'estimasi' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $request->file('gambar')->move("assets/img/design/", $nama_file);
          }else{
            $nama_file = '';
          }

        $order = new Order();
        $order-> kode = $request->kode;
        $order-> nama = $request->nama;
        $order-> alamat = $request->alamat;
        $order-> no_hp = $request->no_hp;
        $order-> tanggal_order = $request->tanggal_order;
        $order-> estimasi = $request->estimasi;
        $order-> status = $request->status;
        $order-> ket = $request->ket;
        $order-> gambar = $nama_file;
        $order-> total_semua = $request->total_semua;
        $order-> qty_semua = $request->qty_semua;
        $order-> dp = str_replace(".", "",$request->dp);
        $order->save();

        foreach($request->id_jenis_barang as $key => $id_jenis_barang){

            $id_jenis_barang = new Jenis_orderan();
            $id_jenis_barang-> id_orders = $order->id;
            $id_jenis_barang-> id_jenis_barang = $request->id_jenis_barang[$key];
            $id_jenis_barang-> harga = $request->harga[$key];
            $id_jenis_barang-> qty = $request->qty[$key];
            $id_jenis_barang-> total = $request->total[$key];
            $id_jenis_barang->save();

            
            }


        return response()->json([
            'message' => 'Data Berhasil di tambahkan.'
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

        $order = Order::find($id);
        $jenis_orderan = Jenis_orderan::all()->where('id_orders', $id);
        // dd($barang);
        return view('pesanan.show', compact('order', 'jenis_orderan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        // dd($order);
        return view('pesanan.edit', compact('order'));
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
        $order = Order::find($id);

        if ($request->hasFile('gambar') != null) {
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $request->file('gambar')->move("assets/img/design/", $nama_file);

            $order->update([
                
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


          }else{

           $order->update([
                
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
                
    
            ]);
          }

        

        return redirect('/MasterPesanan/order')->with('status', 'data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::destroy($id);

        return response()->json([
            'message' => 'data berhasil di hapus.'
        ]);
    }
}
