<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;

class FacturaController extends Controller
{

    public function index()
    {
        $facturas= Factura::All();
        $data = ['facturas' => $facturas];
        return view('factura.index', $data);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
