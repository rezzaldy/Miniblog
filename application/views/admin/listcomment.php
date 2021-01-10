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
				<div class="main-card mb-3 card">
					<div class="card-header">List Comment
					</div>
					<div class="table-responsive" style="padding: 1em;">
						<table class="table table-striped table-bordered data">
							<thead>
								<tr>
									<th style="text-align: center;">No</th>
									<th style="text-align: center;">Nama</th>
									<th style="text-align: center;">Email</th>
									<th style="text-align: center;">Comment</th>
									<th style="text-align: center;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($comment as $cmnt) : ?>
									<tr>
										<td style="text-align: center;"><?= $no; ?></td>
										<td style="text-align: center;"><?= $cmnt['name']; ?></td>
										<td style="text-align: center;"><?= $cmnt['email']; ?></td>
										<td style="text-align: center;"><?= $cmnt['comment']; ?></td>
										<td style="text-align: center;">
											<a href="<?= base_url('administrator/deletecomment/'); ?><?= $cmnt['idcomment']; ?>" class="btn btn-danger delete-comment">Delete</a>
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
