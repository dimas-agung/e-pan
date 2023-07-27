<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->input('provinsi_id')) {
            # code...
            $provinsi = Provinsi::find($request->input('provinsi_id'));
        }else if ($request->input('provinsi')) {
            # code...
            $provinsi = Provinsi::where('provinsi',$request->input('provinsi'))->first();
        }else{
            $provinsi = Provinsi::orderBy('provinsi')->get();
        }
        return $provinsi;
    }
}