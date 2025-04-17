@extends('layout.main')
@section('content')
    @php
        $isEdit = isset($editMenu);
    @endphp
    <div class="container-fluid">
        <div class="header">
            <h2 class="header-title">Tables Menu</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb gap-2">
                    <li class="breadcrumb-item"><a href='{{ route('user.dashboard') }}'>Dashboard</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item active" aria-current="page">Tables Menu</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                {{-- Card Form --}}
                <div class="card mb-4">
                    <div class="card-header">
                        <strong>{{ $isEdit ? 'Edit Menu' : 'Tambah Menu Baru' }}</strong>
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

                        <form action="{{ $isEdit ? route('menu.update', $editMenu->id_menu) : route('menu.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($isEdit)
                                @method('PUT')
                            @endif

                            <div class="row g-3">
                                <div class="col-md-10">
                                    <label for="nama_menu">Nama Menu</label>
                                    <input type="text" name="nama_menu" class="form-control"
                                        value="{{ old('nama_menu', $isEdit ? $editMenu->nama_menu : '') }}">
                                </div>

                                <div class="col-md-3">
                                    <label for="outlet_id">Kategori</label>
                                    <select name="kategori_id" class="form-control">
                                        <option value="">Pilih kategori</option>
                                        @foreach ($kategori as $out)
                                            <option value="{{ $out->id_kategori }}"
                                                {{ old('kategori_id', $isEdit ? $editMenu->kategori_id : '') == $out->id_kategori ? 'selected' : '' }}>
                                                {{ $out->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="outlet_id">Outlet</label>
                                    @if (auth()->user()->role == 'admin')
                                        <select name="outlet_id" class="form-control">
                                            <option value="">Pilih Outlet</option>
                                            @foreach ($outlet as $out)
                                                <option value="{{ $out->id_outlet }}"
                                                    {{ old('outlet_id', $isEdit ? $editMenu->outlet_id : '') == $out->id_outlet ? 'selected' : '' }}>
                                                    {{ $out->nama_outlet }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="hidden" name="outlet_id" value="{{ auth()->user()->outlet_id }}">
                                        <input type="text" class="form-control bg-secondary text-white"
                                            value="{{ auth()->user()->outlet->nama_outlet }}" readonly>
                                    @endif
                                    @error('outlet_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-3">
                                    <label for="harga">Harga Menu</label>
                                    <input type="text" name="harga" class="form-control"
                                        value="{{ old('harga', $isEdit ? $editMenu->harga : '') }}">
                                    @error('harga')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="stok">Stok</label>
                                    <input type="text" name="stok" class="form-control"
                                        value="{{ old('stok', $isEdit ? $editMenu->stok : '') }}">
                                    @error('harga')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="foto_menu"><i class="fa fa-cloud-upload"></i> Tambahkan Foto_menu
                                        Menu</label><br>

                                    @if ($isEdit && $editMenu->foto_menu)
                                        <input type="file" id="foto_menu" class="dropify" data-max-file-size="4m"
                                            name="foto_menu"
                                            data-default-file="{{ asset('storage/foto_menu/' . $editMenu->foto_menu) }}">
                                        <label for="hapus">
                                            <input id="hapus" type="checkbox" name="delete_foto_menu"> Hapus foto_menu
                                        </label>
                                    @else
                                        <input type="file" id="foto_menu" class="dropify" data-max-file-size="5m"
                                            name="foto_menu">
                                    @endif

                                    @error('foto_menu')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea rows="2" type="text" name="deskripsi" class="form-control">{{ old('deskripsi', $isEdit ? $editMenu->alamat : '') }}</textarea>
                                </div>


                                <div class="col-12">
                                    <button type="submit" class="btn btn-{{ $isEdit ? 'warning' : 'success' }}">
                                        {{ $isEdit ? 'Update' : '+ Simpan' }}
                                    </button>
                                    @if ($isEdit)
                                        <a style="color: white;" href="{{ route('menu.index') }}"
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
                        <h2 class="card-title" style="font-size: 25px;">Tables Menu</h2><br>
                        <a style="color:white;" class="btn btn-info" href="{{ route('menu.index') }}">
                            <i class="fa fa-save"></i> Laporan</a>
                    </div>

                    <div class="card-body">
                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Menu</th>
                                    <th>Kategori</th>
                                    <th>Outlet</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('storage/foto_menu/' . $d->foto_menu) }}"
                                                style="width:50px; height:50px; border-radius:50%;">
                                        </td>
                                        <td>{{ $d->nama_menu }}</td>
                                        <td>{{ $d->kategori->nama_kategori }}</td>
                                        <td>{{ $d->outlet->nama_outlet }}</td>
                                        <td>Rp {{ number_format($d->harga, 2) }}</td>
                                        <td>
                                            @if ($d->stok == '0')
                                                <b style="color: black">Stok Habis</b>
                                            @else
                                                {{ $d->stok }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'supervisor')
                                                <a style="color: white;" class="btn btn-primary"
                                                    href="{{ route('menu.index', ['edit' => $d->id_menu]) }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a> |
                                                <a class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete{{ $d->id_menu }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a> |
                                                <a class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#detail{{ $d->id_menu }}">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>

                                    {{-- Modal Detail --}}
                                    <div class="modal fade" id="detail{{ $d->id_menu }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Menu</h5>
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
                                                        value="{{ $d->outlet->nama_outlet ?? 'Tidak ada outlet' }}"
                                                        readonly>



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
                                                                : asset('storage/foto_menu/' . $d->foto_menu);
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
                                                    <form action="{{ route('menu.delete', ['id_menu' => $d->id_menu]) }}"
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
