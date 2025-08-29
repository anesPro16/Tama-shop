<title><?= $user['nama'] ?> </title>
<style>
	body {font-family: sans-serif;}
	tr:nth-child(even){
		background-color: #fff;
	}
	tr:nth-child(odd) {
		background-color: #ccc;
	}
	.teks-tebal{font-weight: bold}
	.satu{background-color: #ccc;}
	.table-data {
		width: 100%;
		border-collapse: collapse;
		margin-bottom: 1em;
	}
	.table-data tr th,
	.table-data tr td{
		border: 1px solid #e3e6f0;
		font-size: 11pt;
		padding: 10px 10px 10px 10px;
	}
	.teks-gelap{color: #003;}
	.teks-mera {color: #b60202;}
	.teks-tebal {font-weight: bold;}
</style>
<h3>
	<center>Laporan Data Invoice</center>
</h3>
	<table class="table-data">
		<tr align="center">
			<th width="20">No.</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Waktu Pesan</th>
			<th>Batas Bayar</th>
			<th>Waktu Bayar</th>
			<th>Konfirmasi</th>
			<th>Bukti Bayar</th>
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
				</tr>

			<?php endforeach ?>
		</table>
<div align="center">Waktu Cetak: <?= date('Y-m-d H:i') ?></div>
<script>window.print()</script>