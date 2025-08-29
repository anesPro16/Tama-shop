<title><?= $nama ?> </title>
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
	}
	.table-data tr th,
	.table-data tr td{
		border: 1px solid #e3e6f0;
		font-size: 11pt;
		padding: 10px 10px 10px 10px;
	}
</style>
<h3>
	<center>Bukti Pembelian</center>
</h3>
	<p>
		Nama pembeli : <?= $invoice->nama ?>
	</p>
	<p>
		Waktu Pesan : <?= $invoice->tgl_pesan ?>
	</p>
	<p>
		Batas Bayar : <?= $invoice->batas_bayar ?>
	</p>
	<p>
		Alamat   : <?= $invoice->alamat ?>
	</p>

<table class="table-data" border="1" cellpadding="3" cellspacing="0" align="center">
	<tr class="satu">
		<th>Nama Produk</th>
		<th>Harga</th>
		<th>Jumlah</th>
		<th align="right">Subtotal</th>
		<th>Status</th>
	</tr>

	<?php 
	$total = 0;
	foreach ($invPes as $psn) :
		$subtotal = $psn->jumlah * $psn->harga;
		$total += $subtotal;
		?>
		<tr align="center">
			<td><?= $psn->nama_brg; ?></td>
			<td>Rp<?= number_format($psn->harga, 2, ',', '.'); ?></td>
			<td><?= $psn->jumlah; ?></td>
			<td align="right">Rp<?= number_format($subtotal, 2, ',', '.'); ?></td>
			<td><?= $psn->status; ?></td>
		</tr>

	<?php endforeach; ?>
	<tr>
		<td colspan="3" align="right">Grand Total</td>
		<td colspan="1" align="right" class="teks-tebal">Rp<?= number_format($total, 2, ',', '.'); ?></td>
		<td></td>
	</tr>
	<tr>
		<td align="center" colspan="5">
		<?php date_default_timezone_set('Asia/Jakarta'); ?>
		<?= md5(date('d M Y H:i:s')); ?>
	</td>
	</tr>
</table>
<div align="center">Waktu Cetak: <?= date('Y-m-d H:i') ?></div>