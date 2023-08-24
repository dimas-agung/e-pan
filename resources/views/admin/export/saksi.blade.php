<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>NIK</th>
            <th>TANGGAL LAHIR</th>
            <th>JENIS KELAMIN</th>
            <th>AGAMA</th>
            <th>NO TELPON</th>
            <th>KABUPATEN</th>
            <th>KECAMATAN</th>
            <th>DESA</th>
            <th>RT</th>
            <th>RW</th>
            <th>ALAMAT</th>
            <th>TPS NO</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($saksi as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->anggota->nama }}</td>
                <td>{{ (string) $item->anggota->nik }}</td>
                <td>{{ $item->anggota->tanggal_lahir }}</td>
                <td>{{ $item->anggota->gender }}</td>
                <td>{{ $item->anggota->agama }}</td>
                <td>{{ (string) $item->anggota->telpon }}</td>
                <td>{{ $item->anggota->kabupaten }}</td>
                <td>{{ $item->anggota->kecamatan }}</td>
                <td>{{ $item->anggota->desa }}</td>
                <td>{{ $item->anggota->rt }}</td>
                <td>{{ $item->anggota->rw }}</td>
                <td>{{ $item->anggota->alamat }}</td>
                <td>{{ $item->tps }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
