@extends('template')

@section('profile')
    <li class="nav-item active">
        <a class="nav-link" href="/profile">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Profile</span>
        </a>
    </li>
@endsection

@section('content')
<h3 class="m-2 font-weight-bold">Profile</h3>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-lg"> 
                <div class="card-header bg-primary text-white">Profil Pengguna</div>

                <div class="card-body">
                    <div class="row col-sm-12">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    Biodata
                                </div>
                                <div class="text-center mt-2">
                                    @if ($user->kelamin === 'pria')
                                        <img class="img-profile rounded-circle" width="25%" src="assets/dashboard-admin/img/undraw_profile.svg">
                                    @elseif ($user->kelamin === 'wanita')
                                        <img class="img-profile rounded-circle" width="25%" src="assets/dashboard-admin/img/wanita.png">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h5><b style="margin-right: 49%;">Nama</b>: {{ $user->name }}</h5>
                                    <h5><b style="margin-right: 46%;">NUPTK</b>: {{ $user->nuptk }}</h5>
                                    <h5><b style="margin-right: 33%;">Tanggal Lahir</b>: {{ $user->tgk_lahir }}</h5>
                                    <h5><b style="margin-right: 38%;">No Telepon</b>: {{ $user->notel }}</h5>
                                    <h5><b style="margin-right: 34%;">Jenis Kelamin</b>: {{ $user->kelamin }}</h5>
                                    <h5><b style="margin-right: 50%;">Email</b>: {{ $user->email }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Card Alamat -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    Alamat
                                </div>
                                <div class="card-body">
                                    <h5><b style="margin-right: 49%;">Alamat</b>: {{ $user->alamat }}</h5>
                                </div>
                            </div>

                            <!-- Card Pendidikan -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    Pendidikan
                                </div>
                                <div class="card-body">
                                    <h5><b style="margin-right: 23%;">Pendidikan Terakhir</b>: {{ $user->pdd_terakhir }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
