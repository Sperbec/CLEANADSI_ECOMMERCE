<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoComprasController extends Controller
{
    public function index(){
        return view('carritocompras.index');
    }
}
