@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Anggota') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div>
                        <a href="{{ url('anggota/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Anggota</a>
                        <a href="{{ url('anggota/create') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Export</a>
                    </div>
                    <br/>
                    

                    <form action="{{url('anggota')}}" method="GET">
                    <div class="row">
                            <div class="col-6">
    
                                <input type="search" name="search" class="form-control" placeholder="Masukkan NIK atau Nama.." autofocus>                                 
                            </div>
                            <div class="col-3">
                                <button class="btn btn-info"><i class="fas fa-search"></i> Search</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    {{-- <td>Foto</td> --}}
                                    <td>Nama</td>
                                    <td>NIK</td>
                                    <td>Provinsi</td>
                                    <td>Kecamatan</td>
                                    <td>Desa/Kelurahan</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($anggota as $key=> $item)
                                    <tr>
                                        <td>{{ $anggota->firstItem() + $loop->index }}</td>
                                        {{-- <td><img width="100" height="100" src="{{asset('storage/'.$item->url_ktp)}}" alt=""></td> --}}
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->nik}}</td>
                                        <td>{{$item->provinsi}}</td>
                                        <td>{{$item->kabupaten}}</td>
                                        <td>{{$item->desa}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="{{ url('anggota/'. $item->id) }}"> <i class="fas fa-eye"></i></a>
                                            <a class="btn btn-sm btn-success" href="{{ url('anggota/'. $item->id.'/edit') }}"><i class="fas fa-pen"></i></a>
                            
                                            <form style="display:inline-block" action="{{url('anggota/'. $item->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-sm btn-danger" onclick="confirm('Want to delete?')"> <i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Data Anggota Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{$anggota->links()}}
                        <div>Showing {{($anggota->currentpage()-1)*$anggota->perpage()+1}} to {{$anggota->currentpage()*$anggota->perpage()}}
                            of  {{$anggota->total()}} entries
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
{{-- // @if ($message = Session::get('success'))
//     iziToast.success({
//     title: 'Sukses!',
//     message: '{{ $message }}',
//     position: 'topRight'
//   });
// @endif --}}
{{-- <script src="{{ asset('dashboard/js/datatable-1.10.20.min.js') }}"></script>
<script src="{{ asset('dashboard/js/jquery.maskMoney.min.js') }}"></script> --}}
<script>
  $(document).ready(function () {

    // $('table').DataTable({});
  });
</script>
@endsection