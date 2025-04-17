@extends('layout.main')
@section('content')
    @php
        $isEdit = isset($editkategori);
    @endphp
    <div class="container-fluid">
        <div class="header">
            <h2 class="header-title">
                Tables Kateggori
            </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb gap-2">
                    <li class="breadcrumb-item "><a href='{{ route('user.dashboard') }}'>Dashboard</a></li>
                    <span style="color: white">/</span>
                    <li class="breadcrumb-item active" aria-current="page">Tables Kateggori</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 style="font-size: 25px; " class="card-title">Tables Kateggori</h2>
                        {{-- <a style="color: white" class="btn btn-secondary " href="{{ route('Kateggori.create') }}">
                            <i class=" fa fa-fw fa-plus"></i> Tambah</a> --}}
                        {{-- <a style="color: white;" class="btn btn-info" href="{{ route('Kateggori.Kateggori') }}"><i
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
                        {{-- FORM TAMBAH / EDIT Kateggori --}}
                        {{-- ======================= --}}
                        <div class="card mb-4">
                            <div class="card-header">
                                <strong>{{ $isEdit ? 'Edit Kategori' : 'Tambah Kategori Baru' }}</strong>
                            </div>
                            <div class="card-body">
                                <form
                                    action="{{ $isEdit ? route('kategori.update', $editkategori->id_kategori) : route('kategori.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if ($isEdit)
                                        @method('PUT')
                                    @endif

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="kode_kategori">Kode Kateggori</label>
                                            <input type="text" name="kode_kategori" class="form-control"
                                                value="{{ old('kode_kategori', $isEdit ? $editkategori->kode_kategori : generateKodeKategori()) }}"
                                                readonly style="background-color: grey; color: white;">

                                        </div>

                                        <div class="col-md-6">
                                            <label for="nama_kategori">Nama Kategori</label>
                                            <input type="nama_kategori" name="nama_kategori" class="form-control"
                                                value="{{ old('nama_kategori', $isEdit ? $editkategori->nama_kategori : '') }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea name="deskripsi" rows="2" class="form-control">{{ old('deskripsi', $isEdit ? $editkategori->deskripsi : '') }}</textarea>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-{{ $isEdit ? 'warning' : 'success' }}">
                                                {{ $isEdit ? 'Update' : '+ Simpan' }}
                                            </button>
                                            @if ($isEdit)
                                                <a style="color: white;" href="{{ route('kategori.index') }}"
                                                    class="btn btn-secondary">Batal</a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title" style="font-size: 25px;">Tables Kategori</h2><br>
                                <a style="color:white;" class="btn btn-info" href="{{ route('kategori.laporan') }}">
                                    <i class="fa fa-save"></i> Laporan</a>
                            </div>

                            <div class="card-body">
                                <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Kateggori</th>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategori as $d)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $d->kode_kategori }}</td>
                                                <td>{{ $d->nama_kategori }}</td>
                                                <td>
                                                    <a style="color: white"
                                                        href="{{ route('kategori.index', ['edit' => $d->id_kategori]) }}"
                                                        class="btn btn-primary"><i class="fas fa-fw fa-pencil-alt"></i></a>
                                                    |
                                                    <a style="color: white; "data-bs-toggle="modal"
                                                        data-bs-target="#delete{{ $d->id_kategori }}"
                                                        class="btn btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
                                                    |
                                                    <a class="btn btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#detail{{ $d->id_kategori }}">
                                                        <i class="fas fa-exclamation-circle"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            {{-- Modal Detail --}}
                                            <div class="modal fade" id="detail{{ $d->id_kategori }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Kategori</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <label for="kode_kategori">Kode Kategori</label>
                                                            <input style="background-color:gray; color:white;"
                                                                class="form-control" type="text" id="kode_kategori"
                                                                value="{{ $d->kode_kategori }}" readonly>

                                                            <br>

                                                            <label for="nama_kategori">Nama Kategori</label>
                                                            <input style="background-color:gray; color:white;"
                                                                class="form-control" type="text" id="nama_kategori"
                                                                value="{{ $d->nama_kategori }}" readonly>

                                                            <br>

                                                            <label for="deskripsi">Deskripsi </label>
                                                            @if ($d->deskripsi == '')
                                                                <input style="background-color:gray; color:white;"
                                                                    class="form-control" type="text" id="deskripsi"
                                                                    value="Deskripsi Kosong" readonly>
                                                            @else
                                                                <input style="background-color:gray; color:white;"
                                                                    class="form-control" type="text" id="deskripsi"
                                                                    value="{{ $d->deskripsi }}" readonly>
                                                            @endif
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Modal delete --}}

                                            <div class="modal modal-colored modal-danger fade"
                                                id="delete{{ $d->id_kategori }}" tabindex="-1" role="dialog"
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
                                                                    {{ $d->nama_kategori }}</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form
                                                                action="{{ route('kategori.delete', ['id_kategori' => $d->id_kategori]) }}"
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
