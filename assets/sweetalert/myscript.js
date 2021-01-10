const FailedLogin = $('.flash-data').data('flashdata');

if (FailedLogin) {
	if (FailedLogin == 'salah') {
		Swal.fire({
			title: 'Gagal',
			text: 'Kombinasi username dan password salah',
			icon: 'error'
		});
	}
	if (FailedLogin == 'belum') {
		Swal.fire({
			title: 'Perhatian!!',
			text: 'Anda harus login telebih dahulu untuk masuk',
			icon: 'error'
		});
	}
	if (FailedLogin == 'failedregister') {
		Swal.fire({
			title: 'Perhatian!!',
			text: 'Register Gagal',
			icon: 'error'
		});
	}
	if (FailedLogin == 'suksesregister') {
		Swal.fire({
			title: 'Selamat, Register berhasil',
			text: 'Silahkan login dengan akun anda',
			icon: 'success'
		});
	}
	if (FailedLogin == 'category') {
		Swal.fire({
			title: 'Berhasil!',
			text: 'Category berhasil ditambahkan',
			icon: 'success'
		});
	}
	if (FailedLogin == 'categorydelete') {
		Swal.fire({
			title: 'Berhasil!',
			text: 'Category berhasil dihapus',
			icon: 'success'
		});
	}
	if (FailedLogin == 'reset') {
		Swal.fire({
			title: 'Berhasil!',
			text: 'Password berhasil direset silahkan download QR code dan berikan kepada user',
			icon: 'success'
		});
	}
	if (FailedLogin == 'insert') {
		Swal.fire({
			title: 'Berhasil!',
			text: 'Postingan berhasil ditambahkan',
			icon: 'success'
		});
	}
	if (FailedLogin == 'postdelete') {
		Swal.fire({
			title: 'Berhasil',
			text: 'Postingan berhasil dihapus',
			icon: 'success'
		});
	}
}

$('.button-reset').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Reset password user?',
		text: "Password akan di generate via QR code",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Reset password'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
$('.button-delete').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Hapus Kategori?',
		text: "",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Delete'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
$('.delete-post').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Hapus Postingan?',
		text: "",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Delete'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});


$('.delete-comment').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Hapus Komentar?',
		text: "",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Delete'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});


