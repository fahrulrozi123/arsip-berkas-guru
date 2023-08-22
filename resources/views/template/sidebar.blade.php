<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mb-5 mt-2" href="#">
                <div class="sidebar-brand-icon mt-5">
                    <img src="assets/dashboard-admin/img/logo.png" width="40%" alt="">
                    <br>
                    <div class="sidebar-brand-text mt-2">Alia Islamic Schoool</div>
                </div>
            </a>

            <!-- Divider -->
            @php
            $user = \App\Models\User::where('id', auth()->user()->id)
            ->first();
            @endphp          
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            @section('dashboard')
                <li class="nav-item">
                    <a class="nav-link" href="/home">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            @show

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Informations
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            @section('user')
            @if($user->level == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="/akun">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        <span>Kelola Akun Guru</span>
                    </a>
                </li>
            @endif
            @show
            @section('download')
            @if($user->level == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="/download-berkas">
                        <i class="fa fa-download"></i>
                        <span>download Berkas Guru</span>
                    </a>
                </li>
            @endif
            @show
            @section('upload')
            @if($user->level == 'guru')
                <li class="nav-item">
                    <a class="nav-link" href="/upload-berkas">
                        <i class="fa fa-download"></i>
                        <span>Upload Berkas</span>
                    </a>
                </li>
            @endif
            @show
            @section('profile')
            @if($user->level == 'guru')
                <li class="nav-item mb-5">
                    <a class="nav-link" href="/profile">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        <span>Profile</span>
                    </a>
                </li>
            @endif
            @show

            @if($user->level == 'admin')
                <li class="nav-item mt-5">
                    <a class="nav-link" href="/logout">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            @elseif($user->level == 'guru')
                <li class="nav-item mt-5">
                    <a class="nav-link" href="/logoutguru">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            @endif

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>