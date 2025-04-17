@extends('laporan.index')
@section('laporan')
    <table id="datatables-reponsive-1" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @php
                            $default = asset('form/img/avatars/avatars-default.png');
                            $foto =
                                !$d->foto || $d->foto == '0' || $d->foto == 'null'
                                    ? $default
                                    : asset('storage/foto_user/' . $d->foto);
                        @endphp
                        <img src="{{ $foto }}" style="width:50px; height:50px; border-radius:50%;">
                    </td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->email }}</td>
                    <td>
                        @if ($d->role == 'admin')
                            <button id="role" class="btn mb-1 btn-info"><i class="fas fa-info"
                                    style="position: relative; left: -3px;"></i>
                                {{ $d->role }} </button>
                        @endif

                        @if ($d->role == 'supervisor')
                            <button id="role" class="btn mb-1 btn-secondary"><i class="fas fa-check"
                                    style="position: relative; left: -3px;"></i>
                                {{ $d->role }} </button>
                        @endif

                        @if ($d->role == 'kitchen')
                            <button id="role" class="btn mb-1 btn-warning"><i class="fas fa-smile"
                                    style="position: relative; left: -3px;"></i>
                                {{ $d->role }} </button>
                        @endif

                        @if ($d->role == 'kasir')
                            <button id="role" class="btn mb-1 btn-primary"><i class="fas fa-smile"
                                    style="position: relative; left: -3px;"></i>
                                {{ $d->role }} </button>
                        @endif

                        @if ($d->role == 'waiter')
                            <button id="role" class="btn mb-1 btn-danger"><i class="fas fa-smile"
                                    style="position: relative; left: -3px;"></i>
                                {{ $d->role }} </button>
                        @endif

                        @if ($d->role == 'pelanggan')
                            <button id="role" class="btn mb-1 btn-success"><i class="fas fa-exclamation"
                                    style="position: relative; left: -3px;"></i>
                                {{ $d->role }} </button>
                        @endif
                    </td>
                    <td>{{ $d->jenkel }}</td>
            @endforeach

        </tbody>
    </table>
    {{ $paginate->links() }}
@endsection
