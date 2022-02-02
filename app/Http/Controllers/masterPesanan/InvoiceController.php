<?php

namespace App\Http\Controllers\masterPesanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orderan;
use App\Models\Jumlah_orderan;

class InvoiceController extends Controller
{
    public function index($id){
        $orderan = Orderan::with('jumlah_pesanan')->find($id);
        
        $jenis_orderan = Jumlah_orderan::where('id_orderan', $id)->get();

        return view('invoice.invoice', compact('orderan', 'jenis_orderan'));
    }
}
