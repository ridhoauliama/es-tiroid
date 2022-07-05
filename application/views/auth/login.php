<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $judul; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?= base_url('assets'); ?>/img/logo-1.png">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/auth/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/auth/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/auth/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/auth/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/auth/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/auth/css/main.css">
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic">
					<img src="<?= base_url('assets') ?>/auth/images/1.png" alt="IMG">
				</div>
				<form method="post" action="<?= base_url('auth'); ?>" class="login100-form validate-form">
					<span class="login100-form-title">
						LOGIN Admin
					</span>
					<?= $this->session->flashdata('pesan'); ?>
					<?= form_error('username'); ?>
					<div class="wrap-input100">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<?= form_error('password'); ?>
					<div class="wrap-input100">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Masuk
						</button>
					</div>

					<!-- <div class="text-center p-t-12">
            <span class="txt1">
              Lupa akun?
            </span>
            <a class="txt2 change_link" href="<?= base_url('auth/lupa_password') ?>">
              Reset Password
            </a>
          </div> -->

					<div class="text-center p-t-70">
						<a class="txt2 change_link" href="<?= base_url('home'); ?>">
							<i class="fa fa-home m-l-5" aria-hidden="true"></i>
							Halaman Utama
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="<?= base_url('assets') ?>/auth/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url('assets') ?>/auth/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url('assets') ?>/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets') ?>/auth/vendor/select2/select2.min.js"></script>
	<script src="<?= base_url('assets') ?>/auth/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="<?= base_url('assets') ?>/auth/js/main.js"></script>

</body>

</html>
