<?php

namespace App\Http\Controllers;

use App\Exports\AnggotaExport;
use App\Models\Anggota;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class AnggotaController extends Controller
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
           
            $anggota = Anggota::where('nama', 'LIKE', "%{$request->input('search')}%")->orWhere('nik', 'LIKE', "%{$request->input('search')}%")->latest()->paginate(10);
        }else{
            $anggota = Anggota::latest()->paginate(10);

        }
        // return $anggota;
        $provinsi = Provinsi::orderBy('provinsi')->get();
        return response()->view('admin.anggota.index', [
            'anggota' => $anggota,
            'provinsi' => $provinsi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $anggota = Anggota::latest()->paginate(10);
        $provinsi = Provinsi::orderBy('provinsi')->get();
        return response()->view('admin.anggota.create', [
            // 'anggota' => $anggota
            'provinsi' => $provinsi
        ]);
        //
        // return 123;
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
            'nik' => ['required','unique:anggota,nik'],
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
            'img_ktp' => ['required'],
            'img_c1' => ['required'],

        ],[
            'nik.unique' => 'NIK Anggota sudah pernah didaftarkan !',
            'required' => ' :Tidak boleh kosong!'
        ]);
    //    return $request->file('img_ktp');
        $img_ktp = $request->file('img_ktp');
        $img_c1 = $request->file('img_c1');
        $path_ktp = 'ktp';
        $path_c1 = 'c1';
        $img_ktp->storePubliclyAs($path_ktp, $request->nik.'_ktp.png', "public");
        $img_c1->storePubliclyAs($path_c1, $request->nik.'_c1.png', "public");
        $url_ktp = $path_ktp . '/' .  $request->nik.'_ktp.png';
        $url_c1 = $path_c1 . '/' .  $request->nik.'_c1.png';
        $anggota = Anggota::create($validated);
        // return response()
        $anggota->update(['url_ktp'=>$url_ktp,'url_c1' => $url_c1]);
        //     ->json($anggota);
        return redirect('anggota')->with('success', 'Data Anggota berhasil disimpan!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
        $provinsi = Provinsi::orderBy('provinsi')->get();
        return response()->view('admin.anggota.show', [
            'anggota' => $anggota,
            'provinsi' => $provinsi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        //
        $provinsi = Provinsi::orderBy('provinsi')->get();
        return response()->view('admin.anggota.edit', [
            'anggota' => $anggota,
            'provinsi' => $provinsi
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
            // 'nik' => ['required','unique:anggota,nik,'.$anggota->nik],
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
        ],[
            // 'nik.unique' => 'NIK Anggota sudah pernah didaftarkan !',
            'required' => ' :Tidak boleh kosong!'
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
    public function destroy(Anggota $anggota)
    {
        //
        $anggota->delete();
        return redirect('anggota')->with('success', 'Data Anggota has been deleted!');
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
        $desa = $request->input('desa')== '' ? null : $request->input('desa');
        $kecamatan = $request->input('kecamatan') == '' ? null : $request->input('kecamatan');
        $exportAnggota = new AnggotaExport($kecamatan,$desa);
        // return $exportAnggota;
		return Excel::download($exportAnggota, 'dataAnggota.xlsx');
	}
}