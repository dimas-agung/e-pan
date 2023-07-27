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
        if ($request->input('kecamatan_id')) {
            # code...
            $desa = Desa::where('kecamatan_id', $request->input('kecamatan_id'))->orderBy('kecamatan')->get();;
        } else {
            $desa = Desa::orderBy('desa')->get();;
        }
        return $desa;
    }
}
