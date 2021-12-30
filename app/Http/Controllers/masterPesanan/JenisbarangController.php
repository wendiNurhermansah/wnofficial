<?php

namespace App\Http\Controllers\masterPesanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jenis_barang;
use Yajra\DataTables\Facades\DataTables;

class JenisbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jenis_barang.jenisbarang');
    }


    public function datatable(){
        $data = Jenis_barang::all();
        // dd($data);
        return DataTables::of($data)
            ->addColumn('action', function ($p) {
                return "<a href='" . route( 'MasterPesanan.jenis_barang.edit', $p->id) . "' title='Edit jenis Barang'><i class='icon-pencil mr-1'></i></a>
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Orderan'><i class='icon-remove'></i></a>";
            })

           

            ->addIndexColumn()
            ->rawColumns(['action'])
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
            'nama_barang' => 'required',
            'harga_vendor' => 'required',
            'harga_customer' => 'required'
        ]);
       

        $jenis_barang = new Jenis_barang();
        $jenis_barang-> nama_barang = $request->nama_barang;
        $jenis_barang-> harga_vendor =  str_replace(".", "",$request->harga_vendor);
        $jenis_barang-> harga_customer = str_replace(".", "",$request->harga_customer);
       
        $jenis_barang->save();

        return response()->json([
            'message' => 'Data Berhasil di Tambahkan.'
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
        $jenis = Jenis_barang::find($id);

        return $jenis;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = Jenis_barang::find($id);

        return view('jenis_barang.edit', compact('jenis'));
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
        $barang = Jenis_barang::find($id);

        $request->validate([
            'nama_barang' => 'required',
            'harga_vendor' => 'required',
            'harga_customer' => 'required'
        ]);

        $nama_barang = $request->nama_barang;
        $harga_vendor = str_replace(".", "",$request->harga_vendor);
        $harga_customer = str_replace(".", "",$request->harga_customer);

        $barang->update([
            'nama_barang' => $nama_barang,
            'harga_vendor'  => $harga_vendor,
            'harga_customer'  => $harga_customer
        ]);

        return redirect('MasterPesanan/jenis_barang')->with('status', 'data berhasil di Rubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Jenis_barang::destroy($id);
      
        return response()->json([
            'massage' => 'data berhasil di hapus.'
        ]);
    }
}
