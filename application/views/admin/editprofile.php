<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="fas fa-fw fa-user-cog icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div><?= $title; ?>
					</div>
				</div>
			</div>
		</div>
		<?php if ($this->session->userdata('role') == 'admin') : ?>
			<?php $url = base_url('assets/img/newpass/');
			$name = $user['password'] . '.png';
			$qr = './assets/img/newpass/' . $user['password'] . '.png'; ?>
			<?php if (file_exists($qr)) : ?>
				<div class="row">
					<div class="col-md-12">
						<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
						<div class="main-card mb-3 card">
							<div class="card-header">Password baru
							</div>
							<p style="text-align: center;">Scan QR code dibawah ini untuk melihat password baru admin
								<br><small>Tekan/Klik pada QR code untuk memperbesar</small>
							</p>
							<div class="qr" style="margin: 0px auto; padding: 1em;">
								<img src="<?= base_url('assets/img/newpass/'); ?><?= $user['password']; ?>.png" style="width: 250px;" class="img-fluid" data-toggle="modal" data-target=".bd-example-modal-lg-bukti">
							</div>
							<div class="row mb-3">
								<a href="<?= base_url('administrator/downloadQrCode/') ?><?= $user['password'] ?>" class="btn btn-primary" id="reset" style="margin: 0px auto;">Download QR code</a>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<div class="row">
			<div class="col-md-12">
				<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
				<div class="mb-3 card">
					<div class="card-header-tab card-header">
						<div class="card-header-title">
							<i class="header-icon lnr-bicycle icon-gradient bg-love-kiss"> </i>
							Edit Profile
						</div>
						<ul class="nav">
							<li class="nav-item"><a data-toggle="tab" href="#tab-eg5-0" class="active nav-link">Foto Profile</a></li>
							<li class="nav-item"><a data-toggle="tab" href="#tab-eg5-1" class="nav-link">Data Pribadi</a></li>
							<?php if ($this->session->userdata('role') == 'admin') : ?>
								<li class="nav-item"><a data-toggle="tab" href="#tab-eg5-2" class="nav-link">Reset Password</a></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="card-body">
						<div class="tab-content">
							<div class="tab-pane active" id="tab-eg5-0" role="tabpanel">
								<?php if ($this->session->flashdata('flash') == 'successeditava') : ?>
									<div class="alert alert-success" role="alert">
										Selamat <b>foto profil anda</b> berhasil di edit :)
									</div>
								<?php elseif ($this->session->flashdata('flash') == 'successeditdata') : ?>
									<div class="alert alert-success" role="alert">
										Selamat <b>data pribadi anda</b> berhasil di edit :)
									</div>
								<?php endif; ?>
								<div class="col-md-3" style="margin: 0px auto;">
									<?php if ($user['ava'] == '') : ?>
										<img src="<?= base_url('assets/img/user/user.png') ?>" class="img-fluid" alt="Responsive image">
									<?php else : ?>
										<img src="<?= base_url('assets/img/user/') ?><?= $user['ava']; ?>" class="img-fluid" alt="Responsive image">
									<?php endif; ?>
								</div>
								<div class="col-md-5 mt-3" style="margin: 0px auto;">
									<?= form_open_multipart('administrator/editava', 'class="form-inline"'); ?>
									<div class="form-group mb-2">
										<input type="file" id="addcategory" name="image" required>
									</div>
									<button type="submit" class="btn btn-primary mb-2">Ganti</button>
									<?= form_close(); ?>
								</div>
							</div>
							<div class="tab-pane" id="tab-eg5-1" role="tabpanel">

								<form action="<?= base_url('administrator/editprofile') ?>" method="POST">
									<div class="form-row">
										<div class="col-md-6">
											<div class="position-relative form-group"><label for="exampleEmail11" class="">Username</label><input name="username" id="exampleEmail11" placeholder="Email" type="text" class="form-control" value="<?= $user['username'] ?>"></div>
										</div>
										<div class="col-md-6">
											<div class="position-relative form-group"><label for="examplePassword11" class="">Email</label>
												<input name="email" id="examplePassword11" placeholder="password placeholder" type="text" class="form-control" value="<?= $user['email'] ?>">
											</div>
										</div>
									</div>
									<div class="position-relative form-group">
										<label for="exampleAddress" class="">Address</label>
										<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"><?= $user['alamat'] ?></textarea>
									</div>
									<div class="form-row">
										<div class="col-md-6">
											<div class="position-relative form-group">
												<label for="exampleEmail11" class="">Kota</label>
												<input name="city" type="text" class="form-control" value="<?= $user['city'] ?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="position-relative form-group"><label for="examplePassword11" class="">Nomor Telepon</label>
												<input name="telp" type="number" class="form-control" value="<?= $user['telp'] ?>">
											</div>
										</div>
									</div>
									<!-- <div class="form-row">
						<div class="col-md-6">
							<div class="position-relative form-group"><label for="exampleCity" class="">Old Password</label><input name="city" id="exampleCity" type="text" class="form-control"></div>
						</div>
					</div> -->
									<button class="mt-2 btn btn-primary" type="submit">Update</button>
								</form>
							</div>
							<div class="tab-pane" id="tab-eg5-2" role="tabpanel">
								<div class="row">
									<div class="col-md-6" style="margin: 0px auto;">
										<p style="text-align: center;">Tekan tombol di bawah untuk mereset password
											<br><small>Password akan digenerate via QR code</small>
										</p>
									</div>
								</div>
								<div class="row">
									<a href="<?= base_url('administrator/generatepassword/') ?><?= $user['id'] ?>" class="btn btn-primary button-reset" id="reset" style="margin: 0px auto;">Generate New Password</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

</div>
<script>
	function ava() {
		var x = document.getElementById("photoprofile");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}

	function data() {
		var x = document.getElementById("dataprofile");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}
</script>
