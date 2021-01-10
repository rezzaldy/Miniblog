<div class="app-main__outer">
	<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash') ?>"></div>
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
							Tulis Postingan
						</div>
					</div>
					<div class="card-body">
						<?= form_open_multipart('administrator/insertupdate'); ?>
						<div class="form-group infomartion">
							<input name="idpost" value="<?= $postingan['idpost'] ?>" hidden>
							<select class="custom-select" id="inputGroupSelect01" name="category">
								<option>Pilih kategori informasi</option>
								<option name='category' value="<?= $postingan['id'] ?>" selected><?= $postingan['nama'] ?></option>
								<?php foreach ($category as $cate) : ?>
									<option name="category" value="<?= $cate['id']; ?>"><?= $cate['nama'] ?></option>
								<?php endforeach; ?>
							</select>
							<small class="form-text text-danger"><?= form_error('category'); ?></small>
						</div>
						<div class="form-group infomartion">
							<input type="text" class="form-control" id="name" name="title" placeholder="Masukan Judul Informasi" value="<?= $postingan['judul']; ?>">
							<small class="form-text text-danger"><?= form_error('title'); ?></small>
						</div>
						<div class="form-group infomartion">
							<label>Informasi yang akan disampaikan</label>
							<textarea class="ckeditor" id="ckedtor" name="text"><?= $postingan['isi_post']; ?></textarea>
							<small class="form-text text-danger"><?= form_error('text'); ?></small>
						</div>
						<div class="form-group infomartion">
							<div class="custom-file">
								<input type="file" name="images">
							</div>
						</div>
						<div class="form-group infomartion">
							<input type="submit" value="Publikasikan informasi" class="btn btn-primary" style="border-radius: 20px;">
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

</div>
