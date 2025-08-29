<div class="container-fluid">
	<h3 class="tom tom-sar my-4 teks-besar"><?= $judul ?></h3>

	<div class="row mx-0">
		<a href="<?= base_url('admin/invoice/cetak_invoice') ?>" class="tom pesan-buy mb-3" target="_blank"><i class="fas fa-print"></i> Print</a>
		<a href="<?= base_url('admin/invoice/pdf_invoice') ?>" class="tom pesan-kuning mb-3 mx-2" target="_blank"><i class="far fa-file-pdf"></i> Download Pdf</a>
		<a href="<?= base_url('admin/invoice/excel_invoice') ?>" class="tom tom-gas mb-3" target="_blank"><i class="far fa-file-excel"></i> Export ke Excel</a>
	</div>

	<table class="table table-bordered">
		<tr align="center">
			<th width="50">No.</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Waktu Pesan</th>
			<th>Batas Bayar</th>
			<th>Waktu Bayar</th>
			<th>Konfirmasi</th>
			<th>Bukti Bayar</th>
			<th>Action</th>
		</tr>

		<?php 
		date_default_timezone_set('Asia/Jakarta');
		$i=1;
		foreach ($invoice as $inv): ?>
			<tr align="center">
				<td><?= $i++; ?></td>
				<td><?= $inv['nama']; ?></td>
				<td><?= $inv['alamat']; ?></td>
				<td><?= $inv['tgl_pesan']; ?></td>
				<td><?= $inv['batas_bayar']; ?></td>
				<?php if ($inv['waktu_bayar'] == 0): ?>
					<td>00-00-0000 00:00</td>
				<?php else: ?>
					<td><?= date('d-m-Y H:i', $inv['waktu_bayar']) ?></td>
				<?php endif ?>
				<?php if ($inv['konfirmasi'] == 'Belum Bayar'): ?>
					<td class="teks-mera"><?= $inv['konfirmasi']; ?></td>
					<?php else: ?>
						<td class="teks-gelap teks-tebal"><?= $inv['konfirmasi']; ?></td>
					<?php endif ?>
					<td><img src="<?=base_url('assets/img/bukti/') . $inv['gambar']; ?>" alt="<?= $inv['gambar']; ?>" width="80"></td>
					<td>
						<?= anchor('admin/invoice/detail/'. $inv['id'], '<button type="button" class="tom tom-buy">Detail</button>'); ?>
					</td>
				</tr>

			<?php endforeach ?>
		</table>
	</div>