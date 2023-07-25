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
    <div class="section-body" >
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
                    <form method="POST" action="{{ route('anggota.store') }}">
                        @csrf
                        <div id="data-diri">
                            <h5>Data Diri</h5>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>NO KTP</label>
                                        <input id="ktp" type="text" class="form-control @error('ktp') is-invalid @enderror" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus>
            
                                            @error('ktp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input id="ktp" type="date" class="form-control @error('ktp') is-invalid @enderror" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus>
            
                                            @error('ktp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value=""> -- Pilih Jenis Kelamin--</option>
                                        </select>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        
                                            <label>Golongan Darah</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value=""> -- Pilih Golongan Darah --</option>
                                            </select>
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value=""> -- Pilih Agama--</option>
                                        </select>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        
                                            <label>Status Pernikahan</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value=""> -- Pilih Status Pernikahan --</option>
                                            </select>
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Pendidikan Terakhir</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value=""> -- Pilih Pendidikan Terakhir --</option>
                                        </select>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        
                                            <label>Institusi Pendidikan</label>
                                            <input type="text" name="gender" id="gender" class="form-control" />
                                                
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value=""> -- Pilih Pekerjaan --</option>
                                        </select>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        
                                            <label>No Telepon</label>
                                            <input type="text" name="gender" id="gender" class="form-control" />
                                                
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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
                                        <select name="gender" id="gender" class="form-control">
                                            <option value=""> -- Pilih Provinsi --</option>
                                        </select>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        
                                            <label>Kabupaten/Kota</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value=""> -- Pilih Kabupaten/Kota --</option>
                                            </select>
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value=""> -- Pilih Kecamatan--</option>
                                        </select>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        
                                            <label>Desa/Keluarahan</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value=""> -- Pilih Desa/Keluarahan --</option>
                                            </select>
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="" id="" cols="30" rows="2" class="form-control"></textarea>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        
                                            <label>RT</label>
                                            <input type="text" name="gender" id="gender" class="form-control" />
                                                
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        
                                            <label>RW</label>
                                            <input type="text" name="gender" id="gender" class="form-control" />
                                                
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div id="data-foto">
                            <h5>Data Foto</h5>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        
                                        <label>Foto Diri</label>
                                        <div id="drop-zone">
                                            <img src="" alt="">
                                            
                                            <p><i class="fas fa-camera"></i> Klik / Drop untuk upload Gambar</p>
                                            <input type="file" id="myfile" hidden>
                                        </div>
                                    </div>
                                </div>
                            
                                {{-- <div class="col-lg-6">
                                    <div class="form-group">
                                        
                                        <label>Foto KTP</label>
                                        <div id="drop-zone">
                                            <img src="" alt="">
                                            
                                            <p><i class="fas fa-camera"></i> Klik / Drop untuk upload Gambar</p>
                                            <input type="file" id="myfile" hidden>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        {{-- <div id="data-akun">
                            <h5>Data AKun</h5>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>NO KTP</label>
                                        <input id="ktp" type="text" class="form-control @error('ktp') is-invalid @enderror" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus>
            
                                            @error('ktp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input id="ktp" type="date" class="form-control @error('ktp') is-invalid @enderror" name="name" value="{{ old('name')}}" required autocomplete="name" autofocus>
            
                                            @error('ktp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value=""> -- Pilih Jenis Kelamin--</option>
                                        </select>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        
                                            <label>Golongan Darah</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value=""> -- Pilih Golongan Darah --</option>
                                            </select>
                
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                   
                                </div>
                            </div>
                            
                    
                            
                        </div> --}}
                        

                        <div class="row mb-3">
                            <label for="decription" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control" required>{{ old('description')}}</textarea>
                                {{-- <input id="decription" type="hidden" class="form-control" name="decription" required autocomplete="new-product_category"> --}}
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
@endsection

@section('js')
{{-- <script src="{{ asset('dashboard/js/datatable-1.10.20.min.js') }}"></script>
<script src="{{ asset('dashboard/js/jquery.maskMoney.min.js') }}"></script> --}}
<script>
  $(document).ready(function () {
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

        inputElement.addEventListener('change', function (e) {
            const clickFile = this.files[0];
            if (clickFile) {
                img.style = "display:block;";
                p.style = 'display: none';
                const reader = new FileReader();
                reader.readAsDataURL(clickFile);
                reader.onloadend = function () {
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
            reader.onloadend = function () {
                e.preventDefault()
                p.style = 'display: none';
                let src = this.result;
                img.src = src;
                img.alt = file.name
            }
        });
</script>
@endsection