@extends('layout.main')
@section('content')
    @php
        $isEdit = isset($editUser);
    @endphp
    <div class="container-fluid">
        <div class="header">
            <h2 class="header-title">Tables User Kitchen</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb gap-2">
                    <li class="breadcrumb-item"><a href='{{ route('user.dashboard') }}'>Dashboard</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item active" aria-current="page">Tables User Kitchen</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                {{-- Card Form --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <strong>{{ $isEdit ? 'Edit User' : 'Tambah User Baru' }}</strong>
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @foreach (['login' => 'success', 'success' => 'success', 'edit' => 'info', 'delete' => 'danger'] as $key => $type)
                            @if (session($key))
                                <div class="alert alert-{{ $type }} alert-outline-coloured alert-dismissible col-6"
                                    role="alert">
                                    <div class="alert-icon">
                                        <i
                                            class="fas fa-fw {{ $type === 'danger' ? 'fa-trash-alt' : ($type === 'info' ? 'fa-pencil-alt' : ($key === 'login' ? 'fa-bell' : 'fa-user-plus')) }}"></i>
                                    </div>
                                    <div class="alert-message">
                                        <strong>{{ session($key) }}</strong>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                        @endforeach

                        <form action="{{ $isEdit ? route('user.update', $editUser->id) : route('user.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($isEdit)
                                @method('PUT')
                            @endif

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name">Nama User</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $isEdit ? $editUser->name : '') }}">
                                </div>

                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email"
                                        class="form-control {{ $isEdit ? 'bg-secondary text-white' : '' }}"
                                        style="{{ $isEdit ? 'pointer-events: none;' : '' }}"
                                        value="{{ old('email', $isEdit ? $editUser->email : '') }}"
                                        {{ $isEdit ? 'readonly' : '' }}>
                                </div>


                                @if (!$isEdit)
                                    <div class="col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            value="{{ old('password') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="password1">Konfirmasi Password</label>
                                        <input type="password" name="password1" class="form-control"
                                            value="{{ old('password1') }}">
                                    </div>
                                @endif

                                <div class="col-md-3">
                                    <label for="telepon">No Telepon</label>
                                    <input type="number" name="telepon" class="form-control"
                                        value="{{ old('telepon', $isEdit ? $editUser->telepon : '') }}">
                                </div>

                                <div class="col-md-3">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-control">
                                        <option value="">Pilih Role</option>
                                        @foreach (['kitchen'] as $role)
                                            <option value="{{ $role }}"
                                                {{ old('role', $isEdit ? $editUser->role : '') == $role ? 'selected' : '' }}>
                                                {{ ucfirst($role) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="outlet_id">Outlet</label>
                                    <select name="outlet_id" class="form-control">
                                        <option value="">Pilih Outlet</option>
                                        @foreach ($outlet as $out)
                                            <option value="{{ $out->id_outlet }}"
                                                {{ old('outlet_id', $isEdit ? $editUser->outlet_id : '') == $out->id_outlet ? 'selected' : '' }}>
                                                {{ $out->nama_outlet }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('outlet_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="jenkel">Jenis Kelamin</label>
                                    <select name="jenkel" class="form-control">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        @foreach (['laki-laki', 'perempuan', 'memilih_tidak_menjawab'] as $jk)
                                            <option value="{{ $jk }}"
                                                {{ old('jenkel', $isEdit ? $editUser->jenkel : '') == $jk ? 'selected' : '' }}>
                                                {{ ucfirst(str_replace('_', ' ', $jk)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jenkel')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="foto"><i class="fa fa-cloud-upload"></i> Tambah foto</label><br>

                                    @if ($isEdit && $editUser->foto)
                                        <input type="file" id="foto" class="dropify" data-max-file-size="4m"
                                            name="foto"
                                            data-default-file="{{ asset('storage/foto_user/' . $editUser->foto) }}">
                                        <label for="hapus">
                                            <input id="hapus" type="checkbox" name="delete_foto"> Hapus foto
                                        </label>
                                    @else
                                        <input type="file" id="foto" class="dropify" data-max-file-size="5m"
                                            name="foto">
                                    @endif

                                    @error('foto')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="alamat">Alamat</label>
                                    <textarea rows="2" type="text" name="alamat" class="form-control">{{ old('alamat', $isEdit ? $editUser->alamat : '') }}</textarea>
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="btn btn-{{ $isEdit ? 'warning' : 'success' }}">
                                        {{ $isEdit ? 'Update' : '+ Simpan' }}
                                    </button>
                                    @if ($isEdit)
                                        <a style="color: white;" href="{{ route('user.index_kitchen') }}"
                                            class="btn btn-secondary">Batal</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Card Table --}}
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title" style="font-size: 25px;">Tables User Kitchen</h2><br>
                        <a style="color:white;" class="btn btn-info" href="{{ route('user.laporan_kitchen') }}">
                            <i class="fa fa-save"></i> Laporan</a>
                    </div>

                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Outlet</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
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
                                            <img src="{{ $foto }}"
                                                style="width:50px; height:50px; border-radius:50%;">
                                        </td>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->email }}</td>
                                        <td>{{ $d->outlet->nama_outlet ?? '-' }}</td>
                                        <td>{{ $d->jenkel }}</td>
                                        <td><span class="btn mb-1 btn-warning"><i class="fas fa-info"></i>
                                                {{ $d->role }}</span></td>
                                        <td>
                                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'supervisor')
                                                <a style="color: white;" class="btn btn-primary"
                                                    href="{{ route('user.index_kitchen', ['edit' => $d->id]) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a> |
                                                <a class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $d->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a> |
                                                <a class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#detail{{ $d->id }}">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>

                                    {{-- Modal Detail --}}
                                    <div class="modal fade" id="detail{{ $d->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <label for="name">Nama User</label>
                                                    <input style="background-color:gray; color:white;"
                                                        class="form-control" type="text" id="name"
                                                        value="{{ $d->name }}" readonly>

                                                    <br>

                                                    <label for="alamat">Alamat User</label>
                                                    <input style="background-color:gray; color:white;"
                                                        class="form-control" type="text" id="alamat"
                                                        value="{{ $d->alamat }}" readonly>

                                                    <br>

                                                    <label for="email">Email User</label>
                                                    <input style="background-color:gray; color:white;"
                                                        class="form-control" type="text" id="email"
                                                        value="{{ $d->email }}" readonly>

                                                    <br>

                                                    <label for="telepon">No Telepon User</label>
                                                    <input style="background-color:gray; color:white;"
                                                        class="form-control" type="text" id="telepon"
                                                        value="{{ $d->telepon }}" readonly>

                                                    <br>

                                                    <label for="role">Role</label> <br>
                                                    @if ($d->role == 'admin')
                                                        <button id="role" class="btn mb-1 btn-info"><i
                                                                class="fas fa-info"
                                                                style="position: relative; left: -3px;"></i>
                                                            {{ $d->role }} </button>
                                                    @endif

                                                    @if ($d->role == 'supervisor')
                                                        <button id="role" class="btn mb-1 btn-secondary"><i
                                                                class="fas fa-check"
                                                                style="position: relative; left: -3px;"></i>
                                                            {{ $d->role }} </button>
                                                    @endif

                                                    @if ($d->role == 'kitchen')
                                                        <button id="role" class="btn mb-1 btn-warning"><i
                                                                class="fas fa-smile"
                                                                style="position: relative; left: -3px;"></i>
                                                            {{ $d->role }} </button>
                                                    @endif

                                                    @if ($d->role == 'kasir')
                                                        <button id="role" class="btn mb-1 btn-primary"><i
                                                                class="fas fa-smile"
                                                                style="position: relative; left: -3px;"></i>
                                                            {{ $d->role }} </button>
                                                    @endif

                                                    @if ($d->role == 'waiter')
                                                        <button id="role" class="btn mb-1 btn-danger"><i
                                                                class="fas fa-smile"
                                                                style="position: relative; left: -3px;"></i>
                                                            {{ $d->role }} </button>
                                                    @endif

                                                    @if ($d->role == 'pelanggan')
                                                        <button id="role" class="btn mb-1 btn-success"><i
                                                                class="fas fa-exclamation"
                                                                style="position: relative; left: -3px;"></i>
                                                            {{ $d->role }} </button>
                                                    @endif

                                                    <br>

                                                    <label for="outlet_id">Outlet User</label>
                                                    <input style="background-color:gray; color:white;"
                                                        class="form-control" type="text" id="outlet_id"
                                                        value="{{ $d->outlet->nama_outlet }}" readonly>

                                                    <br>

                                                    <label for="jenkel">Jenis Kelamin User</label>
                                                    <input style="background-color:gray; color:white;"
                                                        class="form-control" type="text" id="jenkel"
                                                        value="{{ $d->jenkel }}" readonly>

                                                    <br>

                                                    <label for="Foto">Foto User</label>
                                                    @php
                                                        $default = asset('form/img/avatars/avatars-default.png');
                                                        $foto =
                                                            !$d->foto || $d->foto == '0' || $d->foto == 'null'
                                                                ? $default
                                                                : asset('storage/foto_user/' . $d->foto);
                                                    @endphp
                                                    <img src="{{ $foto }}"
                                                        style="width:100px; height:100px; border-radius:50%;">
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Modal Hapus --}}
                                    <div class="modal fade" id="delete{{ $d->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 style="color: white;" class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Yakin ingin menghapus <strong>{{ $d->name }}</strong>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('user.delete', ['id' => $d->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
