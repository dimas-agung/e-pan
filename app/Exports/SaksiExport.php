<?php

namespace App\Exports;

use App\Models\Anggota;
use App\Models\Saksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class SaksiExport extends DefaultValueBinder implements WithCustomValueBinder, FromView, ShouldAutoSize
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
        if ($this->desa != null  && $this->kecamatan != null) {
            # code...
            $saksi = Saksi::with('anggota')->where('desa', 'like', '%' . $this->desa . '%')->where('kecamatan', $this->kecamatan)->orderBy('desa')->get();
        } else if ($this->desa == null  && $this->kecamatan != null) {
            # code...
            $saksi = Saksi::with('anggota')->where('kecamatan', $this->kecamatan)->orderBy('desa')->get();
        } else {

            $saksi = Saksi::with('anggota')->orderBy('desa')->get();
        }
        return view('admin.export.saksi', [
            'saksi' => $saksi
        ]);
    }
}
