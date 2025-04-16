
@extends('laporan.index')
@section('laporan')



<table id="datatables-reponsive-1" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode kategori</th>
            <th>Nama kategori</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategori as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->kode_kategori }}</td>
                <td>{{ $d->nama_kategori }}</td>
                <td>
                    @if ($d->keterangan == '')
                        <b style="color: black;"> Tidak Ada Keterangan </b>
                    @else
                        {{ $d->keterangan }}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $kategori->links() }}

@endsection
