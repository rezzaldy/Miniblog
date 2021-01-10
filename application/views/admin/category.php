<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="fas fa-fw fa-layer-group icon-gradient bg-mean-fruit">
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
						<form class="form-inline" method="POST" action="<?= base_url('administrator/category'); ?>">
							<div class="form-group mb-2">
								<input type="text" class="form-control" id="addcategory" placeholder="Add Category" name="category" required>
							</div>
							<button type="submit" class="btn btn-primary mb-2 ml-2" id="savecate"><i class="fas fa-plus-circle"></i></button>
						</form>
						<table class="table table-striped table-bordered data">
							<thead>
								<tr>
									<th style="text-align: center;">No</th>
									<th style="text-align: center;">Name</th>
									<th style="text-align: center;">Action </th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($category as $cat) : ?>
									<tr>
										<td style="text-align: center;"><?= $no; ?></td>
										<td style="text-align: center;"><?= $cat['nama']; ?></td>
										<td style="text-align: center;">
											<button type="button" data-toggle="modal" data-target="#edit<?= $cat['id'] ?>" class="btn btn-primary">
												Edit
											</button>
											<a href="<?= base_url('administrator/delete/') ?><?= $cat['id'] ?>" class="btn btn-danger button-delete">Delete</a>
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
	</div>

</div>
