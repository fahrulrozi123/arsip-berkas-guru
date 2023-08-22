@extends('template')

@section('user')
<li class="nav-item active">
    <a class="nav-link" href="/akun">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        <span>Kelola Akun Guru</span>
    </a>
</li>
@endsection

@section('content')

<section class="content">
    <div class="sale_container">
        <div class="block-header">
            <h2>Tambah Akun Guru</h2>
        </div>
    </div>

    @if ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif
    @if ($errors->has('notel'))
        <div class="alert alert-danger">
            {{ $errors->first('notel') }}
        </div>
    @endif

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <form method="post" action="{{ route('akun.store') }}" enctype="multipart/form-data">
                      @csrf
                        <div class="modal-body row g-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">NUPTK</label>
                                    <input type="text" name="nuptk" class="form-control" id="nuptk" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Jenis kelamin</label>
                                    <select name="kelamin" class="form-control" id="" required>
                                        <option value="">Pilih Kelamin</option>
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Pendidikan Terakhir</label>
                                    <select name="pdd_terakhir" class="form-control" id="" required>
                                        <option value="">Pilih Pendidikian Terakhir</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgk_lahir" id="tgk_lahir" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">No Telpon</label>
                                    <input type="number" name="notel" class="form-control" id="notel" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Level</label>
                                    <select name="level" class="form-control" id="" required>
                                        <option value="">Pilih Level</option>
                                        <option value="guru">Guru</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
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