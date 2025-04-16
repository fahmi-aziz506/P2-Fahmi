@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="header">
            <h2 class="header-title">Dashboard</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb gap-2">
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>

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

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Service Hari Ini</h5>
                        <h1 class="display-5"></h1>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Service Keseluruhan</h5>
                        <h1 class="display-5"></h1>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
