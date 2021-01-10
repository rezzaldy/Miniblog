<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register</title>

	<!-- Font Icon -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/loginfonts/material-icon/css/material-design-iconic-font.min.css') ?>">
	<!-- Bootstrap -->

	<!-- Main css -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/login/css/style.css') ?>">
	<link href="<?= base_url('assets/fontawesome/css/all.min.css'); ?>" rel="stylesheet" />
</head>

<body>

	<div class="main">
		<!-- Sign up form -->
		<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
		<section class="signup" style="max-height: 250px;">
			<div class="container">
				<div class="signup-content">
					<div class="signup-form">
						<h2 class="form-title">Daftar</h2>
						<form id="sign_in" method="POST" action="<?= base_url('auth/register'); ?>" class="register-form" id="register-form">
							<span class="social-label"><?php echo form_error('username'); ?></span>
							<div class="form-group">
								<label for="name"><i class="fas fa-user"></i></label>
								<input type="text" class="form-control" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
							</div>
							<span class="social-label"><?php echo form_error('email'); ?></span>
							<div class="form-group">
								<label><i class="fas fa-at"></i></label>
								<input type="text" class="form-control" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
							</div>
							<span class="social-label"><?php echo form_error('telp'); ?></span>
							<div class="form-group">
								<label><i class="fas fa-phone-alt"></i></label>
								<input type="number" class="form-control" name="telp" placeholder="Nomor telepon" value="<?= set_value('telp'); ?>">
							</div>
							<span class="social-label"><?php echo form_error('address'); ?></span>
							<div class="form-group">
								<label><i class="fas fa-map-marked-alt"></i></label>
								<input type="text" class="form-control" name="address" placeholder="Alamat anda" value="<?= set_value('address'); ?>">
							</div>
							<span class="social-label"><?php echo form_error('city'); ?></span>
							<div class="form-group">
								<label><i class="fas fa-map-pin"></i></label>
								<input type="text" class="form-control" name="city" placeholder="Kota anda" value="<?= set_value('city'); ?>">
							</div>
							<span class="social-label"><?php echo form_error('password'); ?></span>
							<div class="form-group">
								<label><i class="fas fa-key"></i></label>
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<span class="social-label"><?php echo form_error('repassword'); ?></span>
							<div class="form-group">
								<label><i class="fas fa-key"></i></label>
								<input type="password" class="form-control" name="repassword" placeholder="Re-Password">
							</div>
							<div class="form-group form-button">
								<input type="submit" id="signup" class="form-submit" value="Register" />
							</div>
						</form>
					</div>
					<div class="signup-image">
						<figure><img src="<?= base_url('assets/admin/login/') ?>images/signup-image.jpg" alt="sing up image"></figure>
						<a href="<?= base_url('auth'); ?>" class="signup-image-link">Masuk</a>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- JS -->
	<script src="<?= base_url('assets/admin/login/vendor/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/admin/login/js/main.js') ?>"></script>
	<script src="<?= base_url('assets/sweetalert/sweetalert2.all.min.js'); ?>"></script>
	<script src="<?= base_url('assets/sweetalert/myscript.js'); ?>"></script>
</body>

</html>
