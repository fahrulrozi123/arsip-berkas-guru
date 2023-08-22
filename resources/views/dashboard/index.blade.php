@extends('template')

@section('dashboard')
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
@endsection

<style>
    .login100-pic {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%; /* Sesuaikan lebar gambar sesuai kebutuhan */
        height: 100%; /* Sesuaikan tinggi gambar sesuai kebutuhan */
        margin: 50%;
        margin-left: 100%;
    }

    .login100-pic img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 50%;
    }

</style>

@section('content')
<div class="sale_container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }} <span class="badge badge-success">{{ auth()->user()->name }}</span>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="login100-pic js-tilt" data-tilt>
                        <img src="assets/dashboard-admin/img/logo.png" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mt-5">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="login100-pic js-tilt" data-tilt>
                        <p>Selamat datang <span class="text-success">{{ auth()->user()->name }}</span> di <b class="text-dark">Alia Islamic Schoool</b> Sekolah SD SMP SMA Terpadu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection