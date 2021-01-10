<div class="hero-wrap js-fullheight" style="background-image: url('<?= base_url('assets/user/') ?>images/bg_1.1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
			<div class="col-md-7 ftco-animate">
				<span class="subheading">Selamat datang di BlogPedia</span>
				<h1 class="mb-4">Tempat dimana kalian dapat menyalurkan blog pribadimu kepada orang banyak</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section testimony-section">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Kategori Teratas</h2>
			</div>
		</div>
		<div class="row ftco-animate">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel">
					<?php foreach ($kategori as $cate) : ?>
						<?php $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF)); ?>
						<div class="col-md-3 col-lg-2">
							<a href="<?= base_url('user/categories/') ?><?= $cate['id']; ?>" class="course-category img d-flex align-items-center justify-content-center" style="background-color: <?= $color; ?>;">
								<div class="text w-100 text-center">
									<h3><?= $cate['nama']; ?></h3>
								</div>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Post Terkini</h2>
			</div>
		</div>
		<div class="row d-flex">
			<?php if (empty($threepost)) : ?>
				<div class="col-md-12">
					<div class="alert alert-warning" role="alert" style="text-align: center;">
						Mohon maaf postingan belum tersedia :(
					</div>
				</div>
			<?php else : ?>
				<?php foreach ($threepost as $tp) : ?>
					<div class="col-lg-4 ftco-animate card-post">
						<div class="blog-entry">
							<a href="content.html" class="block-20" style="
							<?php if ($tp['file_gambar'] != '') : ?>
							background-image: url('<?= base_url('assets/img/post/') ?><?= $tp['file_gambar'] ?>');
							<?php else : ?>
							background-image: url('<?= base_url('assets/user/') ?>post/default.png');
							<?php endif; ?>
							">
							</a>
							</a>
							<div class="text d-block">
								<div class="meta">
									<p>
										<a href="#"><span class="fa fa-calendar mr-2"></span><?= date('d', $tp['tgl_update']); ?> <?= date('F', $tp['tgl_update']); ?> <?= date('Y', $tp['tgl_update']); ?></a>
										<a href="#"><span class="fa fa-user mr-2"></span><?= $tp['username'] ?></a>
										<br>
										<a href="#"><span class="fa fa-eye mr-2"></span><?= $tp['read'] ?></a>
									</p>
								</div>
								<h3 class="heading"><a href="#"><?= $tp['judul']; ?></a></h3>
								<p><a href="<?= base_url('user/postcategory/') ?><?= $tp['idpost']; ?>" class="btn btn-secondary py-2 px-3" style="border-radius: 25px;">Selengkapnya</a></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
			<div class="col-md-12 text-center mt-5">
				<a href="<?= base_url('user/allpost') ?>" class="btn btn-secondary" style="border-radius: 24px;">Lihat Semua Postingan</a>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(<?= base_url('assets/user/') ?>images/bg_4.jpg);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				<div class="block-18 d-flex align-items-center">
					<div class="icon"><span class="flaticon-online"></span></div>
					<div class="text">
						<strong class="number" data-number="<?= $countuser; ?>">0</strong>
						<span>Penulis Terdaftar</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				<div class="block-18 d-flex align-items-center">
					<div class="icon"><span class="flaticon-instructor"></span></div>
					<div class="text">
						<strong class="number" data-number="<?= $countcategory; ?>">0</strong>
						<span>Daftar Kategori</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				<div class="block-18 d-flex align-items-center">
					<div class="icon"><span class="flaticon-tools"></span></div>
					<div class="text">
						<strong class="number" data-number="<?= $post; ?>">0</strong>
						<span>Jumlah Postingan</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section testimony-section bg-light">
	<div class="overlay" style="background-image: url(<?= base_url('assets/user/') ?>images/bg_2.jpg);"></div>
	<div class="container">
		<div class="row pb-4">
			<div class="col-md-7 heading-section ftco-animate">
				<h2 class="mb-4">Penulis Terfavorit</h2>
			</div>
		</div>
	</div>
	<div class="container container-2">
		<div class="row ftco-animate">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel">
					<?php foreach ($userfavorite as $user) : ?>
						<div class="card item" style="border: none; min-height: 350px;">
							<div class="card-body testimony-wrap py-4">
								<h5 class="card-title text">
									<p class="star">
										<?php if ($user['rating'] == 0) : ?>
											<span>Belum ada rating</span>
										<?php elseif ($user['rating'] >= 100) : ?>
											<span class="fa fa-star"> Direkomendasikan</span>
										<?php else : ?>
											<?= $user['rating'] ?> %
										<?php endif; ?>
									</p>
								</h5>
								<p class="card-text text"><?php if (empty($user['testimoni'])) : ?>
										<p class="mb-5">Belum ada testimoni</p><br>
									<?php else : ?>
										<p class="mb-4"><?= $user['testimoni']; ?></p>
									<?php endif; ?>
									<div class="d-flex align-items-center">
										<?php if (empty($user['ava'])) : ?>
											<div class="user-img" style="background-image: url(<?= base_url('assets/img/user/user.png') ?>)"></div>
										<?php else : ?>
											<div class="user-img" style="background-image: url(<?= base_url('assets/img/user/') ?><?= $user['ava']; ?>)"></div>
										<?php endif; ?>
										<div class="pl-3">
											<p class="name"><?= $user['username']; ?></p>
											<span class="position"><?= $user['role']; ?></span>
										</div>
									</div>
								</p>
								<div style="background-color: white; text-align: center;" class="mt-5">
									<a href="<?= base_url('user/penulis/'); ?><?= $user['iduser']; ?>" class="btn btn-primary" style="border-radius: 50px; margin: 0px auto;">Lihat profil</a>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section services-section">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-6 heading-section pr-md-5 ftco-animate d-flex align-items-center">
				<div class="w-100 mb-4 mb-md-0">
					<span class="subheading">Selamat datang di BlogPedia</span>
					<h2 class="mb-4">BlogPedia</h2>
					<p style="text-align: justify;">Blogpedia merupakan wadah bagi mereka yang ingin menyalurkan tulisannya, tetapi tidak tau wadah yang tepat untuk berbagi ke banyak orang. Disini kami memfasilitasi agar tulisan para penulis dapat dilihat dan dibaca oleh banyak orang, selain itu juga penulis dapat saling berkomentar untuk memberikan feedback bagi penulis lainnya</p>
				</div>
			</div>
		</div>
	</div>
</section>
