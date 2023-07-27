<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('provinsi_id')) {
            # code...
            $kabupaten = Kabupaten::where('provinsi_id', $request->input('provinsi_id'))->orderBy('kabupaten')->get();;
        } else {
            $kabupaten = Kabupaten::orderBy('kabupaten')->get();;
        }
        return $kabupaten;
    }
}
