<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    //
    public function index(Request $request)
    {
        // return 123;
        if ($request->input('desa_id')) {
            # code...
            $desa = Desa::find($request->input('desa_id'));
        }else if ($request->input('desa')) {
            # code...
            $desa = Desa::where('desa',$request->input('desa'))->first();
        }else if ($request->input('kecamatan_id')) {
            # code...
            $desa = Desa::where('kecamatan_id', $request->input('kecamatan_id'))->orderBy('desa')->get();;
        } else {
            $desa = Desa::orderBy('desa')->get();;
        }
        return $desa;
    }
}