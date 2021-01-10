<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="index.html"><span>Blog</span>Pedia</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a href="<?= base_url() ?>" class="nav-link">Beranda</a></li>
				<li class="nav-item"><a href="<?= base_url('user/contact') ?>" class="nav-link">Tim Produksi</a></li>
				<?php if (isset($user)) : ?>
					<li class="nav-item"><a href="<?= base_url('auth/logout') ?>" class="nav-link">Logout</a></li>
					<li class="nav-item"><a href="<?= base_url('administrator') ?>" class="nav-link">Administrator</a></li>
					<li class="nav-item">
						<a href="<?= base_url('administrator') ?>" class="nav-link">
							<?php if ($user['ava'] == '') : ?>
								<img width="42" height="42 class=" rounded-circle" src="<?= base_url('assets/img/user/user.png') ?>" alt="">
							<?php else : ?>
								<img width="42" height="42" class="rounded-circle" src="<?= base_url('assets/img/user/') ?><?= $user['ava']; ?>" alt="">
							<?php endif; ?>
						</a>
					</li>
				<?php else : ?>
					<li class="nav-item"><a href="<?= base_url('auth') ?>" class="nav-link">Masuk</a></li>
					<li class="nav-item"><a href="<?= base_url('auth/registerview') ?>" class="nav-link">Daftar</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>
<!-- END nav -->
