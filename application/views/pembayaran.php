<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<?php 
			$total = 0;
			$grand_total = 0;
			if ($cart = $this->cart->contents()) :
				foreach ($cart as $item) {
					$total += $item['subtotal'];

					echo "<h1 class='btn btn-success' style='display: none'>Total Belanja : Rp" . number_format($total, 2, ',', '.');

					?>
				<?php } else: ?>
				<h1 class ='pesan pesan-buy text-center mt-2'>Anda belum memasukkan keranjang</h1>
				<a href="<?= base_url('buyer'); ?>" class="tom tom-gas teks-gelap">Back</a>
				<?php return false; ?>
			<?php endif ?>

			<!-- </button> -->
			<h3 class="tom tom-sar my-3">Form Pembayaran</h3>
			<form action="<?= base_url('admin/invoice/prosesInv'); ?>" class="teks-gelap"  method="post">
				<div class="form-group col-md-5">
					<label for="nama">Nama Pembeli</label>
					<input type="hidden" id="grandTotal" name="grandTotal" value="<?= $total; ?>" class="form-control">
					<input type="hidden" class="form-control" id="id" value="<?= $user['id']; ?>" name="id">
					<input type="text" class="form-control" id="nama" value="<?= $user['nama']; ?>" name="nama" readonly>
				</div>
				<div class="form-group col-md-6">
					<label for="alamat">Alamat</label>
					<input type="text" class="form-control" id="alamat" value="<?= $user['alamat']; ?>" name="alamat" readonly>
				</div>
				<div class="form-group col-md-4">
					<label for="noHp">No Hp</label>
					<input type="number" class="form-control" id="noHp" value="<?= $user['no_hp']; ?>" name="noHp" readonly>
				</div>
				<div class="form-group col-md-5">
					<label for="cardNum">Nomor Rekening Tama Shop</label>
					<input type="text" class=" form-control rek teks-gelap" readonly value="083129244147">
				</div>
				<div class="form-group col-md-3">
					<label for="metode">Pilih Metode pembayaran</label>
					<select name="metode" id="metode" class="form-control">
						<option value="Dana">Dana</option>
						<option value="GoPay">GoPay</option>
						<option value="BCA">BCA</option>
						<option value="Cod">Cod</option>
					</select>
				</div>
				<?php echo "<h1 class='tom tom-gas ml-3'>Total Belanja : Rp." . number_format($total, 2, ',', '.') . "</h1>"; ?>
				<button type="submit" class="tom tom-buy ml-3">Order</button>
			</form>

		</div>
		<div class="col-md-2"></div>
	</div>
</div>

<script>
	const select = document.querySelector('#metode');
	const rek = document.querySelector(".rek");
	select.addEventListener('click', () => {
		if (select.value == 'Dana') {
		rek.value = '083129244147'
		}
		else if (select.value == 'GoPay') {
			rek.value = '0895411267649'
		}
		else if (select.value == 'BCA') {
			rek.value = '901279406965'
		}
		else if (select.value == 'Cod') {
			rek.value = 'Pembayaran Langsung'
		}

	})


</script>
