<div class="container-fluid">
	<div class="row mt-3">
		<div class="col-md-12">
			<h3 class="tom tom-sar my-4"><?= $judul ?></h3>
			<?php if (empty($barang)): ?>
				<center>
					<div class="pesan pesan-buy col-md-4 col-sm-6 text-center" role="alert"><h5>Data Barang Tidak Ada</h5></div>
					<a href="<?= base_url(''); ?>" class="tom tom-gas teks-gelap">Kembali</a>
				</center>
			<?php endif; ?>

			<div class="wadah">
				<section class="katalog">
					<?php foreach ($barang as $brg): ?>
						<div class="kartu" style="width: 202px">
							<img src="<?= base_url() . 'assets/img/upload/' . $brg['gambar'] ; ?>" alt="<?= $brg['nama_brg']; ?>" class="<?= ($brg['stok'] == 0) ? 'kosong' : '';  ?>" >
							<p><?= $brg['nama_brg']; ?></p>
							<h3>Rp<?= number_format($brg['harga'], 2, ',', '.'); ?></h3>
							<?php if ($brg['stok'] == 0): ?>
							<?= '<p class = "kosong">Kosong</p>'; ?>
							<?php else: ?>
								<?= anchor('buyer/addCart/' . $brg['id_brg'], '<p class = "pesan">Pesan</p>'); ?>
							<?php endif ?>
								<?= anchor('buyer/detail/' . $brg['id_brg'], '<p class = "detail">Detail</p>'); ?>
						</div>
					<?php endforeach ?>
				</section>
			</div>
			
		</div>
	</div>
</div>