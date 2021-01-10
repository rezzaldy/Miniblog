<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="fas fa-fw fa-edit icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div><?= $title; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
				<div class="main-card mb-3 card">
					<div class="card-header">List Category
					</div>
					<div class="table-responsive" style="padding: 1em;">
						<table class="table table-striped table-bordered data">
							<thead>
								<tr>
									<th style="text-align: center;">No</th>
									<th style="text-align: center;">Judul</th>
									<th style="text-align: center;">Kategori</th>
									<th style="text-align: center;">Tanggal Ditulis</th>
									<th style="text-align: center;">Tanggal Update</th>
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
										<td style="text-align: center;"><?= date('d', $post['tgl_insert']); ?> <?= date('F', $post['tgl_insert']); ?> <?= date('Y', $post['tgl_insert']); ?></td>
										<td style="text-align: center;"><?= date('d', $post['tgl_update']); ?> <?= date('F', $post['tgl_update']); ?> <?= date('Y', $post['tgl_update']); ?></td>
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
