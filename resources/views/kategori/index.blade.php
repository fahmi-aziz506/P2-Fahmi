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
                    <li class="breadcrumb-item active" aria-current="page">Tables Kategori</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 style="font-size: 25px; " class="card-title">Tables Kategori</h2> <br>
                        {{-- Tombol Tambah Data --}}
                        <button class="btn btn-success" id="btn-tambah">
                            <i class="fa fa-plus"></i> Tambah Data
                        </button>

                        <a style="color: white;" class="btn btn-info" href="{{ route('kategori.kategori') }}"><i class="fa fa-save"></i> Laporan</a>

                        {{-- Form To-Do List (Disembunyikan di Awal) --}}
                        <form action="{{ route('kategori.store') }}" method="POST" id="form-todo"
                            style="display: none; margin-top: 20px;">
                            @csrf
                            <div class="col-lg-4">
                                <input style="color: white; background-color:gray;" class="form-control" type="text"
                                    value="{{ generateKodeKategori() }}" name="kode_kategori" readonly> <br>
                                <input class="form-control" type="text" name="nama_kategori"
                                    placeholder="Nama kategori"><br>
                                <input class="form-control" type="text" name="keterangan"
                                    placeholder="Keterangan (opsional)"> <br>

                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-danger" id="btn-batal">Batal</button>
                            </div>
                        </form>
                    </div>
                    <hr>
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

                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Keterangan</th>
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
                                            @if ($d->keterangan == '')
                                                <b style="color: black;"> Tidak Ada Keterangan </b>
                                            @else
                                                {{ $d->keterangan }}
                                            @endif
                                        </td>
                                        <td>
                                            <a style="color: white"
                                                href="{{ route('kategori.edit', ['id_kategori' => $d->id_kategori]) }}"
                                                class="btn btn-primary"><i class="fas fa-fw fa-pencil-alt"></i> Edit</a> |
                                            <a style="color: white"data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $d->id_kategori }}" class="btn btn-danger"><i
                                                    class="fas fa-fw fa-trash-alt"></i> Hapus</a>
                                        </td>
                                    </tr>

                                    <div class="modal modal-colored modal-danger fade" id="delete{{ $d->id_kategori }}"
                                        tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body m-3">
                                                    <p class="mb-0 text-white">Apakah kamu yakin ingin menghapus data
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
                                                        <button type="submit" class="btn btn-light">ya, Hapus</button>
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

    {{-- JavaScript untuk Menampilkan dan Menyembunyikan Form --}}
    <script>
        document.getElementById("btn-tambah").addEventListener("click", function() {
            document.getElementById("form-todo").style.display = "block"; // Tampilkan form
            this.style.display = "none"; // Sembunyikan tombol tambah
        });

        document.getElementById("btn-batal").addEventListener("click", function() {
            document.getElementById("form-todo").style.display = "none"; // Sembunyikan form
            document.getElementById("btn-tambah").style.display = "inline-block"; // Munculkan kembali tombol tambah
        });
    </script>
@endsection
