<?php

namespace App\Http\Controllers\masterPesanan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderanController extends Controller
{
    public function index(){
        return view('list.index');
    }
}
