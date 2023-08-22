<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('assets/login2/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login2/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login2/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login2/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login2/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login2/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login2/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login2/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login2/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login2/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/login2/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/assets/dashboard-admin/img/foto.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					<img src="/assets/dashboard-admin/img/logo.png" width="40%" alt="">
				</span>
				<span class="login100-form-title p-b-41">
					ALIA ISLAMIC SCHOOL
				</span>

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
				
				<form class="login100-form validate-form p-b-33 p-t-5" action="{{ route('store.admin') }}" method="post" enctype="multipart/form-data">
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
								<span class="text-danger">* jika tidak ada maka isi dengan tanda (-)</span>
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
									<option value="admin">Admin</option>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="" class="control-label">Password</label>
								<input type="password" name="password" class="form-control" id="password" required>
							</div>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit">
							Register
						</button>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<a href="/">Login</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ asset('assets/logiin2/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/logiin2/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/logiin2/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('assets/logiin2/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/logiin2/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/logiin2/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('assets/logiin2/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/logiin2/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets/logiin2/js/main.js') }}"></script>

</body>
</html>