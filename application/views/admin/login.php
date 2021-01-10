<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sign Up Form by Colorlib</title>

	<!-- Font Icon -->
	<link rel="stylesheet" href="<?= base_url('assets/admin/loginfonts/material-icon/css/material-design-iconic-font.min.css') ?>">

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
						<h2 class="form-title">Masuk</h2>
						<form id="sign_in" method="POST" action="<?= base_url('auth/process'); ?>" class="register-form" id="register-form">
							<div class="form-group">
								<label for="name"><i class="fas fa-user"></i></label>
								<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
							</div>
							<div class="form-group">
								<label for="email"><i class="fas fa-key"></i></label>
								<input type="password" class="form-control" name="password" placeholder="Password" required>
							</div>
							<div class="form-group form-button">
								<input type="submit" name="login" id="signup" class="form-submit" value="Login" />
							</div>
						</form>
					</div>
					<div class="signup-image">
						<figure><img src="<?= base_url('assets/admin/login/') ?>images/signup-image.jpg" alt="sing up image"></figure>
						<a href="<?= base_url('auth/registerview'); ?>" class="signup-image-link">Daftar</a>
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
