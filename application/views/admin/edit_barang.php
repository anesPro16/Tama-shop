<div class="container-fluid">
	<h3 class="tom tom-sar my-4"> Update Data</h3>
	<?php foreach ($barang as $brg): ?>
		<form action="<?= base_url('admin/data_barang/edit/' . $brg->id_brg); ?>" class="teks-gelap" enctype="multipart/form-data" method="POST">
			<input type="hidden" name="id_brg" value="<?= $brg->id_brg; ?>" id="id_brg">
			<div class="form-group col-md-4">
				<label for="nama">Nama Barang</label>
				<input type="text" class="form-control" id="nama_brg" name="nama_brg"  value="<?= $brg->nama_brg; ?>">
				<?= form_error('nama_brg', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<div class="form-group col-md-8">
				<label for="keterangan">Keterangan</label>
				<input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $brg->keterangan; ?>">
			</div>
			<div class="form-group col-lg-3 col-md-5">
				<label for="kategori">Kategori</label>
				<select name="kategori" id="kategori" value="<?= $brg->kategori; ?>" class="form-control">
					<?php foreach ($kategori as $k): ?>
						<?php if ($brg->kategori == $k): ?>
							<option value="<?= $k; ?>" selected><?= $k; ?></option>
							<?php else: ?>
								<option value="<?= $k; ?>" ><?= $k; ?></option>
							<?php endif ?>
						<?php endforeach ?>
					</select>
			</div>
			<div class="form-group col-md-3">
				<label for="harga">Harga</label>
				<input type="number" class="form-control" id="harga" name="harga" value="<?= $brg->harga; ?>">
				<?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<div class="form-group col-md-2">
				<label for="stok">Stok</label>
				<input type="number" class="form-control" id="stok" name="stok" value="<?= $brg->stok; ?>">
				<?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
			</div>
			<div class="form-group col-md-12">
				<input type="file" class="col-lg-3 col-md-5" name="gambar" id="gambar" onchange="previewImg()">
				<img src="<?= base_url('assets/img/upload/') . $brg->gambar; ?>" class="imgthumbnail mx-0" alt="" width=150>
				<button type="submit" class="tom tom-buy mt-3">Simpan</button>
				<a href="<?= base_url('admin/data_barang') ?>" class="tom tom-gas mt-3 mx-2">Kembali</a>
			</div>

		</form>
	<?php endforeach ?>
</div>

<script>
	function previewImg() {
		const image = document.querySelector('#gambar');
		const imgPreview = document.querySelector('.imgthumbnail');

		const fileImage = new FileReader();
		fileImage.readAsDataURL(image.files[0]);

		fileImage.onload = function(e) {
			imgPreview.src = e.target.result;
		}
	}
</script>