@extends('laporan.index')

@section('laporan')

    {{-- Form Pilih Outlet untuk Admin --}}
    @if (auth()->user()->role == 'admin')
        <div class="no-print">
            <form action="{{ route('user.laporan_kasir') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <label for="outlet_id">Pilih Outlet</label>
                        <select name="outlet_id" id="outlet_id" class="form-control" required>
                            <option value="">-- Pilih Outlet --</option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id_outlet }}"
                                    {{ isset($selectedOutlet) && $selectedOutlet == $outlet->id_outlet ? 'selected' : '' }}>
                                    {{ $outlet->nama_outlet }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 align-self-end">
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </div>
            </form>
        </div>
    @endif

    {{-- Tabel Hasil --}}
    @if (count($user) > 0)
        <table id="datatables-reponsive-1" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Outlet</th>
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
                        <td>{{ $d->outlet->nama_outlet ?? '-' }}</td>
                        <td>
                            <button
                                class="btn mb-1 btn-{{ $d->role == 'admin'
                                    ? 'info'
                                    : ($d->role == 'supervisor'
                                        ? 'secondary'
                                        : ($d->role == 'kitchen'
                                            ? 'warning'
                                            : ($d->role == 'kasir'
                                                ? 'primary'
                                                : ($d->role == 'waiter'
                                                    ? 'danger'
                                                    : 'success')))) }}">
                                <i class="fas fa-smile" style="position: relative; left: -3px;"></i>
                                {{ $d->role }}
                            </button>
                        </td>
                        <td>{{ $d->jenkel }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p class="no-print">Menampilkan {{ $user->firstItem() }} - {{ $user->lastItem() }} dari total
            {{ $user->total() }} kasir</p>
    @else
        <p class="text-muted">Silakan pilih outlet terlebih dahulu untuk menampilkan data.</p>
    @endif

@endsection
