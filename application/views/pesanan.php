<div class="container-fluid">
	<h3 class="tom tom-sar my-4"><?= $judul ?></h3>
	<table class="table table-bordered" align="center">
		<tr align="center">
			<th width="60">No.</th>
			<th>Waktu Pesan</th>
			<th>Batas Bayar</th>
			<th>Total Bayar</th>
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
				<td><?= $inv->tgl_pesan; ?></td>
				<td><?= $inv->batas_bayar; ?></td>
				<td>Rp<?= number_format($inv->total_bayar, 2, ',', '.'); ?></td>
				<?php if ($inv->konfirmasi == 'Belum Bayar'): ?>
					<td class="teks-mera"><?= $inv->konfirmasi; ?></td>
					<?php else: ?>
						<td class="teks-gelap teks-tebal"><?= $inv->konfirmasi; ?></td>
					<?php endif ?>
					<td><img src="<?=base_url('assets/img/bukti/') . $inv->gambar; ?>" alt="<?= $inv->gambar; ?>" width="100"></td>
					<td>
						<?= anchor('buyer/detailInv/'. $inv->id, '<button type="button" class="tom tom-gas">Detail</button>'); ?>
						<a href="<?= base_url('buyer/pesananPdf/' . $inv->id) ?>" class="tom tom-buy" target="_blank">Download Pdf</a>
					</td>
				</tr>

			<?php endforeach ?>
		</table>
	</div>