<?php

namespace App\Http\Controllers\masterLaporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orderan;
use PDF;
use DateTime;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.index');
    }

    public function print_laporan(Request $request){
        // $orderan = Orderan::where('status', 2)->get();
        // $orderan2 = Orderan::where('status', 1)->get();

        if($request->tanggaldari == '' || $request->tanggalsampai == ''  || !isset($request->tanggaldari))
            return abort(403, "inputan tanggal tidak boleh kosong");

        $orderan2 = Orderan::where('status', '1')->whereBetween('tanggal', [$request->tanggaldari, $request->tanggalsampai])->get();
        $orderan = Orderan::where('status', '2')->whereBetween('tanggal', [$request->tanggaldari, $request->tanggalsampai])->get();
        
        //count
        $jumlahorderan1 = Orderan::whereBetween('tanggal', [$request->tanggaldari, $request->tanggalsampai])->count();
        $jumlahorderan = Orderan::where('status', '1')->whereBetween('tanggal', [$request->tanggaldari, $request->tanggalsampai])->count();
        $jumlahorderan2 = Orderan::where('status', '2')->whereBetween('tanggal', [$request->tanggaldari, $request->tanggalsampai])->count();
        
        $tanggaldari = $request->tanggaldari;
        
        $tanggalsampai = $request->tanggalsampai;

        //laba
        // $laba_kotor = Orderan::sum('hpp_produksi');
        $hpp = Orderan::whereBetween('tanggal', [$request->tanggaldari, $request->tanggalsampai])->sum('hpp_produksi');
        $laba_kotor = Orderan::whereBetween('tanggal', [$request->tanggaldari, $request->tanggalsampai])->sum('sub_total');
        // dd($laba_kotor);
        $laba_bersih = $laba_kotor-$hpp;
        // dd($laba_bersih);

        $pdf = PDF::loadview('laporan.print', [
            'orderan'           => $orderan,
            'orderan2'          => $orderan2, 
            'tanggaldari'       => $tanggaldari, 
            'tanggalsampai'     => $tanggalsampai, 
            'jumlahorderan'     => $jumlahorderan,
            'jumlahorderan1'    => $jumlahorderan1, 
            'jumlahorderan2'    => $jumlahorderan2,
            'laba_kotor'        => $laba_kotor, 
            'laba_bersih'       => $laba_bersih
            ]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('laporan_rekafitulasi.pdf');
        


        // return view('laporan.print', compact('orderan', 'orderan2', 'tanggaldari', 'tanggalsampai', 
        //                                     'jumlahorderan','jumlahorderan1', 'jumlahorderan2',
        //                                     'laba_kotor', 'laba_bersih'));
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
