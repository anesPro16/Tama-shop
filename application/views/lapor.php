<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h3 class="tom tom-sar my-3">Form Komplain Produk</h3>
			<form action="<?= base_url('admin/kirim/lapor'); ?>"enctype="multipart/form-data" class="teks-gelap" method="POST">
				<div class="form-group col-md-5">
					<label for="nama">Nama Pembeli</label>
					<input type="hidden" class="form-control" id="id" value="<?= $user['id']; ?>" name="id_user">
					<input type="text" class="form-control" id="nama" value="<?= $user['nama']; ?>" name="nama" readonly>
				</div>
				<div class="form-group col-md-5">
					<label for="alamat">Alamat</label>
					<input type="text" class="form-control" id="alamat" value="<?= $user['alamat']; ?>" name="alamat" readonly>
				</div>
				<?php 
				date_default_timezone_set('Asia/Jakarta');
 ?>
					<input type="hidden" class="form-control" id="id" value="<?= $pesanan['id']; ?>" name="id">
					<div class="form-group col-md-5">
						<label for="nama_brg">Nama Produk</label>
						<input type="text" class="form-control" id="nama_brg" value="<?= $pesanan['nama_brg']; ?>" name="nama_brg" readonly>
					</div>
					
				<div class="form-group col-md-5">
					<div class="col-md-10">
						<input type="file" class="custom-file-input" id="foto" name="foto">
						<label for="foto" class="custom-file-label">Foto Kondisi Produk</label>
					</div>
				</div>

				<div class="form-group col-md-5">
					<label for="masalah">Masalah Pengiriman Produk</label>
					<select name="masalah" id="masalah" class="form-control">
						<option value="Barang Belum Tiba">Barang Belum Tiba</option>
						<option value="Barang Rusak">Barang Rusak</option>
						<option value="Salah Kirim Barang">Salah Kirim Barang</option>
					</select>
				</div>
				<div class="form-group col-md-7">
					<label for="no_hp">Silakan hubungi nomor ini, untuk informasi lebih detail</label>
					<input type="text" class="form-control" id="no_hp" value="0895-4112-67649" readonly>
				</div>
				<button type="submit" class="tom tom-buy mb-2 ml-2">Lapor</button>
			</form>

		</div>
		<div class="col-md-2"></div>
	</div>
</div>
