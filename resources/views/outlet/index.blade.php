@extends('layout.main')
@section('content')
    @php
        $isEdit = isset($editOutlet);
    @endphp
    <div class="container-fluid">
        <div class="header">
            <h2 class="header-title">
                Tables Outlet
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb gap-2">
                    <li class="breadcrumb-item "><a href='{{ route('user.dashboard') }}'>Dashboard</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item active" aria-current="page">Tables Outlet</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 style="font-size: 25px; " class="card-title">Tables Outlet</h2>
                        {{-- <a style="color: white" class="btn btn-secondary " href="{{ route('outlet.create') }}">
                            <i class=" fa fa-fw fa-plus"></i> Tambah</a> --}}
                        {{-- <a style="color: white;" class="btn btn-info" href="{{ route('outlet.outlet') }}"><i
                                class="fa fa-save"></i> Laporan</a> --}}
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
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success alert-outline-coloured alert-dismissible col-6" role="alert">
                                <div class="alert-icon">
                                    <i class="fas fa-fw fa-user-plus"></i>
                                </div>
                                <div class="alert-message">
                                    <strong>{{ session('success') }}</strong>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('edit'))
                            <div class="alert alert-info alert-outline-coloured alert-dismissible col-6" role="alert">
                                <div class="alert-icon">
                                    <i class="fas fa-fw fa-pencil-alt"></i>
                                </div>
                                <div class="alert-message">
                                    <strong>{{ session('edit') }}</strong>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('delete'))
                            <div class="alert alert-danger alert-outline-coloured alert-dismissible col-6" role="alert">
                                <div class="alert-icon">
                                    <i class="fas fa-fw fa-trash-alt"></i>
                                </div>
                                <div class="alert-message">
                                    <strong>{{ session('delete') }}</strong>
                                </div>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- ======================= --}}
                        {{-- FORM TAMBAH / EDIT OUTLET --}}
                        {{-- ======================= --}}
                        <div class="card mb-4">
                            <div class="card-header">
                                <strong>{{ $isEdit ? 'Edit Outlet' : 'Tambah Outlet Baru' }}</strong>
                            </div>
                            <div class="card-body">
                                <form
                                    action="{{ $isEdit ? route('outlet.update', $editOutlet->id_outlet) : route('outlet.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if ($isEdit)
                                        @method('PUT')
                                    @endif

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="nama_outlet">Nama Outlet</label>
                                            <input type="text" name="nama_outlet" class="form-control"
                                                value="{{ old('nama_outlet', $isEdit ? $editOutlet->nama_outlet : '') }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="kecamatan_perusahaan">Kecamatan Perusahaan</label>
                                            <input type="kecamatan_perusahaan" name="kecamatan_perusahaan"
                                                class="form-control"
                                                value="{{ old('kecamatan_perusahaan', $isEdit ? $editOutlet->kecamatan_perusahaan : '') }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="kota_perusahaan">Kota Perusahaan</label>
                                            <input type="text" name="kota_perusahaan" class="form-control"
                                                value="{{ old('kota_perusahaan', $isEdit ? $editOutlet->kota_perusahaan : '') }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="provinsi_perusahaan">Provinsi Perusahaan</label>
                                            <input type="provinsi_perusahaan" name="provinsi_perusahaan"
                                                class="form-control"
                                                value="{{ old('provinsi_perusahaan', $isEdit ? $editOutlet->provinsi_perusahaan : '') }}">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="kode_pos">Kode Pos</label>
                                            <input type="number" name="kode_pos" class="form-control"
                                                value="{{ old('kode_pos', $isEdit ? $editOutlet->kode_pos : '') }}">
                                        </div>

                                        <div class="col-md-12">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" rows="2" class="form-control">{{ old('alamat', $isEdit ? $editOutlet->alamat : '') }}</textarea>
                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-{{ $isEdit ? 'warning' : 'success' }}">
                                                {{ $isEdit ? 'Update' : '+ Simpan' }}
                                            </button>
                                            @if ($isEdit)
                                                <a href="{{ route('outlet.index') }}" class="btn btn-secondary">Batal</a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title" style="font-size: 25px;">Tables Outlet</h2><br>
                                <a style="color:white;" class="btn btn-info" href="{{ route('outlet.laporan') }}">
                                    <i class="fa fa-save"></i> Laporan</a>
                            </div>

                            <div class="card-body">
                                <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama outlet</th>
                                            <th>Kecamatan Perusahaan</th>
                                            <th>Kota Perusahaan</th>
                                            <th>Provinsi Perusahaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($outlet as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->nama_outlet }}</td>
                                                <td>{{ $d->kecamatan_perusahaan }}</td>
                                                <td>{{ $d->kota_perusahaan }}</td>
                                                <td>{{ $d->provinsi_perusahaan }}</td>
                                                <td>
                                                    <a style="color: white"
                                                        href="{{ route('outlet.index', ['edit' => $d->id_outlet]) }}"
                                                        class="btn btn-primary"><i
                                                            class="fas fa-fw fa-pencil-alt"></i></a> |
                                                    <a style="color: white; "data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $d->id_outlet }}"
                                                        class="btn btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
                                                    |
                                                    <a class="btn btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#detail{{ $d->id_outlet }}">
                                                        <i class="fas fa-exclamation-circle"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            {{-- Modal Detail --}}
                                            <div class="modal fade" id="detail{{ $d->id_outlet }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Outlet</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <label for="nama_outlet">Nama Outlet</label>
                                                            <input style="background-color:gray; color:white;"
                                                                class="form-control" type="text" id="nama_outlet"
                                                                value="{{ $d->nama_outlet }}" readonly>

                                                            <br>

                                                            <label for="kecamatan_perusahaan">Kecamatan Perusahaan</label>
                                                            <input style="background-color:gray; color:white;"
                                                                class="form-control" type="text"
                                                                id="kecamatan_perusahaan"
                                                                value="{{ $d->kecamatan_perusahaan }}" readonly>

                                                            <br>

                                                            <label for="kota_perusahaan">Kota Perusahaan</label>
                                                            <input style="background-color:gray; color:white;"
                                                                class="form-control" type="text" id="kota_perusahaan"
                                                                value="{{ $d->kota_perusahaan }}" readonly>

                                                            <br>

                                                            <label for="provinsi_perusahaan">Provinsis Perusahaan</label>
                                                            <input style="background-color:gray; color:white;"
                                                                class="form-control" type="text"
                                                                id="provinsi_perusahaan"
                                                                value="{{ $d->provinsi_perusahaan }}" readonly>

                                                            <br>

                                                            <label for="alamat">Alamat </label>
                                                            <input style="background-color:gray; color:white;"
                                                                class="form-control" type="text" id="alamat"
                                                                value="{{ $d->alamat }}" readonly>

                                                            <label for="kode_pos">Kode Pos</label>
                                                            <input style="background-color:gray; color:white;"
                                                                class="form-control" type="text" id="kode_pos"
                                                                value="{{ $d->kode_pos }}" readonly>

                                                            <br>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal modal-colored modal-danger fade"
                                                id="delete{{ $d->id_outlet }}" tabindex="-1" role="dialog"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body m-3">
                                                            <p class="mb-0 text-white">Apakah kamu yakin ingin
                                                                menghapus data
                                                                <b style="font-size: 20px; color:black">
                                                                    {{ $d->nama_outlet }}</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form
                                                                action="{{ route('outlet.delete', ['id_outlet' => $d->id_outlet]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-light">ya,
                                                                    Hapus</button>
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
        </div>
    </div>
@endsection
