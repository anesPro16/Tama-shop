<div class="container-fluid px-0"> <!-- awal container  -->
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="<?= base_url('assets/img/slide/slider.png'); ?>" class="d-block w-100" alt="img 1">
				</div>
				<div class="carousel-item">
					<img src="<?= base_url('assets/img/slide/slider2.png'); ?>" class="d-block w-100" alt="img 2">
				</div>
				<div class="carousel-item">
					<img src="<?= base_url('assets/img/slide/slider3.png'); ?>" class="d-block w-100" alt="img 3">
				</div>
			</div>
		</div>

		<div class="wadah">
			<section class="katalog">
				<?php foreach ($sembako as $bako): ?>
					<div class="kartu">
						<img src="<?= base_url() . 'assets/img/upload/' . $bako->gambar ; ?>" alt="<?= $bako->nama_brg; ?>" class="<?= ($bako->stok == 0) ? 'kosong' : '';  ?>" >
						<p><?= $bako->nama_brg; ?></p>
						<h3>Rp<?= number_format($bako->harga, 2, ',', '.'); ?></h3>
						<?php if ($bako->stok == 0): ?>
							<?= '<p class = "kosong">Kosong</p>'; ?>
						<?php else: ?>
							<?= anchor('buyer/addCart/' . $bako->id_brg, '<p class = "pesan">Pesan</p>'); ?>
						<?php endif ?>
							<?= anchor('buyer/detail/' . $bako->id_brg, '<p class = "detail">Detail</p>'); ?>
					</div>
				<?php endforeach ?>
			</section>
		</div>

		<div class="kotak">
			<form action="<?= base_url('auth/logOut'); ?>" class="pop-pesan">
				<div class="fa ceklis"></div>
				<h2>Apakah Kamu Yakin?</h2>
				<p>Klik Lakukan</p>
				<button type="submit">Lakukan</button>
				<button type="button">Jangan</button>
			</form>
		</div>
		<!-- akhir container -->
	</div>