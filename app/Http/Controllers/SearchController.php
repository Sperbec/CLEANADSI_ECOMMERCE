<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function show(Request $request){
       
        $data = trim($request->valor);

        $result = DB::table('productos')
        ->where('nombre','like',''.$data.'%')
        ->limit(5)
        ->get();

        return response()->json(
            [
                "estado"=>1,
                "result" => $result
            ]
        );
    }
}
