<div class="container-fluid">
	<h3 class="tom tom-sar my-4"><?= $judul ?></h3>
	<table class="table pesan-kuning table-bordered">
		<tr align="center">
			<th>Nomor Resi</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Nama Barang</th>
			<th>Jumlah</th>
			<th>Status</th>
			<th>Action</th>
		</tr>

		<?php foreach ($invPes->result() as $key => $data): ?>

			<tr align="center">
				<td><?= $data->nomor_resi; ?></td>
				<td><?= $data->nama; ?></td>
				<td><?= $data->alamat; ?></td>
				<td><?= $data->nama_brg; ?></td>
				<td><?= $data->jumlah; ?></td>

				<?php if ($data->status == 'Gudang' || $data->status == 'Gagal'): ?>
				<td class="teks-mera teks-tebal"><?= $data->status; ?></td>
				<?php else: ?>
					<td class="teks-gelap teks-tebal"><?= $data->status; ?></td>
				<?php endif ?>

				<td>
					<a href="<?= base_url('admin/kirim/ubahSta/') . $data->id; ?>" class="tom tom-buy">Update</a>
				</td>
			</tr>

		<?php endforeach ?>
	</table>
</div>
