@extends('layout.main')
@section('content')
    <div class="container-fluid">

        <div class="header">
            <h2 class="header-title">
                Form Informasi Perusahaan
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb gap-2">
                    <li class="breadcrumb-item "><a href='{{ route('user.dashboard') }}'>Dashboard</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item active" aria-current="page">Form Informasi Perusahaan</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 style="font-size: 25px;" class="card-title">Form Informasi Perusahaan</h2>
                </div>

                <div class="card-body">

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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                    <form action="{{ route('setting.edit', $setting->first()->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-9">
                                <label for="inputName">Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" class="form-control" id="inputName"
                                    value="{{ $setting->first()->nama_perusahaan }}">
                                @error('nama_perusahaan')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="inputEmail">Email</label>
                                <input type="email" name="email_perusahaan" class="form-control"
                                    value="{{ old('nama', $setting->first()->email_perusahaan) }}">
                                @error('email_perusahaan')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="inputPassword1">Telepon Perusahaan</label>
                                <input type="text" name="telepon" class="form-control" id="inputPassword1"
                                    value="{{ $setting->first()->telepon }}">
                                @error('telepon')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9" style="width: 200px, height: 200px, box-sizing: boreder-box;">
                                <label for="inputPassword">Alamat</label>
                                <textarea type="text" name="alamat" class="form-control" id="inputPassword" rows="6">{{ old('nama', $setting->first()->alamat) }}</textarea>
                                @error('alamat')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="foto"><i class="fa fa-cloud-upload"></i> Edit Logo</label><br>
                                @if ($setting->first()->path_logo)
                                    <input type="file" id="foto" class="dropify" data-max-file-size="4m"
                                        name="path_logo"
                                        data-default-file="{{ asset('storage/logo_perusahaan/' . $setting->first()->path_logo) }}"
                                        value="{{ old('path_logo') }}"></input>
                                @endif
                                @error('path_logo')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary gap-3"><i class="fa fa-edit"></i> Edit</button>

                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
