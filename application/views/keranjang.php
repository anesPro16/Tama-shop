<div class="container-fluid">
	<h3 class="tom tom-sar my-3"><?= $judul ?></h3>
	<table class="table table-bordered">
		<tr align="center" class="teks-gelap">
			<th>No</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<td align="right" class="font-weight-bold">Subtotal</td>
		</tr>
		<?php
		$no = 1;		
		foreach ($this->cart->contents() as $items): ?>
			<tr align="center" class="teks-gelap-2">
				<td><?= $no++; ?></td>
				<td><?= $items['name']; ?></td>
				<td>
					<?php 
						$brg = $this->db->get_where('tb_barang', ['id_brg' => $items['id']])->row_array();
 						if ($items['qty'] < $brg['stok']): ?>
						<?= anchor('buyer/addCart2/'. $items['id'] , '<i class="fa-solid fa-plus mr-1" style="color: #0f0;"></i>'); ?>
					<?php else: ?>
						<!-- kosong -->
					<?php endif ?>
					<?= $items['qty']; ?>
					<?php if ($items['qty'] == 1): ?>
						<!-- kosong -->
					<?php else: ?>
						<?= anchor('buyer/kurangi/'. $items['id'] , '<i class="fa-solid fa-minus mr-1" style="color: #f00;"></i>'); ?>
					<?php endif ?>
				</td>
				<td>Rp<?= number_format($items['price'], 2, ',', '.'); ?></td>
				<td align="right">Rp<?= number_format($items['subtotal'], 2, ',', '.'); ?></td>
			</tr>

		<?php endforeach ?>
		<tr>
			<td colspan="4"></td>
			<td align="right" class="teks-gelap font-weight-bold">Rp<?= number_format($this->cart->total(), 2, ',', '.'); ?></td>
		</tr>

	</table>

	<div>
		<a href="<?= base_url('buyer/index'); ?>"><button type="button" class="tom tom-abu mr-2">Mau Cari Lagi</button></a>
		<a href="<?= base_url('buyer/dropCart'); ?>"><button type="button" class="tom tom-zal mr-2">X</button></a>
		<a href="<?= base_url('buyer/pembayaran'); ?>"><button type="button" class="tom tom-buy">Check Out</button></a>
	</div>
</div>