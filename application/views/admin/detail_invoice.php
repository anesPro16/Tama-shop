<div class="container-fluid">
	<h2 class="tom tom-sar my-4 teks-besar"><?= $judul ?> </h2>
	<table class="table pesan-kuning table-bordered">
		<tr align="center">
			<th width="100">Id Produk</th>
			<th>Nama Produk </th>
			<th>Jumlah </th>
			<th>Harga Satuan </th>
			<td align="right" class="teks-tebal">Sub total </td>
			<th>Aksi</th>
		</tr>

		<?php 
		$total = 0;
		foreach ($pesanan as $psn) :
			$subtotal = $psn->jumlah * $psn->harga;
			$total += $subtotal;
			?>
			<tr align="center">
				<td><?= $psn->id_brg; ?></td>
				<td><?= $psn->nama_brg; ?></td>
				<td><?= $psn->jumlah; ?></td>
				<td>Rp<?= number_format($psn->harga, 2, ',', '.'); ?></td>
				<td align="right">Rp<?= number_format($subtotal, 2, ',', '.'); ?></td>
				<td><?= anchor('admin/kirim/mengirim/'. $psn->id, '<button type="button" class="tom tom-buy">Proses</button>'); ?></td>
			</tr>

		<?php endforeach; ?>
		<tr>
			<td colspan="4" align="right">Grand Total</td>
			<td align="right" class="teks-tebal">Rp<?= number_format($total, 2, ',', '.'); ?></td>
			<td></td>
		</tr>
	</table>
	<a href="<?= base_url('admin/invoice/index/'); ?> " class="tom tom-gas">Kembali</a>
	<div class="row mt-4">
		<div class="col-sm-3 ml-3">
		<h4 class="teks-gelap ml-3">Foto Bukti Pembayaran</h4>
			<img src="<?= base_url('assets/img/bukti/'). $invoice->gambar; ?>" alt="<?= $invoice->gambar;?>" class="img-thumbnail">
		</div>
			<?= anchor('admin/invoice/konfirmasi/'. $invoice->id, '<button type="button" class="tom tom-buy">Konfirmasi</button>'); ?>			
	</div>

</div>