@extends('template')

@section('user')
<li class="nav-item active">
    <a class="nav-link" href="/akun">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Kelola Akun Guru</span>
    </a>
</li>
@endsection

@section('content')

<section class="content">
    <div class="sale_container">
        <div class="block-header">
            <h2>Edit akun guru</h2>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <form method="post" action="{{ route('akun.update', ['id' => $akun->id]) }}" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="control-label">Nama</label>
                                <input type="text" name="name" class="form-control" id="name"  value="{{ $akun->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">email</label>
                                <input class="form-control" name="email" id="email" value="{{ $akun->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">notel</label>
                                <input type="number" name="notel" class="form-control" id="notel"  value="{{ $akun->notel }}" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">level</label>
                                <select name="level" class="form-control" id="" value="{{ $akun->level }}">
                                    <option value="">Pilih Level</option>
                                    <option value="admin" @if ($akun->level == 'admin') selected @endif>Admin</option>
                                    <option value="audithor" @if ($akun->level == 'audithor') selected @endif>Audithor</option>
                                    <option value="spi" @if ($akun->level == 'spi') selected @endif>Kepala SPI</option>
                                    <option value="direc" @if ($akun->level == 'direc') selected @endif>Directur Utama</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">password</label>
                                <input type="password" name="password" class="form-control" id="password"  value="{{ $akun->password }}" required>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div> --}}
                        <div class="modal-body row g-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $akun->name }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">NUPTK</label>
                                    <input type="text" name="nuptk" class="form-control" id="nuptk" value="{{ $akun->nuptk }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Jenis kelamin</label>
                                    <select name="kelamin" class="form-control" id="" required>
                                        <option value="">Pilih Kelamin</option>
                                        <option value="pria" @if ($akun->kelamin == 'pria') selected @endif>pria</option>
                                        <option value="wanita" @if ($akun->kelamin == 'wanita') selected @endif>wanita</option>
                                    </select>
                                </div>
                            </div>                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Pilih Pendidikan terakhir</label>
                                    <select name="pdd_terakhir" class="form-control" id="" required>
                                        <option value="">Pendidikan terakhir</option>
                                        <option value="SMP" @if ($akun->pdd_terakhir == 'SMP') selected @endif>SMP</option>
                                        <option value="SMA" @if ($akun->pdd_terakhir == 'SMA') selected @endif>SMA</option>
                                        <option value="S1" @if ($akun->pdd_terakhir == 'S1') selected @endif>S1</option>
                                        <option value="S2" @if ($akun->pdd_terakhir == 'S2') selected @endif>S2</option>
                                        <option value="S3" @if ($akun->pdd_terakhir == 'S3') selected @endif>S3</option>
                                    </select>
                                </div>
                            </div>                                                       
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgk_lahir" id="tgk_lahir" value="{{ $akun->tgk_lahir }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ $akun->email }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">No Telpon</label>
                                    <input type="number" name="notel" class="form-control" id="notel" value="{{ $akun->notel }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control">{{ $akun->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Level</label>
                                    <select name="level" class="form-control" id="" value="{{ $akun->level }}" required>
                                        <option value="">Pilih Level</option>
                                        <option value="guru" @if ($akun->level == 'guru') selected @endif>Guru</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" value="{{ $akun->password }}" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
      </div>

</section>

    @endsection