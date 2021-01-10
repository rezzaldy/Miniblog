<div class="app-main__outer">
	<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
	<div class="app-main__inner">
		<div class="app-page-title">
			<div class="page-title-wrapper">
				<div class="page-title-heading">
					<div class="page-title-icon">
						<i class="fas far fa-hand-holding-heart icon-gradient bg-mean-fruit">
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
							Testimoni anda
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<?php if ($testimoni['testimoni'] == '') : ?>
								<div class="col-md-12 col-sm-12" style="margin: 0px auto;">
									Belum ada testimoni, silahkan berikan testimoni dan bagikan ke teman-teman anda
								</div>
							<?php else : ?>
								<div class="col-md-12 col-sm-12" style="margin: 0px auto;">
									<?= $testimoni['testimoni']; ?>
								</div>
							<?php endif ?>
						</div>
						<div class="form-group">
							<button type="button" data-toggle="modal" data-target="#edit<?= $testimoni['id'] ?>" class="btn btn-primary" style="border-radius: 50px;">
								Edit testimoni anda
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

</div>
