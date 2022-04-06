<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function inicio()
    {
        return view('frontend.inicio');
    }

    /* aseo personal */
    
    public function aseopp()
    {
        return view('frontend.aseopp');
    }

    /* uso personal */
    public function usopp()
    {
        return view('frontend.usopp');
    }

    /* Aseo general */
    public function productoslimpieza()
    {
        return view('frontend.productoslimpieza');
    }

    public function accesorioslimpieza()
    {
        return view('frontend.accesorioslimpieza');
    }

    public function detalle()
    {
        return view('frontend.detalle');
    }
}