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

<section class="content">
    <div class="sale_container">
        <div class="block-header">
            <h2>Edit Berkas Guru</h2>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <form method="post" action="{{ route('upload.update', ['id' => $data->id]) }}" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="modal-body row g-12">
                            <div class="form-group col-sm-6">
                                <label for="nama" class="control-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="{{ $data->nama }}" readonly required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="nuptk" class="control-label">NUPTK</label>
                                <input type="text" name="nuptk" class="form-control" id="nuptk" value="{{ $data->nuptk }}" readonly required>
                            </div>
                            
                            <div class="form-group col-sm-6">
                                <label for="file" class="control-label">KTP</label>
                                <input type="file" name="ktp" class="form-control mb-3" id="ktp" value="{{ $data->ktp }}">
                                @if ($data->ktp)
                                    <h6>File saat ini: <a href="{{ route('lihat.berkas', basename($data->ktp)) }}" target="_blank">
                                        {{ basename($data->ktp) }}
                                    </a></h6>
                                @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="file" class="control-label">Ijazah SD</label>
                                <input type="file" name="ijazah_SD" class="form-control mb-3" id="ijazah_SD" value="{{ $data->ijazah_SD }}">
                                @if ($data->ijazah_SD)
                                    <h6>File saat ini: <a href="{{ route('lihat.berkas', basename($data->ijazah_SD)) }}" target="_blank">
                                        {{ basename($data->ijazah_SD) }}
                                    </a></h6>
                                @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="file" class="control-label">Ijazah SMP</label>
                                <input type="file" name="ijazah_SMP" class="form-control mb-3" id="ijazah_SMP" value="{{ $data->ijazah_SMP }}">
                                @if ($data->ijazah_SMP)
                                    <h6>File saat ini: <a href="{{ route('lihat.berkas', basename($data->ijazah_SMP)) }}" target="_blank">
                                        {{ basename($data->ijazah_SMP) }}
                                    </a></h6>
                                @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="file" class="control-label">Ijazah SMA</label>
                                <input type="file" name="ijazah_SMA" class="form-control mb-3" id="ijazah_SMA" value="{{ $data->ijazah_SMA }}">
                                @if ($data->ijazah_SMA)
                                    <h6>File saat ini: <a href="{{ route('lihat.berkas', basename($data->ijazah_SMA)) }}" target="_blank">
                                        {{ basename($data->ijazah_SMA) }}
                                    </a></h6>
                                @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="file" class="control-label">Ijazah S1</label>
                                <input type="file" name="ijazah_S1" class="form-control mb-3" id="ijazah_S1" value="{{ $data->ijazah_S1 }}">
                                @if ($data->ijazah_S1)
                                    <h6>File saat ini: <a href="{{ route('lihat.berkas', basename($data->ijazah_S1)) }}" target="_blank">
                                        {{ basename($data->ijazah_S1) }}
                                    </a></h6>
                                @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="file" class="control-label">Ijazah S2</label>
                                <input type="file" name="ijazah_S2" class="form-control mb-3" id="ijazah_S2" value="{{ $data->ijazah_S2 }}">
                                @if ($data->ijazah_S2)
                                    <h6>File saat ini: <a href="{{ route('lihat.berkas', basename($data->ijazah_S2)) }}" target="_blank">
                                        {{ basename($data->ijazah_S2) }}
                                    </a></h6>
                                @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="file" class="control-label">SK Pengangkatan Yayasan</label>
                                <input type="file" name="sk_yayasan" class="form-control mb-3" id="sk_yayasan" value="{{ $data->sk_yayasan }}">
                                @if ($data->sk_yayasan)
                                    <h6>File saat ini: <a href="{{ route('lihat.berkas', basename($data->sk_yayasan)) }}" target="_blank">
                                        {{ basename($data->sk_yayasan) }}
                                    </a></h6>
                                @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="file" class="control-label">SK Pengangkatan Kelapa Sekolah</label>
                                <input type="file" name="sk_kepsek" class="form-control mb-3" id="sk_kepsek" value="{{ $data->sk_kepsek }}">
                                @if ($data->sk_kepsek)
                                    <h6>File saat ini: <a href="{{ route('lihat.berkas', basename($data->sk_kepsek)) }}" target="_blank">
                                        {{ basename($data->sk_kepsek) }}
                                    </a></h6>
                                @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="file" class="control-label">Akte Kelahiran</label>
                                <input type="file" name="akte" class="form-control mb-3" id="akte" value="{{ $data->akte }}">
                                @if ($data->akte)
                                    <h6>File saat ini: <a href="{{ route('lihat.berkas', basename($data->akte)) }}" target="_blank">
                                        {{ basename($data->akte) }}
                                    </a></h6>
                                @endif
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="file" class="control-label">KK</label>
                                <input type="file" name="kk" class="form-control mb-3" id="kk" value="{{ $data->kk }}">
                                @if ($data->kk)
                                    <h6>File saat ini: <a href="{{ route('lihat.berkas', basename($data->kk)) }}" target="_blank">
                                        {{ basename($data->kk) }}
                                    </a></h6>
                                @endif
                            </div>
                                                        
                            <div class="modal-footer col-sm-12">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
      </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userDropdown = document.getElementById('nama');
        const nuptkInput = document.getElementById('nuptk');
        
        userDropdown.addEventListener('change', function() {
            const selectedOption = userDropdown.options[userDropdown.selectedIndex];
            nuptkInput.value = selectedOption.getAttribute('data-nuptk');
        });
    });
</script>

@endsection