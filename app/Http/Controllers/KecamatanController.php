<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->input('kecamatan_id')) {
            # code...
            $kecamatan = Kecamatan::find($request->input('kecamatan_id'));
        }else if ($request->input('kecamatan')) {
            # code...
            $kecamatan = Kecamatan::where('kecamatan',$request->input('kecamatan'))->first();
        }else if ($request->input('kabupaten_id')) {
            # code...
            $kecamatan = Kecamatan::where('kabupaten_id', $request->input('kabupaten_id'))->orderBy('kecamatan')->get();;
        } else {
            $kecamatan = Kecamatan::orderBy('kecamatan')->get();;
        }
        return $kecamatan;
    }
}