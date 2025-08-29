<style>
	.card-img-top {
		width: 30vw;
		height: 290px;
	}
	p.psn,
	p.nol{
		background-color: #60ff60;
		border-radius: 25px;
		color: #000;
		display: inline-block;
		margin: 1em auto;
		padding: .4em .7em;
		text-decoration: none;
		text-align: center;
	}
	p.nol {
		background-color: #003;
		color: #fff;
		cursor: pointer;
	}

	@media (max-width: 768px) {
		.card-img-top {
			width: 55%;
		}
	}
</style>
<div class="container-fluid">
	<h3 class="tom tom-sar my-4"><?= $judul ?></h3>
	<div class="card">
		<div class="card-body">
			<?php foreach ($barang as $brg): ?>
				<div class="row">
					<div class="col-md-4 tengah my-1">
						<img src="<?= base_url('assets/img/upload/' . $brg->gambar); ?>" alt="<?= $brg->nama_brg; ?>" class="card-img-top <?= ($brg->stok == 0) ? 'kosong' : '';  ?>" >
					</div>
					<div class="col-md-8">
						<table class="table table-responsive-md">
							<tr>
								<td>Nama Produk </td>
								<td><strong><?= $brg->nama_brg; ?></strong></td>
							</tr>
							<tr>
								<td>Keterangan </td>
								<td><strong><?= $brg->keterangan; ?></strong></td>
							</tr>
							<tr>
								<td>Kategori </td>
								<td><strong><?= $brg->kategori; ?></strong></td>
							</tr>
							<tr>
								<td>Stok </td>
								<td><strong><?= $brg->stok; ?></strong></td>
							</tr>
							<tr>
								<td>Harga </td>
								<td><strong class="teks-buy">Rp<?= number_format($brg->harga, 2, ',', '.'); ?></strong></td>
							</tr>
							
						</table>
						<?php if ($brg->stok == 0): ?>
							<?= '<p class = "nol">Kosong</p>'; ?>
						<?php else: ?>
							<?= anchor('buyer/addCart/' . $brg->id_brg, '<p class = "psn">Pesan</p>'); ?>
						<?php endif ?>
							<?= anchor('buyer/' , '<div class="tom tom-buy mx-2">Kembali</div>'); ?>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>