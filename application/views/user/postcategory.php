<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url('assets/user/') ?>images/bg_2.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-end justify-content-center">
			<div class="col-md-9 ftco-animate pb-5 text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('user') ?>">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="<?= base_url('/user/categories/') ?><?= $postcategory['id']; ?>">Kategori <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="<?= base_url('/user/categories/') ?><?= $postcategory['id']; ?>"><?= $postcategory['nama']; ?> <i class="fa fa-chevron-right"></i></a></span> <span>Post <i class="fa fa-chevron-right"></i></span></p>
				<h1 class="mb-0 bread"><?= $postcategory['judul']; ?></h1>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 ftco-animate py-md-5 mt-md-5 content-posting">
				<h2 class="mb-3"><?= $postcategory['judul']; ?></h2>
				<hr>
				<p>
					<img src="<?= base_url('assets/img/post/'); ?><?= $postcategory['file_gambar'] ?>" alt="" class="img-fluid">
				</p>
				<div class="text-post" style="text-align: justify;">
					<?= $postcategory['isi_post']; ?>
				</div>
				<hr>
				<div class="pt-2 mt-2">
					<h3 class="mb-3" style="font-size: 20px; font-weight: bold;">Penulis</h3>
					<div class="about-author d-flex p-4 bg-light">
						<div class="bio mr-5">
							<?php if ($postcategory['ava'] != '') : ?>
								<img src="<?= base_url('assets/img/user/') ?><?= $postcategory['ava'] ?>" alt="Image placeholder" class="img-fluid mb-4">
							<?php else : ?>
								<img src="<?= base_url('assets/img/user/user.png') ?>" alt="Image placeholder" class="img-fluid mb-4">
							<?php endif; ?>
						</div>
						<div class="desc">
							<h3><?= $postcategory['username']; ?></h3>
							<table>
								<tr>
									<td><?= $postcategory['alamat']; ?></td>
								</tr>
								<tr>
									<td><?= $postcategory['email']; ?></td>
								</tr>
								<tr>
									<td>
										<br>
									</td>
								</tr>
								<tr>
									<td>
										<label>Beri rating untuk penulis</label>
										<form method="POST" action="<?= base_url('user/addrating/'); ?>">
											<input type="password" value="<?= $postcategory['idpenulis']; ?>" hidden name="idpenulis">
											<div class="form-inline">
												<div class="rating">
													<i class="fa fa-star fa-2x" data-index='0'></i>
													<i class="fa fa-star fa-2x" data-index='1'></i>
													<i class="fa fa-star fa-2x" data-index='2'></i>
													<i class="fa fa-star fa-2x" data-index='3'></i>
													<i class="fa fa-star fa-2x" data-index='4'></i>
													<input type="hidden" id="rating" style="border: none;" name="rating">
												</div>
												<div class="form-group ml-5">
													<button type="submit" id="butsave" class="btn  btn-primary" style="width: 100%;">Beri rating</button>
												</div>
											</div>
										</form>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<hr>
				<div class="pt-2 mt-2">
					<h3 class="mb-3" style="font-size: 20px; font-weight: bold;">Komentar</h3>
					<?php if (empty($comments)) : ?>
						<div class="alert alert-warning" role="alert">
							Belum ada komentar
						</div>
					<?php else : ?>
						<ul class="comment-list">
							<?php foreach ($comments as $comment) : ?>
								<li class="comment">
									<div class="vcard bio">
										<img src="<?= base_url('assets/img/user/user.png') ?>" alt="Image placeholder" class="img-fluid mb-4">
									</div>
									<div class="comment-body">
										<div class="row">
											<div class="col-md-6">
												<h3><?= $comment['name'] ?></h3>
											</div>
										</div>
										<div><?= $comment['email'] ?></div>
										<p><?= $comment['comment']; ?></p>
										<p><?= date('d', $comment['tgl_update']);; ?> <?= date('F', $comment['tgl_update']) ?><?= date('Y', $comment['tgl_update']) ?></p>
										<hr>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<!-- END comment-list -->
					<hr>
					<div class="comment-form-wrap pt-2">
						<h3 class="mb-3" style="font-size: 20px; font-weight: bold;">Tambahkan komentar</h3>
						<div id="success"></div>
						<form method="POST" action="<?= base_url('user/comment/'); ?><?= $postcategory['idpost']; ?>">
							<div class="p-5 bg-light form-komen">
								<div class="form-group">
									<label for="name">Name *</label>
									<input type="text" class="form-control input-form-komen" id="name" value="<?php if ($this->session->userdata('id')) echo $user['username']; ?>" name="name" required <?php if ($this->session->userdata('id')) echo 'readonly' ?>>
								</div>
								<div class="form-group">
									<label for="email">Email *</label>
									<input type="email" class="form-control input-form-komen" value="<?php if ($this->session->userdata('id')) echo $user['email']; ?>" id="email" name="email" required <?php if ($this->session->userdata('id')) echo 'readonly' ?>>
								</div>
								<div class="form-group">
									<label for="message">Message</label>
									<textarea id="comment" name="comment" cols="10" rows="5" class="form-control input-form-komen" required></textarea>
								</div>
								<div class="form-group">
									<button type="submit" id="butsave" class="btn py-3 px-4 btn-primary btn-post-komen">Kirim Komentar</button>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div> <!-- .col-md-8 -->
			<div class="col-lg-4 sidebar ftco-animate pl-md-4 py-md-5 mt-5">
				<div class="sidebar-box ftco-animate">
					<h3>Postingan Teratas</h3>
					<?php foreach ($threepost as $tp) : ?>
						<div class="block-21 mb-4 d-flex">
							<a href="<?= base_url('user/postcategory/') ?><?= $tp['idpost'] ?>" class="blog-img mr-4" style="background-image: url(<?= base_url('assets/img/post/') ?><?= $tp['file_gambar']; ?>);"></a>
							<div class="text">
								<h3 class="heading"><a href="<?= base_url('user/postcategory/') ?><?= $tp['idpost'] ?>"><?= $tp['judul']; ?></a></h3>
								<div class="meta">
									<div><a href="<?= base_url('user/postcategory/') ?><?= $tp['idpost'] ?>"><span class="fa fa-calendar"></span> <?= date('d', $tp['tgl_update']); ?> <?= date('F', $tp['tgl_update']); ?> <?= date('Y', $tp['tgl_update']); ?></a></div>
									<div><a href="<?= base_url('user/postcategory/') ?><?= $tp['idpost'] ?>"><span class="fa fa-user"></span><?= $tp['username']; ?></a></div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="sidebar-box ftco-animate">
					<h3>Kategori</h3>
					<div class="tagcloud">
						<?php foreach ($categories as $cate) : ?>
							<a href="<?= base_url('user/categories/') ?><?= $cate['id'] ?>" class="tag-cloud-link"><?= $cate['nama'] ?></a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</section> <!-- .section -->
<script>
	var ratedIndex = -1,
		uID = 1;

	$(document).ready(function() {
		resetStarColors();

		if (localStorage.getItem('ratedIndex') != null) {
			setStars(parseInt(localStorage.getItem('ratedIndex')));
			uID = localStorage.getItem('uID');
		}

		$('.fa-star').on('click', function() {
			ratedIndex = parseInt($(this).data('index'));
			$('#rating').val(ratedIndex + 1);
		});

		$('.fa-star').mouseover(function() {
			resetStarColors();
			var currentIndex = parseInt($(this).data('index'));
			setStars(currentIndex);
		});

		$('.fa-star').mouseleave(function() {
			resetStarColors();
			if (ratedIndex != -1)
				setStars(ratedIndex);
		});
	});

	function setStars(max) {
		for (var i = 0; i <= max; i++)
			$('.fa-star:eq(' + i + ')').css('color', 'yellow');
	}

	function resetStarColors() {
		$('.fa-star').css('color', 'grey');
	}
</script>
