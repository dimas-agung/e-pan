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
        .image-preview-container img {
    width: 100%;
    display: none;
    margin-bottom: 30px;
}
.image-preview-container input {
    display: none;
}

.image-preview-container label {
    display: block;
    width: 45%;
    height: 45px;
    margin-left: 25%;
    text-align: center;
    background: #8338ec;
    color: #fff;
    font-size: 15px;
    text-transform: Uppercase;
    font-weight: 400;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
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
                        <div class="card-header">{{ __('Tambah Anggota') }}</div>

                        <div class="card-body" style="font-size: 14px;">
                            <form method="POST" action="{{ route('anggota.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div id="data-diri">
                                    <h5>Data Diri</h5>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input id="nama" type="text"
                                                    class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                    value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>NO KTP</label>
                                                <input id="nik" type="text"
                                                    class="form-control @error('nik') is-invalid @enderror" name="nik"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input id="tempat_lahir" type="text" class="form-control"
                                                    name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                                    autocomplete="name" autofocus>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input id="tanggal_lahir" type="date" class="form-control"
                                                    name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                                    autocomplete="name" autofocus>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select name="gender" id="gender" class="form-control" required>
                                                    <option value=""> -- Pilih Jenis Kelamin--</option>
                                                    <option value="Laki-Laki" @selected(old('gender') == 'Laki-Laki')>Laki-Laki
                                                    </option>
                                                    <option value="Perempuan" @selected(old('gender') == 'Perempuan')>Perempuan
                                                    </option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">

                                                <label>Golongan Darah</label>
                                                <select name="golongan_darah" id="golongan_darah" class="form-control"
                                                    required>
                                                    <option value=""> -- Pilih Golongan Darah --</option>
                                                    <option value="A" @selected(old('golongan_darah') == 'A')>A</option>
                                                    <option value="B" @selected(old('golongan_darah') == 'B')>B</option>
                                                    <option value="O" @selected(old('golongan_darah') == 'O')>O</option>
                                                    <option value="AB" @selected(old('golongan_darah') == 'AB')>AB</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <select name="agama" id="agama" class="form-control" required>
                                                    <option value=""> -- Pilih Agama--</option>
                                                    <option value="Islam" @selected(old('agama') == 'Islam')>Islam</option>
                                                    <option value="Kristen" @selected(old('agama') == 'Kristen')>Kristen</option>
                                                    <option value="Katolik" @selected(old('agama') == 'Katolik')>Katolik</option>
                                                    <option value="Hindu" @selected(old('agama') == 'Hindu')>Hindu</option>
                                                    <option value="Buddha" @selected(old('agama') == 'Buddha')>Buddha</option>
                                                    <option value="Kong Hu Cu" @selected(old('agama') == 'Kong Hu Cu')>Kong Hu Cu
                                                    </option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">

                                                <label>Status Pernikahan</label>
                                                <select name="status_perkawinan" id="status_perkawinan" class="form-control"
                                                    required>
                                                    <option value=""> -- Pilih Status Pernikahan --</option>
                                                    <option value="Menikah" @selected(old('status_perkawinan') == 'Menikah')>Menikah</option>
                                                    <option value="Pernah Menikah" @selected(old('status_perkawinan') == 'Pernah Menikah')>Pernah
                                                        Menikah</option>
                                                    <option value="Belum Menikah" @selected(old('status_perkawinan') == 'Belum Menikah')>Belum
                                                        Menikah</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Pendidikan Terakhir</label>
                                                <select name="pendidikan" id="pendidikan" class="form-control" required>
                                                    <option value=""> -- Pilih Pendidikan Terakhir --</option>
                                                    <option value="SD" @selected(old('pendidikan') == 'SD')>SD</option>
                                                    <option value="SMP" @selected(old('pendidikan') == 'SD')>SMP</option>
                                                    <option value="SMA" @selected(old('pendidikan') == 'SD')>SMA</option>
                                                    <option value="Perguruan Tinggi" @selected(old('pendidikan') == 'Perguruan Tinggi')>
                                                        Perguruan Tinggi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Institusi Pendidikan</label>
                                                <input type="text" name="institusi_pendidikan"
                                                    id="institusi_pendidikan" class="form-control" required
                                                    value="{{ old('institusi_pendidikan') }}" />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Pekerjaan</label>
                                                <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                                                    <option value=""> -- Pilih Pekerjaan --</option>
                                                    <option value="Pegawai Negeri Sipil" @selected(old('pekerjaan') == 'Pegawai Negeri Sipil')>
                                                        Pegawai
                                                        Negeri Sipil</option>
                                                    <option value="Karyawan BUMN" @selected(old('pekerjaan') == 'Karyawan BUMN')>Karyawan
                                                        BUMN
                                                    </option>
                                                    <option value="Karyawan Swasta" @selected(old('pekerjaan') == 'Karyawan Swasta')>Karyawan
                                                        Swasta</option>
                                                    <option value="Wirausaha" @selected(old('pekerjaan') == 'Wirausaha')>Wirausaha
                                                    </option>
                                                    <option value="Pelajar/Mahasiswa" @selected(old('pekerjaan') == 'Pelajar/Mahasiswa')>
                                                        Pelajar/Mahasiswa</option>
                                                    <option value="Mengurus Rumah Tangga" @selected(old('pekerjaan') == 'Mengurus Rumah Tangga')>
                                                        Mengurus Rumah Tangga</option>
                                                    <option value="Petani" @selected(old('pekerjaan') == 'Petani')>Petani</option>
                                                    <option value="Pensiunan" @selected(old('pekerjaan') == 'Pensiunan')>Pensiunan
                                                    </option>
                                                    <option value="Aparat" @selected(old('pekerjaan') == 'Aparat')>Aparat</option>
                                                    <option value="Lainnya" @selected(old('pekerjaan') == 'Lainnya')>Lainnya</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">

                                                <label>No Telepon</label>
                                                <input type="text" name="telpon" id="telpon" class="form-control"
                                                    required value="{{ old('telpon') }}" />
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
                                                <select name="provinsi_id" id="provinsi_id" class="form-control" required
                                                    onchange="getKabupaten()">
                                                    <option value="1"> -- Pilih Provinsi --</option>
                                                    @foreach ($provinsi as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->provinsi }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="provinsi" id="provinsi" class="form-control"
                                                    required />
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Kabupaten/Kota</label>
                                                <select name="kabupaten_id" id="kabupaten_id" class="form-control" required onchange="getKecamatan()">
                                                    <option value=""> -- Pilih Kabupaten/Kota --</option>
                                                </select>
                                                <input type="hidden" name="kabupaten" id="kabupaten" class="form-control"
                                                    required />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <select name="kecamatan_id" id="kecamatan_id" class="form-control" required onchange="getDesa()">
                                                    <option value=""> -- Pilih Kecamatan--</option>
                                                </select>
                                                <input type="hidden" name="kecamatan" id="kecamatan" class="form-control"
                                                    required />
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Desa/Keluarahan</label>
                                                <select name="desa_id" id="desa_id" class="form-control" required onchange="getDesaName()">
                                                    <option value=""> -- Pilih Desa/Keluarahan --</option>
                                                </select>
                                                <input type="hidden" name="desa" id="desa" class="form-control"
                                                    required />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" required>{{ old('alamat') }}</textarea>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>RT</label>
                                                <input type="text" name="rt" id="rw" class="form-control"
                                                    value="{{ old('rt') }}" required />
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">

                                                <label>RW</label>
                                                <input type="text" name="rw" id="rw"
                                                    class="form-control"value="{{ old('rw') }}" required />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="data-foto">
                                    <h5>Data Foto</h5>
        
                                    <div class="row">
                                        
                                        <div class="col-lg-6">
                                            <div class="image-preview-container">
                                                <div class="preview">
                                                    <img id="preview-image-ktp" src="{{asset('storage/noimage.png')}}"  alt="Image" />
                                                </div>
                                                <label for="file-upload">Upload Foro KTP</label>
                                                <input type="file" required id="file-upload" name="img_ktp" accept="image/*" onchange="previewImageKTP(event);" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="image-preview-container">
                                                <div class="preview">
                                                    <img id="preview-image-c1" src="{{url('/img/noimage.png')}}" />
                                                </div>
                                                <label for="foto-c1">Upload Foto C1</label>
                                                <input type="file" required id="foto-c1" name="img_c1" accept="image/*" onchange="previewImageC1(event);" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-9">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i>
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
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
        $(document).ready(function() {
            @if ($message = Session::get('success'))
                iziToast.success({
                    title: 'Sukses!',
                    message: '{{ $message }}',
                    position: 'topRight'
                });
            @endif

            $('table').DataTable({});
        });
    </script>
    <script>
        const previewImageKTP = (event) => {
            /**
             * Get the selected files.
             */
            const imageFiles = event.target.files;
            /**
             * Count the number of files selected.
             */
            const imageFilesLength = imageFiles.length;
            /**
             * If at least one image is selected, then proceed to display the preview.
             */
            if (imageFilesLength > 0) {
                /**
                 * Get the image path.
                 */
                const imageSrc = URL.createObjectURL(imageFiles[0]);
                /**
                 * Select the image preview element.
                 */
                const imagePreviewElement = document.querySelector("#preview-image-ktp");
                /**
                 * Assign the path to the image preview element.
                 */
                imagePreviewElement.src = imageSrc;
                /**
                 * Show the element by changing the display value to "block".
                 */
                imagePreviewElement.style.display = "block";
            }
        };
        const previewImageC1 = (event) => {
            /**
             * Get the selected files.
             */
            const imageFiles = event.target.files;
            /**
             * Count the number of files selected.
             */
            const imageFilesLength = imageFiles.length;
            /**
             * If at least one image is selected, then proceed to display the preview.
             */
            if (imageFilesLength > 0) {
                /**
                 * Get the image path.
                 */
                const imageSrc = URL.createObjectURL(imageFiles[0]);
                /**
                 * Select the image preview element.
                 */
                const imagePreviewElement = document.querySelector("#preview-image-c1");
                /**
                 * Assign the path to the image preview element.
                 */
                imagePreviewElement.src = imageSrc;
                /**
                 * Show the element by changing the display value to "block".
                 */
                imagePreviewElement.style.display = "block";
            }
        };
    </script>
    <script>
        function getKabupaten() {
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
