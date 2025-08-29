<div class="container-fluid">
	<h3 class="tom tom-sar my-4"><?= $judul ?></h3>
	<table class="table table-bordered">
		<tr align="center">
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<td align="right" class="teks-tebal">Subtotal</td>
			<th>Status</th>
			<th>Aksi</th>
		</tr>

		<?php 
		$total = 0;
		foreach ($pesanan as $psn) :
			$subtotal = $psn->jumlah * $psn->harga;
			$total += $subtotal;
			?>
			<tr align="center">
				<td><?= $psn->nama_brg; ?></td>
				<td>Rp<?= number_format($psn->harga, 2, ',', '.'); ?></td>
				<td><?= $psn->jumlah; ?></td>
				<td align="right">Rp<?= number_format($subtotal, 2, ',', '.'); ?></td>
				<td><?= $psn->status; ?></td>
				<td>
						<?= anchor('buyer/lapor/'. $psn->id, '<button type="button" class="tom tom-zal">Komplain</button>'); ?>
				</td>
			</tr>

		<?php endforeach; ?>
		<tr align="right">
			<td colspan="3">Grand Total</td>
			<td class="teks-tebal">Rp<?= number_format($total, 2, ',', '.'); ?></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	<div class="row">
		<div class="col-lg-9">
			<?= form_open_multipart('buyer/updateFoto/'. $user['id']); ?>
			<div class="form-group row">
				<h4 class="ml-3 teks-gelap">Foto Bukti Pembayaran</h4>
				<div class="row">
					<div class="col-sm-3 ml-3">
						<img src="<?= base_url('assets/img/bukti/'). $invoice->gambar; ?>" alt="<?= $invoice->gambar;?>" class="img-thumbnail" width="350">
					</div>
					<div class="col-sm-5">
						<div class="custom-file">
							<input type="hidden" value="<?= $invoice->id; ?>" name="id">
							<input type="file" class="custom-file-input" id="gambar" name="gambar" required>
							<label for="no_rek" class="mt-2 teks-gelap-2">Nomor Rekening Tama Shop</label>
							<input type="text" id="no_rek" class="form-control" value="901279406965" readonly>
							<label for="gambar" class="custom-file-label">Pilih Gambar</label>
						</div>
						<button class="tom tom-buy mt-3 mr-3" type="submit">Upload Foto</button>
						<a href="<?= base_url('buyer/pesanan/') . $user['id']; ?>" class="tom tom-gas mt-3">Kembali</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
