<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="fas fa-fw fa-tachometer-alt icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div><?= $title; ?>
					</div>
				</div>
			</div>
		</div>
		<?php if ($this->session->userdata('role') == 'admin') : ?>
			<div class="row">
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content bg-midnight-bloom">
						<div class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<div class="widget-heading">Total Penulis</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-white"><span><?= $countuser; ?></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content bg-arielle-smile">
						<div class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<div class="widget-heading">Total Postingan</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-white"><span><?= $countpost; ?></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content bg-grow-early">
						<div class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<div class="widget-heading">Total Kategori</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-white"><span><?= $countcategory; ?></span></div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header">Rekap postingan /kategori
						</div>
						<div class="table-responsive" style="padding: 1em;">
							<table class="table table-striped table-bordered data">
								<thead>
									<tr>
										<th style="text-align: center;">No</th>
										<th style="text-align: center;">Nama Kategori</th>
										<th style="text-align: center;">Jumlah postingan</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($countpostbykategori as $countcategory) : ?>
										<tr>
											<td style="text-align: center;"><?= $no; ?></td>
											<td style="text-align: center;"><?= $countcategory->kategori; ?></td>
											<td style="text-align: center;"><?= $countcategory->count; ?></td>
										</tr>
										<?php $no++; ?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		<?php elseif ($this->session->userdata('role') == "penulis") : ?>
			<div class="row">
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content bg-midnight-bloom">
						<div class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<div class="widget-heading">Total Pembaca</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-white"><span><?= $read ?></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content bg-arielle-smile">
						<div class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<div class="widget-heading">Total Tulisan</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-white"><span><?= $postuser; ?></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content bg-grow-early">
						<div class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<div class="widget-heading">Total Komen</div>
							</div>
							<div class="widget-content-right">
								<div class="widget-numbers text-white"><span><?= $countcomment ?></span></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
					<div class="main-card mb-3 card">
						<div class="card-header">List Postingan
						</div>
						<div class="table-responsive" style="padding: 1em;">
							<table class="table table-striped table-bordered data">
								<thead>
									<tr>
										<th style="text-align: center;">No</th>
										<th style="text-align: center;">Judul</th>
										<th style="text-align: center;">Kategori</th>
										<th style="text-align: center;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($posting as $post) : ?>
										<tr>
											<td style="text-align: center;"><?= $no; ?></td>
											<td style="text-align: center;"><?= $post['judul']; ?></td>
											<td style="text-align: center;"><?= $post['nama']; ?></td>
											<td style="text-align: center;">
												<a href="<?= base_url('administrator/vieweditpost/') ?><?= $post['idpost'] ?>" class="btn btn-success">Edit</a>
												<a href="<?= base_url('administrator/detail/') ?><?= $post['idpost'] ?>" class="btn btn-primary">Detail</a>
												<a href="<?= base_url('administrator/deletepost/') ?><?= $post['idpost'] ?>" class="btn btn-danger delete-post">Delete</a>
											</td>
										</tr>
										<?php $no++; ?>
									<?php endforeach; ?>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-md-12 col-lg-6">
				<div class="mb-3 card">

				</div>
			</div>
			<div class="col-md-12 col-lg-6">
				<div class="mb-3 card">


				</div>
			</div>
		</div>
		<div class="row">


		</div>
		<div class="row">
			<div class="col-md-12">

			</div>
		</div>
		<div class="row">

		</div>
	</div>
