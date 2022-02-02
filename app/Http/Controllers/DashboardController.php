<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class DashboardController extends Controller
{
    public function index(){

       
        
        return view('Home.dashboard');
    }
}
