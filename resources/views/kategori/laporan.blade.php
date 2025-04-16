@extends('laporan.index')
@section('laporan')
    <table id="datatables-reponsive-1" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode kategori</th>
                <th>Nama kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->kode_kategori }}</td>
                    <td>{{ $d->nama_kategori }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $paginate->links() }}
@endsection
