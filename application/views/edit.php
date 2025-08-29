<!-- awal page content -->
<div class="container-fluid">
	
	<!-- page heading -->
	<h1 class="tom tom-sar my-4"><?= $judul; ?></h1>

	<div class="row">
		<div class="col-lg-8 teks-gelap">
			<?= form_open_multipart('buyer/edit'); ?>
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Email :</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="email" id="email" value="<?= $user['email']; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for="nama" class="col-sm-2 col-form-label">Nama :</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" value="<?= $user['nama']; ?>" id="nama">
					<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-2">Foto Profil</div>
				<div class="col-sm-10">
					<div class="row">	
						<div class="col-sm-3">
							<img src="<?= base_url('assets/img/profile/') . $user['foto']; ?>" alt="<?= $user['nama']; ?>" class="img-thumbnail">
						</div>
						<div class="col-sm-9">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="foto" id="image" value="<?= $user['foto']; ?>" onchange="previewImg()">
								<label for="foto" class="custom-file-label">Pilih Gambar</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group row justify-content-end">
				<div class="col-sm-10">
					<button class="tom tom-buy" type="submit">Edit</button>
					<a href="<?= base_url('buyer/profil'); ?>" class="tom tom-gas">Kembali</a>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- akhir container-fluid -->
</div>
<!-- akhir main content -->
</div>
<script>
	function previewImg() {
		const image = document.querySelector('#image');
		const label = document.querySelector('.custom-file-label');
		const imgPreview = document.querySelector('.img-thumbnail');

		label.textContent = image.files[0].name;

		const fileImage = new FileReader();
		fileImage.readAsDataURL(image.files[0]);

		fileImage.onload = function(e) {
			imgPreview.src = e.target.result;
		}
	}
</script>