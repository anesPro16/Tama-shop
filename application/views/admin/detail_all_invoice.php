<div class="container-fluid">
	<h3 class="tom tom-sar my-4 teks-besar"><?= $judul ?></h3>
	<table class="table pesan-kuning table-bordered">
		<tr align="center">
			<th width="50">No.</th>
			<th>Nama Produk </th>
			<th>Jumlah</th>
			<th>Harga</th>
			<td align="right" class="teks-tebal">Subtotal</td>
		</tr>

		<?php 
		date_default_timezone_set('Asia/Jakarta');
		$i=1;
		$total = 0;
		$jum = 0;
		foreach ($detail as $de): 
			$subtotal = $de['jumlah'] * $de['harga'];
			$jum += $de['jumlah'];
			$total += $subtotal;
	?>

			<tr align="center">
				<td><?= $i++; ?></td>
				<td><?= $de['nama_brg']; ?></td>
				<td><?= $de['jumlah']; ?></td>
				<td><?= $de['harga']; ?></td>
				<td align="right">Rp<?= number_format($subtotal, 2, ',', '.'); ?></td>				
			</tr>

			<?php endforeach ?>

			<tr align="center">
				<td></td>
				<td>Jumlah</td>
				<td><?= $jum; ?></td>
				<td>Grand Total</td>
				<td align="right" class="teks-tebal">Rp<?= number_format($total, 2, ',', '.'); ?></td>
			</tr>

		</table>
	</div>