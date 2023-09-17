<?php

namespace App\Http\Controllers;

use App\Exports\RekapitulasiExport;
use App\Models\Anggota;
use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Saksi;
use App\Models\Tps;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Angle;

class RekapitulasiSaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function kabupaten(Request $request)
    {
        if ($request->input('search')) {
            $tps = Tps::query()->rekapitulasiKabupaten()
            ->select([
                'tps.provinsi',
                'tps.kabupaten',
                DB::raw("sum(DISTINCT(tps.jumlah)) as jumlah"),
                DB::raw("sum(DISTINCT(tps.dpt)) as dpt"),
                DB::raw("count(saksi.id) as count"),
            ])
            ->groupBy('tps.provinsi','tps.kabupaten')
            ->orderBy('tps.kabupaten')->where('tps.kabupaten', 'LIKE', "%{$request->input('search')}%")->paginate(10);
            // $saksi = Anggota::query()->saksi()->where('kecamatan', 'LIKE', "%{$request->input('search')}%")->latest()->paginate(10);
        } else {
            $tps = Tps::query()->rekapitulasiKabupaten()
            ->select([
                'tps.provinsi',
                'tps.kabupaten',
                DB::raw("sum(DISTINCT(tps.jumlah)) as jumlah"),
                DB::raw("sum(DISTINCT(tps.dpt)) as dpt"),
                DB::raw("count(saksi.id) as count"),
            ])
            ->groupBy('tps.provinsi','tps.kabupaten')
            ->orderBy('tps.kabupaten')->paginate(10);
        }
        // return $tps;
        // return $anggota;
        $kabupaten = Kabupaten::orderBy('kabupaten')->get();
        return response()->view('admin.rekapitulasi.kabupaten', [
            'tps' => $tps,
            'kabupaten' => $kabupaten,
        ]);
    }
    public function kecamatan(Request $request)
    {
        if ($request->input('kabupaten')) {
            $request->session()->put('kabupaten',$request->input('kabupaten'));
        }
        $kabupaten = $request->session()->get('kabupaten');
        if (!$kabupaten)  {
            abort(404);
        }
        if ($request->input('search')) {
            $tps = Tps::query()->rekapitulasiKecamatan()
            ->select([
                'tps.kecamatan',
                DB::raw("sum(DISTINCT(tps.jumlah)) as jumlah"),
                DB::raw("sum(DISTINCT(tps.dpt)) as dpt"),
                DB::raw("count(saksi.id) as count"),
            ])
            ->groupBy('tps.kecamatan')
            ->orderBy('tps.kecamatan')->where('tps.kabupaten',$kabupaten)->where('tps.kecamatan', 'LIKE', "%{$request->input('search')}%")->paginate(10);
            // $saksi = Anggota::query()->saksi()->where('kecamatan', 'LIKE', "%{$request->input('search')}%")->latest()->paginate(10);
        } else {
            $tps = Tps::query()->rekapitulasiKecamatan()
            ->select([
                'tps.kecamatan',
                DB::raw("sum(DISTINCT(tps.jumlah)) as jumlah"),
                DB::raw("sum(DISTINCT(tps.dpt)) as dpt"),
                DB::raw("count(saksi.id) as count"),
            ])
            ->groupBy('tps.kecamatan')
            ->orderBy('tps.kecamatan')->where('tps.kabupaten',$kabupaten)->paginate(10);
        }
        // return $tps;
        // return $anggota;
        $kecamatan = Kecamatan::orderBy('kecamatan')->get();
        return response()->view('admin.rekapitulasi.kecamatan', [
            'tps' => $tps,
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
        ]);
    }
    public function desa(Request $request)
    {
        if ($request->input('kabupaten')) {
            $request->session()->put('kabupaten',$request->input('kabupaten'));
        }
        $kabupaten = $request->session()->get('kabupaten');
        if ($request->input('kecamatan')) {
            $request->session()->put('kecamatan',$request->input('kecamatan'));
        }
        $kecamatan = $request->session()->get('kecamatan');
        if (!$kabupaten && $kecamatan)  {
            abort(404);
        }
        if ($request->input('search')) {
            $tps = Tps::query()->rekapitulasiDesa()
            ->select([
                'tps.desa',
                DB::raw("sum(DISTINCT(tps.jumlah)) as jumlah"),
                DB::raw("sum(DISTINCT(tps.dpt)) as dpt"),
                DB::raw("count(saksi.id) as count"),
            ])
            ->groupBy('tps.desa')
            ->orderBy('tps.desa')->where('tps.kabupaten',$kabupaten)->where('tps.kecamatan',$kecamatan)->where('tps.desa', 'LIKE', "%{$request->input('search')}%")->paginate(10);
            // $saksi = Anggota::query()->saksi()->where('kecamatan', 'LIKE', "%{$request->input('search')}%")->latest()->paginate(10);
        } else {
            $tps = Tps::query()->rekapitulasiDesa()
            ->select([
                'tps.desa',
                DB::raw("sum(DISTINCT(tps.jumlah)) as jumlah"),
                DB::raw("sum(DISTINCT(tps.dpt)) as dpt"),
                DB::raw("count(saksi.id) as count"),
            ])
            ->groupBy('tps.desa')
            ->orderBy('tps.desa')->where('tps.kabupaten',$kabupaten)->where('tps.kecamatan',$kecamatan)->paginate(10);
           
        }
        // return $tps;
        // return $anggota;
        $desa = Desa::orderBy('desa')->get();
        return response()->view('admin.rekapitulasi.desa', [
            'tps' => $tps,
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
        ]);
    }
    public function detail(Request $request)
    {
        if ($request->input('kabupaten')) {
            $request->session()->put('kabupaten',$request->input('kabupaten'));
        }
        $kabupaten = $request->session()->get('kabupaten');
        if ($request->input('kecamatan')) {
            $request->session()->put('kecamatan',$request->input('kecamatan'));
        }
        $kecamatan = $request->session()->get('kecamatan');
        if ($request->input('desa')) {
            $request->session()->put('desa',$request->input('desa'));
        }
        $desa = $request->session()->get('desa');
        if (!$kabupaten && $kecamatan)  {
            abort(404);
        }
        if ($request->input('search')) {
            $saksi = Saksi::with('anggota')->where('saksi.kabupaten',$kabupaten)->where('saksi.kecamatan',$kecamatan)->where('saksi.desa',$desa)->where('nama', 'LIKE', "%{$request->input('search')}%")->orWhere('nik', 'LIKE', "%{$request->input('search')}%")->latest()->paginate(10);
        } else {
            $saksi = Saksi::with('anggota')->where('saksi.kabupaten',$kabupaten)->where('saksi.kecamatan',$kecamatan)->where('saksi.desa',$desa)->latest()->paginate(10);
           
        }
        // return $saksi;

        return response()->view('admin.rekapitulasi.detail', [
            'saksi' => $saksi,
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
        ]);
    }
    public function export(Request $request)
    {
        // return Anggota::query()->saksi()->with('saksi')->orderBy('nama')->get();
        $desa = $request->input('desa') == '' ? null : $request->input('desa');
        $kecamatan = $request->input('kecamatan') == '' ? null : $request->input('kecamatan');
        // return $kecamatan;
        $exportSaksi = new RekapitulasiExport($kecamatan, $desa);
        // return $exportSaksi;
        return Excel::download($exportSaksi, 'Rekapitulasi Saksi.xlsx');
    }
}