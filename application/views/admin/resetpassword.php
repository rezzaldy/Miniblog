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
					<div class="card-header">Active Users
					</div>
					<div class="table-responsive" style="padding: 1em;">
						<table class="table table-striped table-bordered data">
							<thead>
								<tr>
									<th style="text-align: center;">No</th>
									<th style="text-align: center;">Name</th>
									<th style="text-align: center;">Email</th>
									<th style="text-align: center;">Address</th>
									<th style="text-align: center;">Qr Code password</th>
									<th style="text-align: center;">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; ?>
								<?php foreach ($writers as $writer) : ?>
									<tr>
										<td style="text-align: center;"><?= $no; ?></td>
										<td style="text-align: center;"><?= $writer['username']; ?></td>
										<td style="text-align: center;"><?= $writer['email']; ?></td>
										<td style="text-align: center;"><?= $writer['alamat']; ?></td>
										<td>
											<?php
											$url = base_url('assets/img/newpass/');
											$name =  $writer['password'] . '.png';
											$qr = './assets/img/newpass/' . $writer['password'] . '.png';
											?>
											<?php if (file_exists($qr)) : ?>
												<img src="<?= base_url('assets/img/newpass/'); ?><?= $writer['password']; ?>.png" style="width: 250px;" class="img-fluid" data-toggle="modal" data-target=".bd-example-modal-lg-bukti">
											<?php else : ?>
												New password belum di generate
											<?php endif; ?>
										</td>
										<td style=" text-align: center;">
											<?php if (file_exists($qr)) : ?>
												<a href="<?= base_url('administrator/downloadQrCode/') ?><?= $writer['password'] ?>" class="btn btn-success" id="reset"><i class="fas fa-download"></i> QR</a>
											<?php endif; ?>
											<a href="<?= base_url('administrator/generatepassword/') ?><?= $writer['id'] ?>" class="btn btn-primary button-reset" id="reset">Generate New Password</a>
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
