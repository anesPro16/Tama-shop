<div class="container-fluid">
	<div class="alert alert-success mt-3" role="alert">
		<strong>Baik</strong> Anda berhasil Memesan Produk, Terima Kasih.
	</div>

	<table class="table table-bordered table-inverse">
		<tr align="center" class="teks-gelap">
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<td align="right" class="font-weight-bold">Subtotal</td>
			<th>Status</th>
		</tr>

		<?php 
		$total = 0;
		foreach ($pesanan as $psn) :
			$subtotal = $psn->jumlah * $psn->harga;
			$total += $subtotal;
			?>
			<tr align="center" class="teks-gelap-2">
				<td><?= $psn->nama_brg; ?></td>
				<td>Rp<?= number_format($psn->harga, 2, ',', '.'); ?></td>
				<td><?= $psn->jumlah; ?></td>
				<td align="right">Rp<?= number_format($subtotal, 2, ',', '.'); ?></td>
				<td><?= $psn->status; ?></td>
			</tr>

		<?php endforeach; ?>
		<tr align="right" class="teks-gelap">
			<td colspan="3">Grand Total</td>
			<td class="font-weight-bold">Rp<?= number_format($total, 2, ',', '.'); ?></td>
			<td></td>
		</tr>
	</table>
		<a href="<?= base_url('admin/invoice/pesananPdf/' . $invoice->id) ?>" class="tom tom-sar mb-2" target="_blank">Download Pdf</a>
	<div class="row">
		<div class="col-lg-9">
			<?= form_open_multipart('buyer/updateFoto/'. $user['id']); ?>
			<div class="form-group row teks-gelap-2">
				<h4 class="ml-3 teks-gelap-2">Foto Bukti Pembayaran</h4>
				<div class="row">
					<div class="col-sm-3 ml-3">
						<img src="<?= base_url('assets/img/bukti/'). $invoice->gambar; ?>" alt="<?= $invoice->gambar;?>" class="img-thumbnail" width="350">
					</div>
					<div class="col-sm-5">
						<div class="custom-file">
							<input type="hidden" value="<?= $invoice->id; ?>" name="id">
							<input type="file" class="custom-file-input" id="gambar" name="gambar" required>
							<label for="no_rek" class="mt-2">Nomor Rekening Tama Shop</label>
							<input type="text" id="no_rek" class="form-control" value="901279406965" readonly>
							<label for="gambar" class="custom-file-label">Pilih Gambar</label>
						</div>
						<button class="tom tom-buy mt-3 mr-3" type="submit">Upload Foto</button>
						<a href="<?= base_url('buyer'); ?>" class="tom tom-gas mt-3">Kembali</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
	<!-- <a href="</?= base_url('buyer'); ?>" class="btn btn-primary">Kembali</a> -->
</div>