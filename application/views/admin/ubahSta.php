<div class="container-fluid">
	<h3 class="tom tom-sar my-4"><?= $judul; ?></h3>
	<form action="<?= base_url('admin/kirim/update') ?>" method="POST">
		<div class="form-group col-md-8">
			<?php foreach ($pesanan as $psn): ?>
				<input type="hidden" class="form-control" id="id" value="<?= $psn->id; ?>" name="id">
				<label class="teks-gelap"><?= $psn->nama_brg; ?></label>
				<select name="status" id="status" value="<?= $psn->status; ?>" class="form-control col-md-5 teks-gelap-2">
					<?php foreach ($status as $s): ?>
						<?php if ($psn->status == $s): ?>
							<option value="<?= $s; ?>" selected><?= $s; ?></option>
							<?php else: ?>
								<option value="<?= $s; ?>" ><?= $s; ?></option>
							<?php endif ?>
						<?php endforeach ?>
					</select>
					<button type="submit" class="tom tom-buy mt-3">Simpan</button>
					<a href="<?= base_url('admin/kirim')  ?>" class="tom tom-gas mx-2 mt-3">Kembali</a>
				<?php endforeach ?>
			</div>
		</form>
		<!-- end container fluid -->
	</div>
	<!-- end main conten -->
</div>