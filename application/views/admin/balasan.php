<div class="container-fluid">
	<h1 class="tom tom-sar my-4"><?= $judul; ?></h1>
	<form action="<?= base_url('admin/kirim/updateLap') ?>" method="POST">
		<div class="form-group col-md-8">
			<?php foreach ($lapor as $lap): ?>
				<input type="hidden" class="form-control" id="id" value="<?= $lap->id; ?>" name="id">
				<label class="teks-gelap">Balasan Laporan</label>
				<input type="text" class="form-control" name="balasan" spellcheck="false">
					<button type="submit" class="tom tom-buy my-3">Kirim</button>
				<?php endforeach ?>
			</div>
		</form>
		<!-- end container fluid -->
	</div>
	<!-- end main conten -->
</div>