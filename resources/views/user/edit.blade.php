@extends('layout.main')
@section('content')
    <div class="container-fluid">

        <div class="header">
            <h2 class="header-title">
                Tables User Admin
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb gap-2">
                    <li class="breadcrumb-item "><a href='{{ route('user.dashboard') }}'>Dashboard</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item "><a href='{{ route('user.index') }}'>Tables User</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item active" aria-current="page">Edit User Admin</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 style="font-size: 25px;" class="card-title">Form Edit User Admin</h2>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('login'))
                        <div class="alert alert-success alert-outline-coloured alert-dismissible col-6" role="alert">
                            <div class="alert-icon">
                                <i class="fas fa-fw fa-bell"></i>
                            </div>
                            <div class="alert-message">
                                <strong>{{ session('login') }}</strong>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('user.update', ['id' => $data->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="inputName">Nama</label>
                                <input type="text" name="name" class="form-control" id="inputName"
                                    value="{{ $data->name }}">
                                @error('name')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="inputEmail">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $data->email }}"
                                    id="inputEmail">
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="inputPassword">Password</label>
                                <input minlength="8" maxlength="25" type="password" name="password" class="form-control"
                                    id="inputPassword" placeholder="Masukan Password">
                                @error('password')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="inputPassword1">Konfirmasi Password</label>
                                <input minlength="8" maxlength="25" type="password" name="password1" class="form-control"
                                    id="inputPassword1" placeholder="Konfirmasi Password">
                                @error('password1')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="inputTelepon">No Telepon</label>
                                <input type="number" name="telepon" class="form-control" id="inputTelepon"
                                    value="{{ $data->telepon }}">
                                @error('telepon')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="inputAlamat">Alamat</label>
                                <textarea rows="5" type="text" name="alamat" class="form-control" id="inputAlamat">{{ $data->alamat }}"</textarea>
                                @error('telepon')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="role">Role</label>
                                <select id="role" name="role" class="form-control">
                                    <option selected>Choose Role</option>
                                    <option value="admin" {{ $data->role == 'admin' ? 'selected' : '' }}>admin </option>
                                    <option value="supervisor" {{ $data->role == 'supervisor' ? 'selected' : '' }}>
                                        supervisor</option>
                                    <option value="teknisi" {{ $data->role == 'teknisi' ? 'selected' : '' }}>teknisi
                                    </option>
                                    <option value="pengguna" {{ $data->role == 'pengguna' ? 'selected' : '' }}>pengguna
                                    </option>
                                </select>
                                <span style="color:red">
                                    @error('role')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="foto"><i class="fa fa-cloud-upload"></i> Edit foto</label><br>
                                @if ($data->foto)
                                    <input type="file" id="foto" class="dropify" data-max-file-size="4m"
                                        name="foto" data-default-file="{{ asset('storage/foto_user/' . $data->foto) }}"
                                        value="{{ old('foto') }}"></input>
                                    <label for="hapus">
                                        <input id="hapus" type="checkbox" name="delete_foto"> Hapus foto
                                    </label>
                                @else
                                    <input type="file" id="foto" class="dropify" data-max-file-size="5m"
                                        name="foto"></input>
                                @endif

                                @error('foto')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary gap-3"><i class="fa fa-plus"></i> Submit</button>
                        <button type="button" class="btn btn-warning" onclick="window.location='{{ url('/user') }}'"
                            style="position:relative; right: -4px;"><i class="fa fa-arrow-left"></i> Kembali
                        </button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
