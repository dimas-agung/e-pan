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
                        <div class="card-header">{{ __('Tambah Saksi') }}</div>

                        <div class="card-body" style="font-size: 14px;">
                            <form method="POST" action="{{ route('saksi.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div id="data-diri">
                                    <h5>Data Diri</h5>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input id="nama" type="text"
                                                    class="form-control @error('nama') is-invalid @enderror" name="nama"
                                                    value="{{ $anggota->nama }}" required autocomplete="nama" readonly
                                                    autofocus>

                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>NO KTP</label>
                                                <input id="nik" type="text"
                                                    class="form-control @error('nik') is-invalid @enderror" name="nik"
                                                    value="{{ $anggota->nik }}"required autocomplete="name" readonly
                                                    autofocus>
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

                                                <input type="text" value="{{ $anggota->provinsi }}" readonly
                                                    name="provinsi" id="provinsi" class="form-control" required />
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Kabupaten/Kota</label>

                                                <input type="text" value="{{ $anggota->kabupaten }}" readonly
                                                    name="kabupaten" id="kabupaten" class="form-control" required />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <input type="text" value="{{ $anggota->kecamatan }}" readonly
                                                    name="kecamatan" id="kecamatan" class="form-control" required />
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Desa/Keluarahan</label>

                                                <input type="text" value="{{ $anggota->desa }}" name="desa"
                                                    id="desa" class="form-control" required readonly />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" required readonly>{{ $anggota->alamat }}</textarea>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>TPS</label>
                                                <select name="tps" id="tps" class="form-control" required
                                                    onchange="checkAvailableTPS()">
                                                    <option value=""> -- Pilih TPS --</option>
                                                    @for ($i = 1; $i <= $jumlah_tps; $i++)
                                                        <option value="{{ $i }}"> {{ $i }}
                                                        </option>
                                                    @endfor

                                                </select>
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
                                                    <img id="preview-image-c1" src="{{ url('/img/noimage.png') }}" />
                                                </div>
                                                <label for="foto-c1">Upload Foto C1</label>
                                                <input type="file" required id="foto-c1" name="img_c1"
                                                    accept="image/*" onchange="previewImageC1(event);" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

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

        function checkAvailableTPS() {
            let kabupaten = $('#kabupaten').val()
            let kecamatan = $('#kecamatan').val()
            let desa = $('#desa').val()
            let tps = $('#tps').val()
            $.ajax({
                type: "GET",
                url: "{{ url('saksi/cek-kuota-tps') }}",
                data: {
                    kabupaten: kabupaten,
                    kecamatan: kecamatan,
                    desa: desa,
                    tps: tps
                },
                success: function(response) {
                    console.log(response);
                    if (response == 0) {
                        iziToast.error({
                            title: 'Error!',
                            message: 'TPS ' + tps + ' sudah penuh!',
                            position: 'topRight'
                        });
                        $('#tps').val(null)
                    }
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
