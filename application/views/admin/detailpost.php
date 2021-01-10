<div class="app-main__outer">
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="fas far fa-edit icon-gradient bg-mean-fruit">
						</i>
					</div>
					<div><?= $title; ?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="mb-3 card">
					<div class="card-header-tab card-header">
						<div class="card-header-title">
							<i class="header-icon lnr-bicycle icon-gradient bg-love-kiss"> </i>
							Detail Postingan
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-4 col-sm-12" style="margin: 0px auto;">
								<?php if ($detailpostingan['file_gambar'] != '') : ?>
									<img src="<?= base_url('assets/img/post/') ?><?= $detailpostingan['file_gambar'] ?>" class="img-fluid">
								<?php else : ?>
									<img src="<?= base_url('assets/img/post/default.png') ?>" class="img-fluid" class="img-fluid">
								<?php endif; ?>
							</div>
						</div>
						<div class="row mt-5" style="text-align: center;">
							<div class="col-md-6" style="margin: 0px auto;">
								<h2><?= $detailpostingan['judul']; ?></h2>
								<p><?= $detailpostingan['nama']; ?></p>
								<table style="margin: 0px auto;">
									<tr>
										<td style=" padding: 10px;">Tanggal Ditulis</td>
										<td style="padding: 10px;">Tanggal Update</td>
									</tr>
									<tr>
										<td style="padding: 10px;"><?= date('d', $detailpostingan['tgl_insert']); ?> <?= date('F', $detailpostingan['tgl_insert']); ?> <?= date('Y', $detailpostingan['tgl_insert']); ?></td>
										<td style="padding: 10px;"><?= date('d', $detailpostingan['tgl_update']); ?> <?= date('F', $detailpostingan['tgl_update']); ?> <?= date('Y', $detailpostingan['tgl_update']); ?></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12" style="text-align: justify;">
								<?= $detailpostingan['isi_post']; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

</div>
