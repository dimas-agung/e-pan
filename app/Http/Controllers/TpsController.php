<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class TpsController extends Controller
{
    //
    function cekTPSAvailable(Request $request){
        $kecamatan = $request->input('kecamatan');
        $desa = $request->input('desa');
        $tps = $request->input('tps');
        $tps = Anggota::where('kecamatan',$desa)->where('desa',$desa)->where('tps',$tps)->first();

    }
}