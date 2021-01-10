</div>
</div>
<div class="app-wrapper-footer">
	<div class="app-footer">
		<div class="app-footer__inner">
			<div class="app-footer-right">
				<ul class="nav">
					<li class="nav-item">
						<a href="javascript:void(0);" class="nav-link">
							Copyright | BlogPedia
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/datatable/datatables.min.js') ?>/assets/scripts/main.js"></script>
<script type="text/javascript" src="<?= base_url('assets/datatable/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/datatable/js/dataTables.bootstrap4.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/popper.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url(); ?>assets/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/sweetalert/myscript.js"></script>
<script type="text/javascript" src="<?= base_url('assets/admin/assets/scripts/main.js') ?>"></script>
<script src="<?= base_url('assets'); ?>/ckeditor/ckeditor.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$('.data').DataTable();
	});
</script>
</body>

</html>
<?php if (isset($category)) : ?>
	<?php foreach ($category as $cat) : ?>
		<div class="modal fade" id="edit<?= $cat['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST" action="<?= base_url('administrator/category'); ?>">
							<input type="text" name="idcategory" value="<?= $cat['id']; ?>" hidden>
							<div class="form-group">
								<label for="recipient-name" class="col-form-label">Category Name</label>
								<input type="text" name="editcategory" class="form-control" id="recipient-name" placeholder="<?=
																																	$cat['nama']; ?>">
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>
<?php if (isset($testimoni)) : ?>
	<div class="modal fade" id="edit<?= $testimoni['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit testimoni</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url('administrator/testimoni'); ?>">
						<div class="form-group">
							<label>Berikan testimoni dan bagikan kepada pembaca anda</label>
							<textarea class="form-control" maxlength="65" minlength="47" name="testimoniedit" required><?= $testimoni['testimoni']; ?></textarea>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
				</form>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if (isset($writers)) : ?>
	<?php foreach ($writers as $writer) : ?>
		<div class="modal fade bd-example-modal-lg-bukti" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<img src="<?= base_url('assets/img/newpass/'); ?><?= $writer['password']; ?>.png" class="img-fluid">
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>
<?php if (isset($user)) : ?>
	<div class="modal fade bd-example-modal-lg-bukti" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<img src="<?= base_url('assets/img/newpass/'); ?><?= $user['password']; ?>.png" class="img-fluid">
			</div>
		</div>
	</div>
<?php endif; ?>
