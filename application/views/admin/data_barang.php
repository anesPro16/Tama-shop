<div class="container-fluid">
	<h2 class="tom tom-sar my-4"><?= $judul ?></h2>
	<button type="button" class="tom tom-buy mb-3 d-block" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Barang</button>
	
	<?= $this->session->flashdata('pesan'); ?>
	<?php if (validation_errors()) { ?>
    <div class="alert alert-danger py-0 col-lg-3" role="alert">
        <p class="pt-1"></p>
        <?= validation_errors(); ?>
    </div>
  <?php } ?>

	<table class="table table-bordered text-dark">
		<tr align="center">
			<th>No. </th>
			<th>Nama barang</th>
			<th>Keterangan </th>
			<th>Kategori </th>
			<th>Harga </th>
			<th>Stok </th>
			<th>Terjual</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php 
		$no = 1;
		$mulai = $start + 1;
		foreach ($barang as $brg): ?>
			<tr>
				<td align="center" width="20"><?= $mulai++; ?></td>
				<td><?= $brg['nama_brg']; ?></td>
				<td><?= $brg['keterangan']; ?></td>
				<td align="center"><?= $brg['kategori']; ?></td>
				<td align="center"><?= $brg['harga']; ?></td>
				<td align="center"><?= $brg['stok']; ?></td>
				<td align="center"><?= $brg['terjual']; ?></td>
				<td align="center"><?= anchor('admin/data_barang/edit/'. $brg['id_brg'], '<button type="button" onclick="del()" class="tom tom-kuning text-white border-0"><i class="fa fa-edit"></i></button>');  ?></td>
				
				<td align="center">
					<a href="<?= base_url('admin/data_barang/hapus/').$brg['id_brg'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $brg['nama_brg'];?> ?');" class="tom tom-nes">
						<i class="fas fa-trash text-white"></i>
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?= $this->pagination->create_links(); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title teks-gelap teks-tebal" id="exampleModalLabel">Form Tambah Data</h5>
				<button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/data_barang/tambah'); ?>" enctype="multipart/form-data" method="POST">
					<input type="hidden" name="kdMenu" id="kdMenu">
					<div class="form-group">
						<label for="nama">Nama Barang</label>
						<input type="text" class="form-control" id="nama_brg" value="<?= set_value('nama_brg'); ?>" name="nama_brg">
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<input type="text" class="form-control" id="keterangan" value="<?= set_value('keterangan'); ?>" name="keterangan">
					</div>
					<div class="form-group">
						<label for="kategori">Kategori</label>
						<select name="kategori" id="kategori" class="form-control">
							<option value="">Kategori</option>
							<?php foreach ($kategori as $k): ?>
								<option value="<?= $k; ?>" ><?= $k; ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input type="number" class="form-control" id="harga" value="<?= set_value('harga'); ?>" name="harga">
					</div>
					<div class="form-group">
						<label for="stok">Stok</label>
						<input type="number" class="form-control" id="stok" value="<?= set_value('stok'); ?>" name="stok">
					</div>
					<div class="form-group">
						<label for="inputMessage">Pilih Gambar</label>
						<input type="file" name="gambar" id="gambar">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="tom tom-sar">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>