@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Saksi') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div>
                        <a href="{{ url('saksi/pilih-anggota') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah saksi</a>
                        <a href="{{ url('saksi/create') }}" class="btn btn-success"><i class="fas fa-file-excel"></i> Export</a>
                    </div>
                    <br/>
                    

                    <form action="{{url('saksi')}}" method="GET">
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
                                    <td>Nama</td>
                                    <td>NIK</td>
                                    <td>Provinsi</td>
                                    <td>Kabupaten</td>
                                    <td>Kecamatan</td>
                                    <td>Desa/Kelurahan</td>
                                    <td>TPS</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($saksi as $key=> $item)
                                    <tr>
                                        <td>{{ $saksi->firstItem() + $loop->index }}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->nik}}</td>
                                        <td>{{$item->provinsi}}</td>
                                        <td>{{$item->kabupaten}}</td>
                                        <td>{{$item->kecamatan}}</td>
                                        <td>{{$item->desa}}</td>
                                        <td>{{$item->saksi->tps}}</td>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="{{ url('anggota/'. $item->id) }}"> <i class="fas fa-eye"></i></a>
                                            <a class="btn btn-sm btn-success" href="{{ url('saksi/'. $item->saksi->id.'/edit') }}"><i class="fas fa-pen"></i></a>
                            
                                            <form style="display:inline-block" action="{{url('saksi/'. $item->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-sm btn-danger" onclick="confirm('Want to delete?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">Data Saksi Kosong.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{$saksi->links()}}
                        <div>Showing {{($saksi->currentpage()-1)*$saksi->perpage()+1}} to {{$saksi->currentpage()*$saksi->perpage()}}
                            of  {{$saksi->total()}} entries
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