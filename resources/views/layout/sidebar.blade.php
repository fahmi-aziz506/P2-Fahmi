<?php

use Illuminate\Support\Facades\DB;

use App\Models\Setting;
use App\Models\User;

$setting = Setting::with('outlet')->first();

?>
<style>
    /* Hover effect */
    .sidebar .menu-item:hover {
        background-color: gray;
    }

    .sidebar .menu-item:hover a {
        color: white !important;
    }

    /* Active menu */
    .sidebar .menu-item.active,
    .sidebar .menu-item.active a {
        background-color: gray !important;
        color: white !important;
    }
</style>
@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user()->load('outlet');
@endphp


<nav id="sidebar" class="sidebar">
    <a class='sidebar-brand' href='#'>
        <img style="width: 50px; height: 50px; background-size:cover;"
            src="{{ asset('storage/logo_perusahaan/' . $setting->path_logo) }}" class="img-fluid rounded-circle mb-2" />
        <span style="position: relative; right: -6px; color:white; font-size:15px;">{{ $setting->nama_perusahaan }} |
            {{ $user->outlet->nama_outlet }}</span>
    </a>

    <div class="sidebar-content">
        <div class="sidebar-user"><a href="{{ route('profile') }}">
                @if (auth()->user()->foto == '0')
                    <img src="{{ asset('form/img/avatars/avatars-default.png') }}"
                        class="img-fluid rounded-circle mb-2">
                @elseif (auth()->user()->foto == '')
                    <img src="{{ asset('form/img/avatars/avatars-default.png') }}"
                        class="img-fluid rounded-circle mb-2">
                @else
                    <img src="{{ asset('storage/foto_user/' . auth()->user()->foto) }}"
                        class="img-fluid rounded-circle mb-2" />
                @endif
            </a>
            <div class="fw-bold">{{ Auth::User()->name }}</div>
            @if (auth()->user()->role == 'admin')
                <small class="btn btn-info">{{ Auth::User()->role }}</small>
            @endif

            @if (auth()->user()->role == 'supervisor')
                <small class="btn btn-secondary">{{ Auth::User()->role }}</small>
            @endif

            @if (auth()->user()->role == 'kitchen')
                <small class="btn btn-warning">{{ Auth::User()->role }}</small>
            @endif

            @if (auth()->user()->role == 'kasir')
                <small class="btn btn-primary">{{ Auth::User()->role }}</small>
            @endif

            @if (auth()->user()->role == 'waiter')
                <small class="btn btn-danger">{{ Auth::User()->role }}</small>
            @endif

            @if (auth()->user()->role == 'pelanggan')
                <small class="btn btn-success">{{ Auth::User()->role }}</small>
            @endif

        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main
            </li>
            <li class="sidebar-item ">
                <a class="sidebar-link menu-item {{ request()->is('dashboard') ? 'active' : '' }}"
                    href="{{ route('user.dashboard') }}">
                    <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>


            {{-- End menu absensi --}}

            {{-- Start Menu Kategori --}}

            <li class="sidebar-header"> Menu Kategori </li>

            <li class="sidebar-item ">
                <a class='sidebar-link menu-item {{ request()->is('outlet') ? 'active' : '' }}'
                    href='{{ route('outlet.index') }}'>
                    <i class="align-middle me-2 far fa-fw fa-user-circle"></i> <span class="align-middle">Outlet</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a class='sidebar-link menu-item {{ request()->is('kategori') ? 'active' : '' }}'
                    href='{{ route('kategori.index') }}'>
                    <i class="align-middle me-2 far fa-fw fa-user-circle"></i> <span
                        class="align-middle">Kategori</span>
                </a>
            </li>



            {{-- End Menu Kategori --}}



            {{-- Start user & setting --}}
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'supervisor')
                <li class="sidebar-header"> User & Setting </li>
                <li class="sidebar-item">
                    <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle me-2 far fa-fw fa-user-circle"></i> <span class="align-middle">Manajemen
                            User</span>
                    </a>
                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a class='sidebar-link menu-item {{ request()->is('user') ? 'active' : '' }}'
                                href='{{ route('user.index') }}'><span class="align-middle">User
                                    Admin</span></a>
                        </li>

                        <li class="sidebar-item">
                            <a class='sidebar-link menu-item {{ request()->is('user_supervisor') ? 'active' : '' }}'
                                href='{{ route('user.index_supervisor') }}'><span class="align-middle">User
                                    Supervisor</span></a>
                        </li>

                        <li class="sidebar-item">
                            <a class='sidebar-link menu-item {{ request()->is('user_kitchen') ? 'active' : '' }}'
                                href='{{ route('user.index_kitchen') }}'><span class="align-middle">User
                                    Kitchen</span></a>
                        </li>

                        <li class="sidebar-item">
                            <a class='sidebar-link menu-item {{ request()->is('user_kasir') ? 'active' : '' }}'
                                href='{{ route('user.index_kasir') }}'><span class="align-middle">User
                                    Kasir</span></a>
                        </li>

                        <li class="sidebar-item">
                            <a class='sidebar-link menu-item {{ request()->is('user_waiter') ? 'active' : '' }}'
                                href='{{ route('user.index_waiter') }}'><span class="align-middle">User
                                    Waiter</span></a>
                        </li>

                        <li class="sidebar-item">
                            <a class='sidebar-link menu-item {{ request()->is('user_pelanggan') ? 'active' : '' }}'
                                href='{{ route('user.index_pelanggan') }}'><span class="align-middle">User
                                    pelanggan</span></a>
                        </li>

                    </ul>
                </li>
                {{-- <li class="sidebar-item ">
                    <a class='sidebar-link menu-item {{ request()->is('user') ? 'active' : '' }}'
                        href='{{ route('user.index') }}'>
                        <i class="align-middle me-2 far fa-fw fa-user-circle"></i> <span
                            class="align-middle">User</span>
                    </a>
                </li> --}}
            @else
            @endif

            @if (auth()->user()->role == 'admin')
                <li class="sidebar-item ">
                    <a class='sidebar-link menu-item {{ request()->is('setting') ? 'active' : '' }}'
                        href='{{ route('setting.index') }}'>
                        <i class="align-middle me-2 fas fa-fw fa-cog"></i> <span class="align-middle">Setting</span>
                    </a>
                </li>
            @else
            @endif


            {{-- End User & Setting --}}

        </ul>
    </div>
</nav>
