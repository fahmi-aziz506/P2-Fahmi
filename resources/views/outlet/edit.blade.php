@extends('layout.main')
@section('content')
    <div class="container-fluid">

        <div class="header">
            <h2 class="header-title">
                Tables Data Alat
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb gap-2">
                    <li class="breadcrumb-item "><a href='{{ route('user.dashboard') }}'>Dashboard</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item "><a href='{{ route('alat.index') }}'>Tables Data Alat</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Alat</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 style="font-size: 25px;" class="card-title">Form Edit Data Alat</h2>
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

                    <form action="{{ route('alat.update', ['id_alat' => $alat->id_alat]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-2">
                                <label for="inputName">Kode Alat</label>
                                <input style="background-color: gray; color:white;" type="text" name="kode_alat"
                                    class="form-control" id="inputName" value="{{ $alat->kode_alat }}" readonly>
                                @error('kode_alat')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="gambar"><i class="fa fa-cloud-upload"></i> Edit Gambar</label><br>

                                @if ($alat->gambar && $alat->gambar !== '0')
                                    <input type="file" id="gambar" class="dropify" data-max-file-size="4m"
                                        name="gambar"
                                        data-default-file="{{ asset('storage/gambar_alat/' . $alat->gambar) }}">

                                    <div class="mt-2">
                                        <label for="hapus">
                                            <input id="hapus" type="checkbox" name="delete_gambar" value="1"> Hapus
                                            gambar
                                        </label>
                                    </div>
                                @else
                                    <input type="file" id="gambar" class="dropify" data-max-file-size="5m"
                                        name="gambar">
                                @endif

                                @error('gambar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="inputName">Nama Alat</label>
                                <input type="text" name="nama_alat" class="form-control" id="inputName"
                                    value="{{ $alat->nama_alat }}">
                                @error('nama_alat')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="satuan_id" class="form-label">Satuan</label>
                                <select name="satuan_id" id="satuan_id" class="form-control" required>
                                    @foreach ($satuan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $alat->satuan_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="inputName">Stok</label>
                                <input type="number" name="stok" class="form-control" id="inputName"
                                    value="{{ $alat->stok }}">
                                @error('stok')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="inputName">Keterangan</label>
                                <textarea rows="5" type="text" name="keterangan" class="form-control" id="inputName"
                                    >{{ $alat->keterangan }}</textarea>
                                @error('keterangan')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary gap-3"><i class="fa fa-plus"></i> Submit</button>
                        <button type="button" class="btn btn-warning" onclick="window.location='{{ url('/alat') }}'"
                            style="position:relative; right: -4px;"><i class="fa fa-arrow-left"></i> Kembali
                        </button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
