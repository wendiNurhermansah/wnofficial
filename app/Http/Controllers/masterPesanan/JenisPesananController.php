<?php

namespace App\Http\Controllers\masterPesanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Jenis_pesanan;

class JenisPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jenis_pesanan.index');
    }

    public function api(){
        $jenis_pesanan = Jenis_pesanan::all();
        return DataTables::of($jenis_pesanan)
        

            ->addColumn('action', function ($p) {
                return "
                    <a href='#' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'permissions'])
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
            'harga' => 'required'
        ]);
        
        Jenis_pesanan::create([
            'nama' => $request->nama,
            'harga'=> str_replace(".", "",$request->harga)

        ]);
        return response()->json([
            'message' => 'Data berhasil tersimpan.'
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
        return Jenis_pesanan::find($id);
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
        $request->validate([
            'nama' => 'required',
            'harga' => 'required'
        ]);

       
        $jenis_pesanan = Jenis_pesanan::findOrfail($id);
        $jenis_pesanan->update([
            'nama' => $request->nama,
            'harga'=> str_replace(".", "",$request->harga)
        ]);
        return response()->json([
            'message' => 'Data berhasil di perbaharui.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jenis_pesanan::destroy($id);
        return response()->json([
            'massage' => 'data berhasil di hapus.'
        ]);
    }

    public function pesanan($id){
        $jenis = Jenis_pesanan::find($id);
        return $jenis;
    }
}
