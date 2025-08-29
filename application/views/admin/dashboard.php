<div class="container-fluid">
	<!-- Content Row -->
	<h3 class="tom tom-sar mt-4 teks-besar"><?= $judul ?></h3>
	<h4 class="tom tom-buy d-block my-4 col-xl-2 col-md-4">Statistik Data Barang</h4>
	<div class="row">
		<!-- Jumlah barang -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
							Jumalah barang</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $barang[0]['count(id_brg)']; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-solid fa-boxes-packing fa-2x text-success"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Stok Barang -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Stok Semua barang
							</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $stok[0]['sum(stok)']; ?></div>
								</div>
								<div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-info" role="progressbar"
										style="width: 50%" aria-valuenow="50" aria-valuemin="0"
										aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-solid fa-boxes-stacked fa-2x text-info"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Rata-rata jumlah stok -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
							Rata-rata stok barang</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($avgStok[0]['avg(stok)'], 2, ',', '.'); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-solid fa-dolly fa-2x text-primary"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Total Keseluruhan Aset -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
							Total Keseluruhan Aset</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($ttlAset[0]['sum(total_harga)'], 2, ',', '.'); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-solid fa-sack-dollar fa-2x text-warning"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- akhir row -->
	</div>

	<h4 class="tom tom-gas d-block my-4 col-xl-2 col-md-4">Statistik Data Penjualan</h4>
	<div class="row">
		<!-- Produk Yang Terjual -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
							Produk Yang Terjual</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($produk[0]['sum(jumlah)']); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-solid fa-gifts fa-2x text-primary"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Total Pendapatan -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
							Total Pendapatan</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">Rp<?= number_format($earn[0]['sum(total_bayar)'], 2, ',', '.'); ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-dollar-sign fa-2x text-success"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Jumlah Pembeli -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Pembeli
							</div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
									<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $buyer[0]['count(id)']; ?></div>
								</div>
								<div class="col">
									<div class="progress progress-sm mr-2">
										<div class="progress-bar bg-info" role="progressbar"
										style="width: 10%" aria-valuenow="50" aria-valuemin="0"
										aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-solid fa-user-group fa-2x text-info"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Produk Yang Diminati -->
		<div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
							Produk Yang Diminati</div>
							<?php if ($produkLaku == false): ?>
								<div class="h5 mb-0 font-weight-bold text-gray-800">
								</div>
								<?php else: ?>
									<div class="h5 mb-0 font-weight-bold text-gray-800">
										<?= $produkLaku[0]['nama_brg']; ?>	
									</div>
								<?php endif ?>
							</div>
							<div class="col-auto">
								<i class="fas fa-solid fa-gift fa-2x text-warning"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="page-header my-2">
				<span class="fas fa-users teks-gelap mt-2"><p class="mx-2 d-inline">Data User</p></span>
			</div>
			<table class="table table-bordered" align="center">
				<tr align="center">
					<th width="50">No.</th>
					<th>Nama Anggota</th>
					<th>Email</th>
					<th>Alamat</th>
					<th>Role ID</th>
					<th>Member Sejak</th>
				</tr>
				<?php
				$i = 1;
				foreach ($anggota as $a) { ?>
					<tr align="center">
						<td><?= $i++; ?></td>
						<td><?= $a['nama']; ?></td>
						<td><?= $a['email']; ?></td>
						<td><?= $a['alamat']; ?></td>
						<td><?= $a['id_peran']; ?></td>
						<td><?= $a['waktu']; ?></td>
					</tr>
				<?php } ?>
			</table>
		</div>


	</div>