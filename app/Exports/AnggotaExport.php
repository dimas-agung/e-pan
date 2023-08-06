<?php

namespace App\Exports;

use App\Models\Anggota;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AnggotaExport implements FromView
{
    private $kecamatan;
    private $desa;
    public function __construct(String $kecamatan = null,String $desa = null) {
        $this->kecamatan = $kecamatan;
        $this->desa = $desa;
    }
    public function view(): View
    {
        if ($this->desa !=null  && $this->kecamatan !=null) {
            # code...
            $anggota =Anggota::where('desa', $this->desa)->where('kecamatan', $this->kecamatan)->orderBy('nama')->get();
        }
        else if ($this->desa ==null  && $this->kecamatan !=null) {
            # code...
            $anggota =Anggota::where('kecamatan', $this->kecamatan)->orderBy('nama')->get();
        }else{

            $anggota = Anggota::orderBy('nama')->get();
        }
        return view('admin.export.anggota', [
            'anggota' =>$anggota
        ]);
    }
}