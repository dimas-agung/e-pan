<?php

namespace App\Exports;

use App\Models\Anggota;
use App\Models\Saksi;
use App\Models\Tps;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class RekapitulasiExport extends DefaultValueBinder implements WithCustomValueBinder, FromView, ShouldAutoSize
{
    private $kecamatan;
    private $desa;
    public function __construct(String $kecamatan = null, String $desa = null)
    {
        $this->kecamatan = $kecamatan;
        $this->desa = $desa;
    }
    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);

            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }
    public function view(): View
    {
        // return $this->kecamatan;
        if ($this->desa != null  && $this->kecamatan != null) {
            $tps = Tps::query()->rekapitulasiDesa()
            ->select([
                'tps.provinsi',
                'tps.kabupaten',
                'tps.kecamatan',
                'tps.desa',
                DB::raw("sum(DISTINCT(tps.jumlah)) as jumlah"),
                DB::raw("sum(DISTINCT(tps.dpt)) as dpt"),
                DB::raw("count(saksi.id) as count"),
            ])
            ->groupBy('tps.provinsi','tps.kabupaten','tps.kecamatan','tps.desa')->where('tps.kecamatan',$this->kecamatan)->where('tps.desa',$this->desa)->orderBy('tps.desa')->get();
            return view('admin.export.rekapitulasi_desa', [
                'tps' => $tps
            ]);
            
        } else if ($this->desa == null  && $this->kecamatan != null) {
            # code...
            $tps = Tps::query()->rekapitulasiKecamatan()
            ->select([
                'tps.provinsi',
                'tps.kabupaten',
                'tps.kecamatan',
                'tps.desa',
                DB::raw("sum(DISTINCT(tps.jumlah)) as jumlah"),
                DB::raw("sum(DISTINCT(tps.dpt)) as dpt"),
                DB::raw("count(saksi.id) as count"),
            ])
            ->groupBy('tps.provinsi','tps.kabupaten','tps.kecamatan','tps.desa')->where('tps.kecamatan',$this->kecamatan)->orderBy('tps.desa')->get();
            return view('admin.export.rekapitulasi_kecamatan', [
                'tps' => $tps
            ]);
        } else {
             $tps = Tps::query()->rekapitulasiKabupaten()
            ->select([
                'tps.provinsi',
                'tps.kabupaten',
                DB::raw("sum(DISTINCT(tps.jumlah)) as jumlah"),
                DB::raw("sum(DISTINCT(tps.dpt)) as dpt"),
                DB::raw("count(saksi.id) as count"),
            ])
            ->groupBy('tps.provinsi','tps.kabupaten')->orderBy('kabupaten')->get();
            return view('admin.export.rekapitulasi', [
                'tps' => $tps
            ]);
        }
    }
}