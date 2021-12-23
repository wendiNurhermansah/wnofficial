<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class HomeController extends Controller
{
    public function index(){
        $jumlah_order = Order::sum('kuantiti');
        $laba_kotor = Order::sum('total_kotor');
        $total = Order::sum('total');
        $laba_bersih = $total-$laba_kotor;
        $produksi = Order::where('status', 0)->count();
        // dd($produksi);
        return view('Home.dashboard', compact('jumlah_order', 'laba_kotor', 'total', 'laba_bersih', 'produksi'));
    }
}
