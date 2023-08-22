@extends('template')

@section('user')
<li class="nav-item active">
    <a class="nav-link" href="akun">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Kelola Akun Guru</span>
    </a>
</li>
@endsection

@section('content')
<h3 class="m-2 font-weight-bold">Daftar Akun Guru</h3>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="justify-content-right" style="">
                <a href="/akun/create" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>                         
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($akun as $row)
                        @if ($row->level === 'guru')
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->notel }}</td>
                            <td>
                                @if ($row->kelamin === 'pria')
                                    <span class="badge badge-primary">Pria</span>
                                @elseif ($row->kelamin === 'wanita')
                                    <span class="badge badge-secondary">Wanita</span>
                                @endif
                            </td>
                            <td>
                                @if ($row->level === 'admin')
                                    <span class="badge badge-success">Admin</span>
                                @elseif ($row->level === 'guru')
                                    <span class="badge badge-warning">Guru</span>
                                @endif
                            </td>
                            <td>
                                <a href="/akun/edit/{{ $row->id }}" class="btn btn-info">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="#" class="btn btn-danger hapusakun" data-id="{{ $row->id }}" data-name="{{ $row->name }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                        @endif
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>   
    
@endsection