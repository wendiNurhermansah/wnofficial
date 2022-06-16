<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jumlah_orderan;
use App\Models\Orderan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_orderan = Orderan::count();
        
        $laba_kotor = Orderan::sum('hpp_produksi');
        $bersih = Orderan::sum('sub_total');
        $laba_bersih = $bersih-$laba_kotor;
        // dd($laba_kotor);

        // $panjang = Jumlah_orderan::where('jenis_lengan', 'PANJANG')->sum('jumlah');
        // $pendek = Jumlah_orderan::where('jenis_lengan', 'PENDEK')->sum('jumlah');
        // dd($pendek);
        $selesai = Orderan::where('status', 2)->count();
        $produksi = Orderan::where('status', 1)->count();
        // dd($selesai);

        return view('home.dashboard', compact('jumlah_orderan', 'produksi', 'laba_kotor', 'laba_bersih', 'bersih', 'selesai'));
    }
}
