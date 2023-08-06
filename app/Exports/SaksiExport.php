<?php

namespace App\Exports;

use App\Models\Anggota;
use App\Models\Saksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SaksiExport implements FromView
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
            $saksi =Saksi::with('anggota')->where('desa', $this->desa)->where('kecamatan', $this->kecamatan)->orderBy('desa')->get();
        }
        else if ($this->desa ==null  && $this->kecamatan !=null) {
            # code...
            $saksi =Saksi::with('anggota')->where('kecamatan', $this->kecamatan)->orderBy('desa')->get();
        }else{

            $saksi = Saksi::with('anggota')->orderBy('desa')->get();
        }
        return view('admin.export.saksi', [
            'saksi' =>$saksi
        ]);
    }
}