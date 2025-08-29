<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Navbar</title>
	<link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome-free/css/all.css'); ?> ">
	<link rel="stylesheet" href="<?= base_url('assets/css/nav.css'); ?> ">
	<link rel="stylesheet" href="<?= base_url('assets/css/yaNo.css'); ?> ">
</head>
<body id="page-top">
	<nav>
		<div class="fa fa-bars fa-inverse"></div>

		<a href=""><img src="<?= base_url('assets/img/profile/'); ?>logo.jpg" alt="logo"></a>
		<a href="<?= base_url(''); ?>" class="nama-toko">Tama Shop</a>
		<div class="item-menu">
			<div class="menu menu-kiri">
				<a href="<?= base_url('kategori/sembako'); ?>">Sembako</a>
				<a href="<?= base_url('kategori/makanan'); ?>">Makanan</a>
				<a href="<?= base_url('kategori/minuman'); ?>">Minuman</a>
			</div>
		</div>

		<form action="<?= base_url('buyer/cari'); ?>" method="POST" class="cari">
			<input type="search" name="kataKunci" autocomplete="off" spellcheck="false">
			<button type="submit">
				<i class="fas fa-search fa-sm"></i>
			</button>
		</form>
		<div class="menu menu-kanan">
			<?php if ($user): ?>
				<a href="<?= base_url('buyer/detail_keranjang'); ?>" class="fas fw fa-cart-shopping"></a>
				<a href="<?= base_url('buyer/pesanan/') . $user['id']; ?>" class="fas fw fa-bag-shopping"></a>
				<a href="<?= base_url('buyer/riwayat/') . $user['id']; ?>" class="fas fw fa-message"></a>
				<a href="<?= base_url('buyer/profil'); ?>" class="fas fw fa-user"></a>
				<a href="<?= base_url('buyer/kontak'); ?>" class="fas fw fa-phone"></a>
				<a class="fas fw fa-sign-out-alt"></a>
				<?php else: ?>
					<a href="<?= base_url('buyer/kontak'); ?>" class="fas fw fa-phone"></a>
					<a href="<?= base_url('auth'); ?>" class="fas fw fa-sign-in-alt"> Login</a>
				<?php endif ?>
			</div>
		</nav>
		<div class="kotak">
			<form action="<?= base_url('auth/logOut'); ?>" class="pop-up">
				<div class="fa ceklis"></div>
				<h2>Apakah Kamu Yakin?</h2>
				<p>Klik Lakukan</p>
				<button type="submit">Lakukan</button>
				<button type="button">Jangan</button>
			</form>
		</div>
