<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    //
    public function index(Request $request)
    {
        $provinsi = Provinsi::orderBy('provinsi')->get();
        return $provinsi;
    }
}
