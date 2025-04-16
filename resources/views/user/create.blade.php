@extends('layout.main')
@section('content')
    <div class="container-fluid">

        <div class="header">
            <h2 class="header-title">
                Tables User
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb gap-2">
                    <li class="breadcrumb-item "><a href='{{ route('user.dashboard') }}'>Dashboard</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item "><a href='{{ route('user.index') }}'>Tables User</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 style="font-size: 25px;" class="card-title">Form Tambah User</h2>
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

                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="inputName">Nama</label>
                                <input type="text" name="name" class="form-control" id="inputName"
                                    placeholder="Masukan Nama">
                                @error('name')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="inputEmail">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail"
                                    placeholder="Masukan Email">
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
                                    placeholder="Masukan No Telepon">
                                @error('telepon')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="inputAlamat">Alamat</label>
                                <textarea rows="5" type="text" name="alamat" class="form-control" id="inputAlamat"></textarea>
                                @error('telepon')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        @if (auth()->user()->role == 'admin')
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="inputState">Role</label>
                                    <select id="inputState" name="role" class="form-control">
                                        <option selected>Pilih Role</option>
                                        <option value="admin"{{ old('role') == 'admin' ? 'selected' : '' }}>admin
                                        </option>
                                        <option value="supervisor">supervisor</option>
                                        <option value="kitchen">kitchen</option>
                                        <option value="pelanggan">pelanggan</option>
                                        <option value="waiter">waiter</option>
                                    </select>
                                    @error('role')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            @else
                                <div class="mb-3 col-md-6">
                                    <label for="inputState">Role</label>
                                    <select id="inputState" name="role" class="form-control">
                                        <option selected>Pilih Role</option>
                                        <option value="kitchen"{{ old('role') == 'kitchen' ? 'selected' : '' }}>kitchen
                                        </option>
                                        <option value="pelanggan">pelanggan</option>
                                        <option value="pelanggan">pelanggan</option>
                                        <option value="waiter">waiter</option>
                                    </select>
                                    @error('role')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                        @endif

                        <div class="mb-3 col-md-6">
                            <label for="outlet_id" class="form-label">Outlet</label>
                            <select name="outlet_id" class="form-control">
                                <option value="">Pilih outlet</option>
                                @foreach ($outlet as $out)
                                    <option value="{{ $out->id_outlet }}">{{ $out->nama_outlet }}</option>
                                @endforeach
                            </select>

                            @error('outlet_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="foto"><i class="fa fa-cloud-upload"></i> Tambah foto</label><br>
                        <input type="file" id="foto" class="dropify" data-max-file-size="5m"
                            name="foto"></input>
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
