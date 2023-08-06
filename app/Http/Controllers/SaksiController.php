<?php

namespace App\Http\Controllers;

use App\Exports\SaksiExport;
use App\Models\Anggota;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\Saksi;
use App\Models\Tps;
use Illuminate\Http\Request;


use Maatwebsite\Excel\Facades\Excel;

class SaksiController extends Controller
{
    //
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->input('search')) {
           
            $saksi = Anggota::query()->saksi()->where('nama', 'LIKE', "%{$request->input('search')}%")->orWhere('nik', 'LIKE', "%{$request->input('search')}%")->latest()->paginate(10);
        }else{
            $saksi = Anggota::query()->saksi()->latest()->paginate(10);

        }
        // return $anggota;
        $provinsi = Provinsi::orderBy('provinsi')->get();
        return response()->view('admin.saksi.index', [
            'saksi' => $saksi,
            'provinsi' => $provinsi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $anggota = Anggota::where('nik',$request->input('nik'))->first();
        $tps = Tps::where('kecamatan',$anggota->kecamatan)->where('desa',$anggota->desa)->first();
        $jumlah_tps = $tps->jumlah;
        return response()->view('admin.saksi.create', [
           'anggota' => $anggota,
           'jumlah_tps' => $jumlah_tps
        ]);
        //
        // return 123;
    }
    public function pilihAnggota(Request $request)
    {
        if ($request->input('search')) {
           
            $anggota = Anggota::query()->anggota()->with('saksi')->where('nama', 'LIKE', "%{$request->input('search')}%")->orWhere('nik', 'LIKE', "%{$request->input('search')}%")->latest()->paginate(10);
        }else{
            $anggota = Anggota::query()->anggota()->with('saksi')->latest()->paginate(10);

        }
        return response()->view('admin.saksi.pilih-anggota', [
            'anggota' => $anggota,
        ]);
        //
        // return 123;
    }
    public function cekTPSAvailable(Request $request){
        $kecamatan = $request->input('kecamatan');
        $desa = $request->input('desa');
        $tps = $request->input('tps');
        $tps = Saksi::where('kecamatan',$desa)->where('desa',$desa)->where('tps',$tps)->get();
        return count($tps) < 5 ? true:false;
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => ['required'],
            // 'nama' => ['required'],
            'provinsi' => ['required'],
            'kabupaten' => ['required'],
            'kecamatan' => ['required'],
            'desa' => ['required'],
            'tps' => ['required'],
        ]);
        $saksi = Saksi::create($validated);
        $anggota = Anggota::where('nik',$request->input('nik'))->update(['is_saksi'=>1]);

        return redirect('saksi')->with('success', 'Data Saksi berhasil disimpan!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Saksi $saksi)
    {
       
        $tps = Tps::where('kecamatan',$saksi->kecamatan)->where('desa',$saksi->desa)->first();
        $jumlah_tps = $tps->jumlah;
        return response()->view('admin.saksi.edit', [
            'saksi' => $saksi,
            'jumlah_tps' => $jumlah_tps,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota)
    {
        //
        // return $anggota;
        $validated = $request->validate([
            'nik' => ['required'],
            'nama' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'gender' => ['required'],
            'agama' => ['required'],
            'golongan_darah' => ['required'],
            'status_perkawinan' => ['required'],
            'pendidikan' => ['required'],
            'institusi_pendidikan' => ['required'],
            'pekerjaan' => ['required'],
            'telpon' => ['required'],
            'sayap_pan' => ['sometimes', 'nullable'],
            'provinsi' => ['required'],
            'kabupaten' => ['required'],
            'kecamatan' => ['required'],
            'desa' => ['required'],
            'rt' => ['required'],
            'rw' => ['required'],
            'alamat' => ['required'],
        ]);
        // return $anggota;
        $anggota->update($validated);

        return redirect('anggota')->with('success', 'Data Anggota berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saksi $saksi)
    {
        //
        $anggota = Anggota::where('nik',$saksi->nik)->update(['is_saksi'=>0]);
        $saksi->delete();
        return redirect('saksi')->with('success', 'Data Saksi has been deleted!');
    }

    public function dataAnggota(Request $request)
    {
        // return 123;
        if ($request->input('nik') != null) {
            $anggotas = Anggota::where('nik', $request->input('nik'))->with(['department', 'section', 'bank', 'gradeTitle'])->orderBy('Anggota_code')->first();
        } else {
            $anggotas = Anggota::with(['department', 'section', 'bank', 'gradeTitle'])->orderBy('Anggota_code')->get();
        }
        return response()
            ->json($anggotas);
    }

    public function export_excel(Request $request)
	{
        // return Anggota::query()->saksi()->with('saksi')->orderBy('nama')->get();
        $desa = $request->input('desa')== '' ? null : $request->input('desa');
        $kecamatan = $request->input('kecamatan') == '' ? null : $request->input('kecamatan');
        // return $kecamatan;
        $exportSaksi = new SaksiExport($kecamatan,$desa);
        // return $exportAnggota;
		return Excel::download($exportSaksi, 'dataSaksi.xlsx');
	}
}