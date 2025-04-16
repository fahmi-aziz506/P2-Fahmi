@extends('layout.main')
@section('content')
    <div class="container-fluid">

        <div class="header">
            <h2 class="header-title">
                Tables Outlet
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb gap-2">
                    <li class="breadcrumb-item "><a href='{{ route('user.dashboard') }}'>Dashboard</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item "><a href='{{ route('outlet.index') }}'>Tables Outlet</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Outlet</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 style="font-size: 25px;" class="card-title">Form Tambah Outlet</h2>
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

                    <form action="{{ route('outlet.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="inputName">Nama Outlet</label>
                                <input type="text" name="nama_outlet" class="form-control" id="inputName"
                                    placeholder="Masukan Nama Outlet">
                                @error('nama_outlet')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="inputName">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="inputName"
                                    placeholder="Masukan Alamat">
                                @error('alamat')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="inputName">Kecamatan Perusahaan</label>
                                <input type="text" name="kecamatan_perusahaan" class="form-control" id="inputName"
                                    placeholder="Masukan Kecamatan Perusahaan">
                                @error('kecamatan_perusahaan')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="inputName">Kota Perusahaan</label>
                                <input type="text" name="kota_perusahaan" class="form-control" id="inputName"
                                    placeholder="Masukan Kota Perusahaan">
                                @error('kota_perusahaan')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="inputName">Provinsi perusahaan</label>
                                <input type="text" name="provinsi_perusahaan" class="form-control" id="inputName"
                                    placeholder="Masukan Provinsi Perusahaan">
                                @error('provinsi_perusahaan')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="inputName">Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control" id="inputName"
                                    placeholder="Masukan Kode Pos">
                                @error('kode_pos')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary gap-3"><i class="fa fa-plus"></i> Submit</button>
                        <button type="button" class="btn btn-warning" onclick="window.location='{{ url('/outlet') }}'"
                            style="position:relative; right: -4px;"><i class="fa fa-arrow-left"></i> Kembali
                        </button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
