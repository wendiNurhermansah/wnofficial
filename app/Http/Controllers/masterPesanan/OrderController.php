<?php

namespace App\Http\Controllers\masterPesanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
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
        return view('pesanan.order');
    }

    public function dataTable(){
        $data = Order::all();
        // dd($data);
        return DataTables::of($data)
            ->addColumn('action', function ($p) {
                return "<a href='" . route( 'MasterPesanan.order.edit', $p->id) . "' title='Edit Orderan'><i class='icon-pencil mr-1'></i></a>
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
        //
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
        // dd($order);
        return view('pesanan.show', compact('order'));
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
