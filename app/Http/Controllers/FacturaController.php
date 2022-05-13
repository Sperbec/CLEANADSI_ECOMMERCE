<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use Illuminate\Support\Facades\DB;
use PDF;

class FacturaController extends Controller
{

    public function index()
    {

        $sql = 'SELECT id_factura, codigo, fecha,
        concat(personas.nombres," ", personas.apellidos) as nombrecompleto,
        subtotal, valor_iva, costo_envio, total
        from facturas
        inner join personas on personas.id_persona = facturas.id_persona
        where facturas.deleted_at is null';


        $facturas=DB::select($sql);
        $data = ['facturas' => $facturas];
        return view('factura.index', $data);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }

    public function show($id){

        $sql1 = 'SELECT id_factura, codigo, fecha,
        concat(personas.nombres," ", personas.apellidos) as nombrecompleto,
        subtotal, valor_iva, costo_envio, total
        from facturas
        inner join personas on personas.id_persona = facturas.id_persona
        where facturas.id_factura = '.$id;


        $sql2 = 'SELECT facturas.id_factura, codigo,
        productos.nombre,  df.id_detalle_factura, df.cantidad, productos.precio,
        df.cantidad * productos.precio as subtotal,
        productos.sku
        from facturas
        inner join personas on personas.id_persona = facturas.id_persona
        inner join detalle_factura df on df.id_factura  = facturas.id_factura
        inner join productos on productos.id_producto = df.id_producto
        where facturas.id_factura = '.$id;

        $encabezado=DB::select($sql1);
        $detalles = DB::select($sql2);


        $data = ['encabezado' => $encabezado[0],
                'detalles' => $detalles];

        return view('factura.show', $data);

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

    public function imprimirfactura($id){

        $sql1 = 'SELECT id_factura, codigo, fecha,
        concat(personas.nombres," ", personas.apellidos) as nombrecompleto,
        subtotal, valor_iva, costo_envio, total
        from facturas
        inner join personas on personas.id_persona = facturas.id_persona
        where facturas.id_factura = '.$id;


        $sql2 = 'SELECT facturas.id_factura, codigo,
        productos.nombre,  df.id_detalle_factura, df.cantidad, productos.precio,
        df.cantidad * productos.precio as subtotal,
        productos.sku
        from facturas
        inner join personas on personas.id_persona = facturas.id_persona
        inner join detalle_factura df on df.id_factura  = facturas.id_factura
        inner join productos on productos.id_producto = df.id_producto
        where facturas.id_factura = '.$id;

        $encabezado=DB::select($sql1);
        $detalles = DB::select($sql2);

        $pdf = PDF::loadView('factura.pdf', [
            'encabezado' => $encabezado[0],
            'detalles' => $detalles
        ]);

        //Ver el pdf en el navegador
        return $pdf->stream();

        //Descargar el PDF
        //return $pdf->download('Factura.pdf');
    }
}
