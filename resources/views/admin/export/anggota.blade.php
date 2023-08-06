<table>
    <thead>
    <tr>
        <th>NO</th>
        <th>NAMA</th>
        <th>NIK</th>
        <th>TANGGAL LAHIR</th>
        <th>JENIS KELAMIN</th>
        <th>AGAMA</th>
        <th>GOLONGAN DARAH</th>
        <th>STATUS PERNIKAHAN</th>
        <th>PENDIDIKAN</th>
        <th>PEKERJAAN</th>
        <th>NO TELPON</th>
        <th>SAYAP PAN</th>
        <th>KABUPATEN</th>
        <th>KECAMATAN</th>
        <th>DESA</th>
        <th>RT</th>
        <th>RW</th>
        <th>ALAMAT</th>
    </tr>
    </thead>
    <tbody>
    @foreach($anggota as $key=> $item)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->nik }}</td>
            <td>{{ $item->tanggal_lahir }}</td>
            <td>{{ $item->gender }}</td>
            <td>{{ $item->agama }}</td>
            <td>{{ $item->golongan_darah }}</td>
            <td>{{ $item->status_perkawinan }}</td>
            <td>{{ $item->pendidikan }}</td>
            <td>{{ $item->pekerjaan }}</td>
            <td>{{ $item->telpon }}</td>
            <td>{{ $item->sayap_pan }}</td>
            <td>{{ $item->kabupaten }}</td>
            <td>{{ $item->kecamatan }}</td>
            <td>{{ $item->desa }}</td>
            <td>{{ $item->rt }}</td>
            <td>{{ $item->rw }}</td>
            <td>{{ $item->alamat }}</td>
        </tr>
    @endforeach
    </tbody>
</table>