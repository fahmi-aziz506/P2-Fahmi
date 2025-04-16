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
                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 style="font-size: 25px;" class="card-title">Form Edit User</h2>
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
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

                    <form action="{{ route('user.update-profile', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="inputName">Nama</label>
                                <input type="text" name="name" class="form-control" id="inputName"
                                    value="{{ $user->name }}">
                                @error('name')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="inputEmail">Email</label>
                                <input style="background-color: gray; color:white;" readonly type="email" name="email" class="form-control" value="{{ $user->email }}"
                                    id="inputEmail" >
                                @error('email')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="inputTelepon">No Telepon</label>
                                <input type="number" name="telepon" class="form-control" id="inputTelepon"
                                value="{{ $user->telepon }}">
                                @error('telepon')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="role">Role</label> <br>
                                        @if ($user->role == 'admin')
                                             <button id="role" class="btn mb-1 btn-info"><i class="fas fa-info" style="position: relative; left: -3px;"></i> 
                                                  {{ $user->role }} </button>
                                        @endif

                                        @if ($user->role == 'supervisor')
                                            <button id="role" class="btn mb-1 btn-success"><i class="fas fa-check" style="position: relative; left: -3px;"></i> 
                                                {{ $user->role }} </button>
                                        @endif

                                        @if ($user->role == 'teknisi')
                                            <button id="role" class="btn mb-1 btn-primary"><i class="fas fa-smile" style="position: relative; left: -3px;"></i> 
                                                {{ $user->role }} </button>
                                        @endif

                                        @if ($user->role == 'pengguna')
                                            <button id="role" class="btn mb-1 btn-warning"><i class="fas fa-exclamation" style="position: relative; left: -3px;"></i> 
                                                {{ $user->role }} </button>
                                        @endif

                                        <span style="color:red">@error('role'){{ $message }} @enderror</span>
                            </div>
                        </div>

                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="foto"><i class="fa fa-cloud-upload"></i> Edit foto</label><br>
                            @if ($user->foto)
                            <input type="file" id="foto" class="dropify" data-max-file-size="4m" name="foto"
                            data-default-file="{{ asset('storage/foto_user/' . $user->foto) }}" value="{{ old('foto') }}"></input>
                            <label for="hapus">
                                <input id="hapus" type="checkbox" name="delete_foto"> Hapus foto
                            </label>
                            @else
                            <input type="file" id="foto" data-default-file="{{ asset('form/img/avatars/avatars-default.png') }}" class="dropify" data-max-file-size="5m" name="foto"></input>    
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
