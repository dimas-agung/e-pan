@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Rekaputulasi Saksi') }}</div>
                <div class="card-header"><a href="{{url('rekapitulasi/kabupaten')}}">{{ $kabupaten }}</a> |
                    <a href="{{url('rekapitulasi/kecamatan?kecamatan='.$kecamatan)}}">{{ $kecamatan }}</a>| {{ $desa }}
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    {{-- <div>
                        <a onclick="modalExport()" class="btn btn-success"><i class="fas fa-file-excel"></i> Export</a>
                    </div> --}}
                    <br />


                    <form action="{{ url('rekapitulasi/desa') }}" method="GET">
                        <div class="row">
                            <div class="col-6">
                                <input type="hidden" name="kabupaten" value="{{$kabupaten}}">
                                <input type="hidden" name="kecamatan" value="{{$kecamatan}}">
                                <input type="hidden" name="desa" value="{{$desa}}">
                                <input type="search" name="search" class="form-control" placeholder="Masukkan Desa.."
                                    autofocus>
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
                                    <td>{{ $item->anggota->nama }}</td>
                                    <td>{{ $item->anggota->nik }}</td>
                                    <td>{{ $item->anggota->provinsi }}</td>
                                    <td>{{ $item->anggota->kabupaten }}</td>
                                    <td>{{ $item->anggota->kecamatan }}</td>
                                    <td>{{ $item->anggota->desa }}</td>
                                    <td>{{ $item->anggota->saksi->tps }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ url('anggota/' . $item->anggota->id) }}"> <i
                                                class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9">Data Saksi Kosong.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $saksi->links('vendor.pagination.bootstrap-5') }}
                        <div>Showing {{ ($saksi->currentpage() - 1) * $saksi->perpage() + 1 }} to
                            {{ $saksi->currentpage() * $saksi->perpage() }}
                            of {{ $saksi->total() }} entries
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalExport" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export Saksi</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="GET" action="{{ route('saksi.export_excel') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div id="data-alamat">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Desa</label>
                                <select name="kecamatan_id" id="kecamatan_id" class="form-control" onchange="getDesa()">
                                    <option value=""> -- Pilih Desa--</option>
                                </select>
                                <input type="hidden" name="kecamatan" id="kecamatan" class="form-control" />
                            </div>

                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Desa/Keluarahan</label>
                                <select name="desa_id" id="desa_id" class="form-control" onchange="getDesaName()">
                                    <option value=""> -- Pilih Desa/Keluarahan --</option>
                                </select>
                                <input type="hidden" name="desa" id="desa" class="form-control" />
                            </div>

                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Export</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
{{-- // @if ($message = Session::get('success'))
//     iziToast.success({
//     title: 'Sukses!',
//     message: '{{ $message }}',
// position: 'topRight'
// });
// @endif --}}
{{-- <script src="{{ asset('dashboard/js/datatable-1.10.20.min.js') }}"></script>
<script src="{{ asset('dashboard/js/jquery.maskMoney.min.js') }}"></script> --}}
<script>
$(document).ready(function() {

    // $('table').DataTable({});
});
</script>
<script>
function modalExport() {
    getDesa()
    $('#modalExport').modal('show')

}

function getDesa() {
    let kabupaten_id = 3517;
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
        .append('<option selected="selected" value="">-- Pilih Desa --</option>');
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