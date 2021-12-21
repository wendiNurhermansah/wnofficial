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
                return "<a href='#' onclick='edit(" . $p->id . ")' title='Edit Permission'><i class='icon-pencil mr-1'></i></a>
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })

            ->editColumn('nama', function ($p) {
                return "<a href='" . route( 'MasterPesanan.order.show', $p->id) . "' class='text-primary' title='Show Data'>".$p->nama."</a>";
            })

            ->editColumn('invoice', function($p){
                return "<a href='#' onclick='remove(" . $p->id . ")' class='text-info btn btn-dark btn-sm' title='download'><i class='icon-print'></i>Invoice</a>";
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
