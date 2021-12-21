<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class HomeController extends Controller
{
    public function index(){
        $jumlah_order = Order::sum('kuantiti');
        $laba_kotor = Order::sum('harga_wn');
        dd($laba_kotor);
        return view('Home.dashboard', compact('jumlah_order'));
    }
}
