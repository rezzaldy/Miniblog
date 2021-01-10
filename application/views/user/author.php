<?php foreach ($userprofile as $up) : ?>
	<section class="hero-wrap hero-wrap-2" style="background-image: url(<?= base_url('assets/img/user/bg_2.jpg') ?>);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate pb-5 text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url(); ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="">Penulis <i class="fa fa-chevron-right"></i></a></span>
						<h1 class="mb-0 bread">Penulis Favorit</h1>
				</div>
			</div>
		</div>
	</section>
<?php endforeach; ?>

<section class="ftco-section bg-light">
	<div class="container">
		<?php foreach ($userprofile as $up) : ?>
			<div class="row">
				<div class="col-md-4 ftco-animate d-flex align-items-center align-items-stretch">
					<div class="staff w-100">
						<div class="img-wrap d-flex align-items-stretch">
							<?php if (empty($up['ava'])) : ?>
								<div class="img align-self-stretch d-flex align-items-end" style="background-image: url(<?= base_url('assets/img/user/user_1.png') ?>);">
								<?php else : ?>
									<div class="img align-self-stretch d-flex align-items-end" style="background-image: url(<?= base_url('assets/img/user/') ?><?= $up['ava']; ?>);">
									<?php endif; ?>
									<div class="text mb-9 text-md-center">
										<h3><?= $up['username']; ?></h3>
									</div>
									</div>
								</div>
						</div>
					</div>
					<div class="col-md-8 d-flex align-items-center">
						<div class="staff-detail w-100 pl-md-5">
							<h3>Tentang Penulis</h3>
							<hr>
							<table>
								<tr>
									<th>Nama</th>
									<td>:</td>
									<td><?= $up['username']; ?></td>
								</tr>
								<tr>
									<th>Email</th>
									<td>:</td>
									<td><?= $up['email']; ?></td>
								</tr>
								<tr>
									<th>Nomor telefon</th>
									<td>:</td>
									<td><?= $up['telp']; ?></td>
								</tr>
								<tr>
									<th>Kota</th>
									<td>:</td>
									<td><?= $up['city']; ?></td>
								</tr>
								<tr>
									<th>Alamat</th>
									<td>:</td>
									<td><?= $up['alamat']; ?></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
	</div>
</section>

<section class="ftco-section bg-light ftco-no-pt">
	<div class="container">
		<div class="row pb-4">
			<div class="col-md-12 heading-section ftco-animate">
				<h2 class="mb-4">Post Terkini <?= $up['username']; ?></h2>
			</div>
		<?php endforeach; ?>
		</div>
		<div class="row d-flex">
			<?php if (empty($authorpost)) : ?>
				<div class="col-md-12">
					<div class="alert alert-warning" role="alert" style="text-align: center;">
						Mohon maaf postingan belum tersedia :(
					</div>
				</div>
				<img src="<?= base_url('assets/img/post/notfound.jpg'); ?>" class="img-fluid">
			<?php else : ?>
				<?php foreach ($authorpost as $pt) : ?>
					<div class="col-lg-4 ftco-animate card-post mt-4">
						<div class="blog-entry">
							<a href="content.html" class="block-20" style="
								<?php if ($pt['file_gambar'] != '') : ?>
								background-image: url('<?= base_url('assets/img/post/') ?><?= $pt['file_gambar'] ?>');
								<?php else : ?>
								background-image: url('<?= base_url('assets/user/') ?>post/default.png');
								<?php endif; ?>
								">
							</a>
							<div class="text d-block">
								<div class="meta">
									<p>
										<a href="#"><span class="fa fa-calendar mr-2"></span><?= date('d', $pt['tgl_update']); ?> <?= date('F', $pt['tgl_update']); ?> <?= date('Y', $pt['tgl_update']); ?></a>
										<a href="#"><span class="fa fa-user mr-2"></span><?= $pt['username'] ?></a>
										<br>
										<a href="#"><span class="fa fa-eye mr-2"></span><?= $pt['read'] ?></a>
									</p>
								</div>
								<h3 class="heading"><a href="#"><?= $pt['judul']; ?></a></h3>
								<p><a href="<?= base_url('user/postcategory/'); ?><?= $pt['idpost']; ?>" class="btn btn-secondary py-2 px-3" style="border-radius: 25px;">Selengkapnya</a></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
