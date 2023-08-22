@extends('template')

@section('download')
    <li class="nav-item active">
        <a class="nav-link" href="/download-berkas">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>download Berkas Guru</span>
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
                        <tr>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->nuptk }}</td>
                            @foreach(['ktp', 'ijazah_SD', 'ijazah_SMP', 'ijazah_SMA', 'ijazah_S1', 'ijazah_S2', 'sk_yayasan', 'sk_kepsek', 'akte', 'kk'] as $field)
                                @if ($row->$field)
                                    <td>
                                        <a href="{{ route('lihat.berkasguru', ['username' => $row->nama, 'file' => basename($row->$field)]) }}" target="_blank">
                                            {{ basename($row->$field) }}
                                        </a>
                                    </td>
                                @else
                                    <td>-</td>
                                @endif
                            @endforeach
                            <td>
                                <a href="{{ route('download', ['id' => $row->id]) }}" class="btn btn-primary">
                                    <i class="fa fa-download"></i> Download Semua Berkas
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    
                    
                    </tbody>
                </table>
                
            </div>
        </div>
        
    </div>   
    
@endsection