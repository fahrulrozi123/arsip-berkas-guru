@extends('template')

@section('upload')
<li class="nav-item active">
    <a class="nav-link" href="/upload-berkas">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Upload Berkas</span>
    </a>
</li>
@endsection

@section('content')

<section class="content">
    <div class="sale_container">
        <div class="block-header">
            <h2>Tambah Berkas Guru</h2>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <form method="post" action="{{ route('upload.store') }}" enctype="multipart/form-data">
                      @csrf
                        <div class="modal-body row g-12">
                            <div class="form-group col-sm-6">
                                <label for="nama" class="control-label">Pilih Nama Anda</label>
                                <select name="nama" class="form-control" id="nama" required>
                                    <option value="">Pilih Nama Anda</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" data-nuptk="{{ $user->nuptk }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="nuptk" class="control-label">NUPTK</label>
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <input type="text" name="nuptk" class="form-control" id="nuptk" readonly required>
                            </div>
                                       
                            <div class="form-group col-sm-6">
                                <label for="" class="control-label">KTP</label>
                                <input type="file" name="ktp" class="form-control" id="ktp" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="control-label">Ijazah SD</label>
                                <input type="file" name="ijazah_SD" class="form-control" id="ijazah_SD" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="control-label">Ijazah SMP</label>
                                <input type="file" name="ijazah_SMP" class="form-control" id="ijazah_SMP" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="control-label">Ijazah SMA</label>
                                <input type="file" name="ijazah_SMA" class="form-control" id="ijazah_SMA" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="control-label">Ijazah S1</label>
                                <input type="file" name="ijazah_S1" class="form-control" id="ijazah_S1" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="control-label">Ijazah S2</label>
                                <input type="file" name="ijazah_S2" class="form-control" id="ijazah_S2" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="control-label">SK Pengangkatan Yayasan</label>
                                <input type="file" name="sk_yayasan" class="form-control" id="sk_yayasan" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="control-label">SK Pengangkatan Kepala Sekolah</label>
                                <input type="file" name="sk_kepsek" class="form-control" id="sk_kepsek" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="control-label">Akte Kelahiran</label>
                                <input type="file" name="akte" class="form-control" id="akte" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="control-label">Kartu Keluarga</label>
                                <input type="file" name="kk" class="form-control" id="kk" required>
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