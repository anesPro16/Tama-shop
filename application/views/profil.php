<!-- awal page content -->
<div class="container-fluid">
	
	<!-- awal page heading -->
	<h1 class="tom tom-sar my-4"><?= $judul; ?></h1>

	<div class="row">
		<div class="col-lg-8">
			<?= $this->session->flashdata('pesan'); ?>
		</div>
	</div>

	<div class="card mb-3 teks-gelap" style="max-width: 510px;">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="<?= base_url('assets/img/profile/') . $user['foto']; ?>" alt="<?= $user['nama']; ?>" class="card-img" width="200">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title"><?= $user['nama']; ?></h5>
					<p class="card-text text-dark"><?= $user['email']; ?></p>
					<?php if ($user['id_peran'] == 1) {
						$peran = 'Admin';
					} else {
						$peran = 'Anggota';
					}
					?>
					<p class="card-text text-gray-800"><?= $peran . ' '; ?>sejak<small class="text-muted pl-1">
					<?= $user['waktu']; ?></small></p>
					<?= anchor('buyer/edit', '<p class="tom tom-buy">Ubah <i class="fa fa-edit"></i></p>');  ?>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- akhri container-fluid -->

<!-- </div> -->