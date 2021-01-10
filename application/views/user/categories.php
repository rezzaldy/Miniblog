<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url('assets/user/') ?>images/bg_2.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('user'); ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span>Kategori <i class="fa fa-chevron-right"></i></span></p>
				<h1 class="mb-0 bread">Semua Kategori</h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<h3>Postingan terkait kategori</h3>
				<hr>
				<div class="row d-flex">
					<?php if (empty($post)) : ?>
						<div class="col-md-12">
							<div class="alert alert-warning" role="alert" style="text-align: center;">
								Mohon maaf postingan belum tersedia :(
							</div>
						</div>
						<img src="<?= base_url('assets/img/post/notfound.jpg'); ?>" class="img-fluid">
					<?php else : ?>
						<?php foreach ($post as $pt) : ?>
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
			<div class="col-lg-3">
				<div class="sidebar-box ftco-animate">
					<div class="categories">
						<h3>Kategori</h3>
						<div class="view">
							<?php foreach ($categories as $categori) : ?>
								<li><a href="<?= base_url('user/categories/') ?><?= $categori['id'] ?>"><?= $categori['nama']; ?></a></li>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
