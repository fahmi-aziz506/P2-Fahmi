@extends('laporan.index')
@section('laporan')
    <table id="datatables-reponsive-1" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>Kecamatan Perusahaan</th>
                <th>Kota Perusahaan</th>
                <th>Provinsi Perusahaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($outlet as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->nama_outlet }}</td>
                    <td>{{ $d->kecamatan_perusahaan }}</td>
                    <td>{{ $d->kota_perusahaan }}</td>
                    <td>{{ $d->provinsi_perusahaan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $paginate->links() }}
@endsection
