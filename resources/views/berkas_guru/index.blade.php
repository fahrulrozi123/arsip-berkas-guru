@extends('template')

@section('upload')
<li class="nav-item active">
    <a class="nav-link" href="/upload-berkas">
        <i class="fa fa-download"></i>
        <span>Upload Berkas</span>
    </a>
</li>
@endsection

@section('content')
<h3 class="m-2 font-weight-bold">Upload Berkas</h3>
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="justify-content-right" style="">
                @if (!$guru || (!$guru->ijazah_S1 && !$guru->ktp && !$guru->ijazah_SMA && !$guru->ijazah_SMP && !$guru->kk))
                    <a href="/upload/create" class="btn btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>NUPTK</th>
                            <th>KTP</th>
                            <th>Ijazah SD</th>
                            <th>Ijazah SMp</th>
                            <th>Ijazah SMA</th>
                            <th>Ijazah S1</th>
                            <th>Ijazah S2</th>
                            <th>SK Pengangkatan Yayasan</th>
                            <th>SK Pengangkatan Kepala Sekolah</th>
                            <th>Akte Kelahiran</th>
                            <th>Kartu Keluarga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>name</th>
                            <th>NUPTK</th>
                            <th>KTP</th>
                            <th>Ijazah SD</th>
                            <th>Ijazah SMp</th>
                            <th>Ijazah SMA</th>
                            <th>Ijazah S1</th>
                            <th>Ijazah S2</th>
                            <th>SK Pengangkatan Yayasan</th>
                            <th>SK Pengangkatan Kepala Sekolah</th>
                            <th>Akte Kelahiran</th>
                            <th>Kartu Keluarga</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $row)
                        @if (Auth::check() && Auth::user()->name == $row->nama)
                            <tr>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->nuptk }}</td>                          
                                <td>
                                    <a href="{{ route('lihat.berkas', basename($row->ktp)) }}" target="_blank">
                                        {{ basename($row->ktp) }}
                                    </a>
                                </td>                            
                                <td>
                                    <a href="{{ route('lihat.berkas', basename($row->ijazah_SD)) }}" target="_blank">
                                        {{ basename($row->ijazah_SD) }}
                                    </a>
                                </td>                            
                                <td>
                                    <a href="{{ route('lihat.berkas', basename($row->ijazah_SMP)) }}" target="_blank">
                                        {{ basename($row->ijazah_SMP) }}
                                    </a>
                                </td>                            
                                <td>
                                    <a href="{{ route('lihat.berkas', basename($row->ijazah_SMA)) }}" target="_blank">
                                        {{ basename($row->ijazah_SMA) }}
                                    </a>
                                </td>                            
                                <td>
                                    <a href="{{ route('lihat.berkas', basename($row->ijazah_S1)) }}" target="_blank">
                                        {{ basename($row->ijazah_S1) }}
                                    </a>
                                </td>                                                       
                                <td>
                                    <a href="{{ route('lihat.berkas', basename($row->ijazah_S2)) }}" target="_blank">
                                        {{ basename($row->ijazah_S2) }}
                                    </a>
                                </td>                                                       
                                <td>
                                    <a href="{{ route('lihat.berkas', basename($row->sk_yayasan)) }}" target="_blank">
                                        {{ basename($row->sk_yayasan) }}
                                    </a>
                                </td>                                                       
                                <td>
                                    <a href="{{ route('lihat.berkas', basename($row->sk_kepsek)) }}" target="_blank">
                                        {{ basename($row->sk_kepsek) }}
                                    </a>
                                </td>                                                       
                                <td>
                                    <a href="{{ route('lihat.berkas', basename($row->akte)) }}" target="_blank">
                                        {{ basename($row->akte) }}
                                    </a>
                                </td>                                                       
                                <td>
                                    <a href="{{ route('lihat.berkas', basename($row->kk)) }}" target="_blank">
                                        {{ basename($row->kk) }}
                                    </a>
                                </td>                                                                                                              
                                <td>
                                    <a href="/upload/edit/{{ $row->id }}" class="btn btn-info">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger hapusberkas" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">
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