@extends('layout.main')
@section('content')
    <div class="container-fluid">

        <div class="header">
            <h2 class="header-title">
                Tables Kategori
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb gap-2">
                    <li class="breadcrumb-item "><a href='{{ route('user.dashboard') }}'>Dashboard</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item "><a href='{{ route('kategori.index') }}'>Tables Kategori</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item active" aria-current="page">Edit Kategori</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 style="font-size: 25px;" class="card-title">Form Edit Kategori</h2>
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

                    <form action="{{ route('kategori.update', ['id_kategori' => $data->id_kategori]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-2">
                                <label for="inputName">Kode Kategori</label>
                                <input style="background-color: gray; color:white;" type="text" name="kode_kategori"
                                    class="form-control" id="inputName" value="{{ $data->kode_kategori }}" readonly>
                                @error('kode_kategori')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="inputName">Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control" id="inputName"
                                    value="{{ $data->nama_kategori }}">
                                @error('nama_kategori')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="inputName">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" id="inputName"
                                    value="{{ $data->keterangan }}">
                                @error('keterangan')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary gap-3"><i class="fa fa-plus"></i> Submit</button>
                        <button type="button" class="btn btn-warning" onclick="window.location='{{ url('/kategori') }}'"
                            style="position:relative; right: -4px;"><i class="fa fa-arrow-left"></i> Kembali
                        </button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
