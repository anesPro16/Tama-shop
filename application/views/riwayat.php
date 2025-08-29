<div class="container-fluid">
	<h3 class="tom tom-sar my-4"><?= $judul ?></h3>
	<table class="table table-bordered">
		<tr align="center">
			<th width="60">No.</th>
			<th>Nama Barang</th>
			<th>Masalah</th>
			<th>Laporan</th>
			<th>Balasan</th>
			<th>Foto Barang</th>
		</tr>

		<?php
		$i=1; 
		foreach ($lapor as $lap): ?>
			<tr align="center">
				<td><?= $i++; ?></td>
				<td><?= $lap->nama_brg; ?></td>
				<td><?= $lap->masalah; ?></td>
				<td class="<?= ($lap->laporan == 'Sedang Diproses') ? 'teks-mera teks-tebal' : 'teks-gelap teks-tebal';  ?>"><?= $lap->laporan; ?></td>
				<td class="teks-tebal"><?= $lap->balasan; ?></td>
				<td><img src="<?=base_url('assets/img/bukti/') . $lap->foto; ?>" alt="<?= $lap->foto; ?>" width="100"></td>
			</tr>

		<?php endforeach ?>
	</table>
</div>