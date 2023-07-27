<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->input('kabupaten_id')) {
            # code...
            $kecamatan = Kecamatan::where('kabupaten_id', $request->input('kabupaten_id'))->orderBy('kecamatan')->get();;
        } else {
            $kecamatan = Kecamatan::orderBy('kecamatan')->get();;
        }
        return $kecamatan;
    }
}
