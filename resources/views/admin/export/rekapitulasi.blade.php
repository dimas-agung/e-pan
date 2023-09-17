<table>
    <thead>
        <tr>
            <td>No</td>
            <td>Provinsi</td>
            <td>Kabupaten</td>
            <td>Jumlah TPS</td>
            <td>Jumlah Saksi</td>
            <td>Jumlah DPT</td>

        </tr>
    </thead>
    <tbody>
        @foreach ($tps as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $item->provinsi }}</td>
            <td>{{ $item->kabupaten }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->count }}</td>
            <td>{{ $item->dpt }}</td>
        </tr>
        @endforeach
    </tbody>
</table>