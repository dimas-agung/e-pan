@extends('layouts.default')

@section('content')
<style>
#drop-zone {
    max-width: 450px;
    height: 150px;
    border: 2px dotted blue;
    display: flex;
    justify-content: center;
    align-items: center;
}

img {
    object-fit: cover;
    width: 100%;
    height: 100%;
    display: none;
}
</style>
<div class="container-fluid">
    <div class="section-body">
        <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger alert-has-icon w-100 mx-3">
                <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Kesalahan Validasi</div>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card mb-2">
                    <div class="card-header">{{ __('Detail Anggota') }}</div>

                    <div class="card-body" style="font-size: 14px;">
                      
                            <div id="data-diri">
                                <h5>Data Diri</h5>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input readonly id="nama" type="text"
                                                class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                value="{{ $anggota->nama }}" required autocomplete="nama" autofocus>

                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>NO KTP</label>
                                            <input readonly id="nik" type="text"
                                                class="form-control @error('nik') is-invalid @enderror" name="nik"
                                                value="{{ $anggota->nik }}" required autocomplete="name" autofocus>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input readonly id="tempat_lahir" type="text" class="form-control"
                                                name="tempat_lahir" value="{{ $anggota->tempat_lahir }}" required
                                                autocomplete="name" autofocus>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input readonly id="tanggal_lahir" type="date" class="form-control"
                                                name="tanggal_lahir" value="{{ $anggota->tanggal_lahir }}" required
                                                autocomplete="name" autofocus>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select disabled name="gender" id="gender" class="form-control" required>
                                                <option value=""> -- Pilih Jenis Kelamin--</option>
                                                <option value="Laki-Laki" @selected($anggota->gender=='Laki-Laki' )>
                                                    Laki-Laki
                                                </option>
                                                <option value="Perempuan" @selected($anggota->gender=='Perempuan' )>
                                                    Perempuan
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <label>Golongan Darah</label>
                                            <select disabled name="golongan_darah" id="golongan_darah" class="form-control"
                                                required>
                                                <option value=""> -- Pilih Golongan Darah --</option>
                                                <option value="A" @selected($anggota->golongan_darah=='A' )>A</option>
                                                <option value="B" @selected($anggota->golongan_darah=='B' )>B</option>
                                                <option value="O" @selected($anggota->golongan_darah=='O' )>O</option>
                                                <option value="AB" @selected($anggota->golongan_darah=='AB' )>AB</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <select disabled name="agama" id="agama" class="form-control" required>
                                                <option value=""> -- Pilih Agama--</option>
                                                <option value="Islam" @selected($anggota->agama=='Islam' )>Islam</option>
                                                <option value="Kristen" @selected($anggota->agama=='Kristen' )>Kristen
                                                </option>
                                                <option value="Katolik" @selected($anggota->agama=='Katolik' )>Katolik
                                                </option>
                                                <option value="Hindu" @selected($anggota->agama=='Hindu' )>Hindu</option>
                                                <option value="Buddha" @selected($anggota->agama=='Buddha' )>Buddha
                                                </option>
                                                <option value="Kong Hu Cu" @selected($anggota->agama=='Kong Hu Cu' )>Kong
                                                    Hu Cu
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <label>Status Pernikahan</label>
                                            <select disabled name="status_perkawinan" id="status_perkawinan" class="form-control"
                                                required>
                                                <option value=""> -- Pilih Status Pernikahan --</option>
                                                <option value="Menikah" @selected($anggota->status_perkawinan=='Menikah' )>
                                                    Menikah</option>
                                                <option value="Pernah Menikah"
                                                    @selected($anggota->status_perkawinan=='Pernah Menikah' )>Pernah
                                                    Menikah</option>
                                                <option value="Belum Menikah"
                                                    @selected($anggota->status_perkawinan=='Belum Menikah' )>Belum
                                                    Menikah</option>
                                            </select>

                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Pendidikan Terakhir</label>
                                            <select disabled name="pendidikan" id="pendidikan" class="form-control" required>
                                                <option value=""> -- Pilih Pendidikan Terakhir --</option>
                                                <option value="SD" @selected($anggota->pendidikan=='SD' )>SD</option>
                                                <option value="SMP" @selected($anggota->pendidikan=='SD' )>SMP</option>
                                                <option value="SMA" @selected($anggota->pendidikan=='SD' )>SMA</option>
                                                <option value="Perguruan Tinggi"
                                                    @selected($anggota->pendidikan=='Perguruan Tinggi' )>
                                                    Perguruan Tinggi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Institusi Pendidikan</label>
                                            <input readonly type="text" name="institusi_pendidikan" id="institusi_pendidikan"
                                                class="form-control" required
                                                value="{{ $anggota->institusi_pendidikan }}" />
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <select disabled name="pekerjaan" id="pekerjaan" class="form-control" required>
                                                <option value=""> -- Pilih Pekerjaan --</option>
                                                <option value="Pegawai Negeri Sipil"
                                                    @selected($anggota->pekerjaan=='Pegawai Negeri Sipil' )>
                                                    Pegawai
                                                    Negeri Sipil</option>
                                                <option value="Karyawan BUMN"
                                                    @selected($anggota->pekerjaan=='Karyawan BUMN' )>Karyawan
                                                    BUMN
                                                </option>
                                                <option value="Karyawan Swasta"
                                                    @selected($anggota->pekerjaan=='Karyawan Swasta' )>Karyawan
                                                    Swasta</option>
                                                <option value="Wirausaha" @selected($anggota->pekerjaan=='Wirausaha' )>
                                                    Wirausaha
                                                </option>
                                                <option value="Pelajar/Mahasiswa"
                                                    @selected($anggota->pekerjaan=='Pelajar/Mahasiswa' )>
                                                    Pelajar/Mahasiswa</option>
                                                <option value="Mengurus Rumah Tangga"
                                                    @selected($anggota->pekerjaan=='Mengurus Rumah Tangga' )>
                                                    Mengurus Rumah Tangga</option>
                                                <option value="Petani" @selected($anggota->pekerjaan=='Petani' )>Petani
                                                </option>
                                                <option value="Pensiunan" @selected($anggota->pekerjaan=='Pensiunan' )>
                                                    Pensiunan
                                                </option>
                                                <option value="Aparat" @selected($anggota->pekerjaan=='Aparat' )>Aparat
                                                </option>
                                                <option value="Lainnya" @selected($anggota->pekerjaan=='Lainnya' )>Lainnya
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <label>No Telepon</label>
                                            <input readonly type="text" name="telpon" id="telpon" class="form-control" required
                                                value="{{ $anggota->telpon }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="data-alamat">
                                <h5>Data Alamat</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            
                                            <input readonly type="text" name="provinsi" id="provinsi" class="form-control" value="{{$anggota->provinsi}}"
                                                required />
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kabupaten/Kota</label>
                                            
                                            <input readonly type="text" name="kabupaten" id="kabupaten" class="form-control" value="{{$anggota->kabupaten}}"
                                                required />
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            
                                            <input readonly type="text" name="kecamatan" id="kecamatan" class="form-control" value="{{$anggota->kecamatan}}"
                                                required />
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Desa/Keluarahan</label>
                                            
                                            <input readonly type="text" name="desa" id="desa" class="form-control" required value="{{$anggota->desa}}" />
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea disabled name="alamat" id="alamat" cols="30" rows="2" class="form-control"
                                                required>{{ $anggota->alamat }}</textarea>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>RT</label>
                                            <input readonly type="text" name="rt" id="rw" class="form-control"
                                                value="{{ $anggota->rt }}" required />
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <label>RW</label>
                                            <input readonly type="text" name="rw" id="rw" class="form-control"
                                                value="{{ $anggota->rw }}" required />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div id="data-foto">
                                    <h5>Data Foto</h5>
                                    {{-- {{asset('storage/'.$anggota->url_ktp)}} --}}
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
        
                                                <label>Foto KTP</label>
                                                <img width="100" height="100" src="{{asset('storage/'.$anggota->url_ktp)}}" alt="">
                                               
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
        
                                                <label>Foto C1</label>
                                                <img width="100" height="100" src="{{asset('storage/'.$anggota->url_c1)}}" alt="">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-9">
                                    <a class="btn btn-warning" onclick="window.history.back()">
                                        
                                        {{ __('Kembali') }}
                                    </a>
                                </div>
                            </div>
                       
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
@endsection

@section('js')
{{-- <script src="{{ asset('dashboard/js/datatable-1.10.20.min.js') }}"></script>
<script src="{{ asset('dashboard/js/jquery.maskMoney.min.js') }}"></script> --}}
<script>
    var count = 0
    $(document).ready(function() {
    @if($message = Session::get('success'))
    iziToast.success({
        title: 'Sukses!',
        message: '{{ $message }}',
        position: 'topRight'
    });
    @endif
    getKabupatenEdit();
    getKecamatanEdit();
    getDesaEdit();
    count++;
    console.log(count);
    $('table').DataTable({});
});
</script>
<script>
const dropZone = document.querySelector('#drop-zone');
const inputElement = document.querySelector('input');
const img = document.querySelector('img');
let p = document.querySelector('p')

inputElement.addEventListener('change', function(e) {
    const clickFile = this.files[0];
    if (clickFile) {
        img.style = "display:block;";
        p.style = 'display: none';
        const reader = new FileReader();
        reader.readAsDataURL(clickFile);
        reader.onloadend = function() {
            const result = reader.result;
            let src = this.result;
            img.src = src;
            img.alt = clickFile.name
        }
    }
})
dropZone.addEventListener('click', () => inputElement.click());
dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
});
dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    img.style = "display:block;";
    let file = e.dataTransfer.files[0];

    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onloadend = function() {
        e.preventDefault()
        p.style = 'display: none';
        let src = this.result;
        img.src = src;
        img.alt = file.name
    }
});
</script>
<script>
    function getKabupatenEdit() {
        let provinsi = $('#provinsi').val()
        let provinsi_id = '';

        $.ajax({
            type: "GET",
            url: "{{ route('provinsi.index') }}",
            async: false,
            data: {
                provinsi: provinsi
            },
            success: function(response) {
               provinsi_id = response.id
            }
        })
        $('#kabupaten_id')
            .empty()
            .append('<option selected="selected" value="">-- Pilih Kota/Kabupaten --</option>');
        $.ajax({
            type: "GET",
            url: "{{ route('kabupaten.index') }}",
            data: {
                provinsi_id: provinsi_id
            },
            success: function(response) {
                let no = 1;
                let data = [];
                $.each(response, function() {
                    let selected = $('#kabupaten').val() == this.kabupaten ? 'selected' : '';
                    $('#kabupaten_id').append(
                        `<option ${selected}  value="${this.id}">${this.kabupaten}</option>`);
                });

            }
        })
    }

    function getKecamatanEdit() {
        let kabupaten = $('#kabupaten').val()
        let kabupaten_id = ''
        $.ajax({
            type: "GET",
            url: "{{ route('kabupaten.index') }}",
            async: false,
            data: {
                kabupaten: kabupaten
            },
            success: function(response) {
                kabupaten_id = response.id
            }
        })
        $('#kecamatan_id')
            .empty()
            .append('<option selected="selected" value="">-- Pilih Kecamatan --</option>');
        $.ajax({
            type: "GET",
            url: "{{ route('kecamatan.index') }}",
            async: false,
            data: {
                kabupaten_id: kabupaten_id
            },
            success: function(response) {
                let no = 1;
                let data = [];
                $.each(response, function() {
                    let selected = $('#kecamatan').val() == this.kecamatan ? 'selected' : '';
                    $('#kecamatan_id').append(
                        `<option ${selected} value="${this.id}">${this.kecamatan}</option>`);

                });

            }
        })
    }

    function getDesaEdit() {
        let kecamatan = $('#kecamatan').val()
        let kecamatan_id = ''
        $.ajax({
            type: "GET",
            url: "{{ route('kecamatan.index') }}",
            async: false,
            data: {
                kecamatan: kecamatan
            },
            success: function(response) {
                kecamatan_id = response.id
            }
        })
        $('#desa_id')
            .empty()
            .append('<option selected="selected" value="">-- Pilih Desa --</option>');
        $.ajax({
            type: "GET",
            url: "{{ route('desa.index') }}",
            async: false,
            data: {
                kecamatan_id: kecamatan_id
            },
            success: function(response) {
                let no = 1;
                let data = [];
                $.each(response, function() {
                    let selected = $('#desa').val() == this.desa ? 'selected' : '';
                    $('#desa_id').append(
                        `<option ${selected} value="${this.id}">${this.desa}</option>`);

                });

            }
        })
    }

</script>
<script>
    function getKabupaten() {
        console.log(12);
        if (count == 0) {
            return;
        }
        let provinsi_id = $('#provinsi_id').val()
        $.ajax({
            type: "GET",
            url: "{{ route('provinsi.index') }}",
            data: {
                provinsi_id: provinsi_id
            },
            success: function(response) {
                $('#provinsi').val(response.provinsi)
                // console.log($('#kabupaten').val());
            }
        })
        $('#kabupaten_id')
            .empty()
            .append('<option selected="selected" value="">-- Pilih Kota/Kabupaten --</option>');
        $.ajax({
            type: "GET",
            url: "{{ route('kabupaten.index') }}",
            data: {
                provinsi_id: provinsi_id
            },
            success: function(response) {
                let no = 1;
                let data = [];
                $.each(response, function() {
                    $('#kabupaten_id').append(
                        `<option value="${this.id}">${this.kabupaten}</option>`);
                });

            }
        })
    }

    function getKecamatan() {
        if (count == 0) {
            return;
        }
        let kabupaten_id = $('#kabupaten_id').val()
        $.ajax({
            type: "GET",
            url: "{{ route('kabupaten.index') }}",
            data: {
                kabupaten_id: kabupaten_id
            },
            success: function(response) {
                $('#kabupaten').val(response.kabupaten)
                // console.log($('#kabupaten').val());
            }
        })
        $('#kecamatan_id')
            .empty()
            .append('<option selected="selected" value="">-- Pilih Kecamatan --</option>');
        $.ajax({
            type: "GET",
            url: "{{ route('kecamatan.index') }}",
            data: {
                kabupaten_id: kabupaten_id
            },
            success: function(response) {
                let no = 1;
                let data = [];
                $.each(response, function() {
                    $('#kecamatan_id').append(
                        `<option value="${this.id}">${this.kecamatan}</option>`);

                });

            }
        })
    }

    function getDesa() {
        console.log(count);
        if (count == 0) {
            return;
        }
        let kecamatan_id = $('#kecamatan_id').val()
        $.ajax({
            type: "GET",
            url: "{{ route('kecamatan.index') }}",
            data: {
                kecamatan_id: kecamatan_id
            },
            success: function(response) {
                $('#kecamatan').val(response.kecamatan)
                // console.log($('#kabupaten').val());
            }
        })
        $('#desa_id')
            .empty()
            .append('<option selected="selected" value="">-- Pilih Desa --</option>');
        $.ajax({
            type: "GET",
            url: "{{ route('desa.index') }}",
            data: {
                kecamatan_id: kecamatan_id
            },
            success: function(response) {
                let no = 1;
                let data = [];
                $.each(response, function() {
                    $('#desa_id').append(
                        `<option value="${this.id}">${this.desa}</option>`);

                });

            }
        })
    }

    function getDesaName() {
        if (count == 0) {
            return;
        }
        let desa_id = $('#desa_id').val()
        $.ajax({
            type: "GET",
            url: "{{ route('desa.index') }}",
            data: {
                desa_id: desa_id
            },
            success: function(response) {
                $('#desa').val(response.desa)
                // console.log($('#kabupaten').val());
            }
        })
    }
</script>
@endsection