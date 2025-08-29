<div class="kartu-daftar">
	<img src="<?= base_url(); ?>assets/img/profile/foto.jpg" width="200" alt="foto">
	<h2>Daftar </h2>
	<h3>Masukkan Data diri Anda </h3>
	<form action="<?= base_url('auth/registration'); ?>" class="form-login" method="POST">
		<div class="pengguna">
			<input type="text" autocomplete="off" spellcheck="false" class="kontrol" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>" name="nama">
			<?= form_error('nama', '<small class="teks-buy">', '</small>'); ?>
			<input type="text" autocomplete="off" spellcheck="false" class="kontrol" placeholder="Email" value="<?= set_value('email'); ?>" name="email">
			<?= form_error('email', '<small class="teks-buy">', '</small>'); ?>
			<input type="text" autocomplete="off" spellcheck="false" class="kontrol" placeholder="Alamat" value="<?= set_value('alamat'); ?>" name="alamat">
			<?= form_error('alamat', '<small class="teks-buy">', '</small>'); ?>
			<input type="tel" autocomplete="off" spellcheck="false" class="kontrol" placeholder="Nomor Handphone" value="<?= set_value('noHp'); ?>" name="noHp">
			<?= form_error('noHp', '<small class="teks-buy">', '</small>'); ?>
			<div class="wa-pw">
				<input type="password" class="kontrol" id="password" placeholder="password" spellcheck="false" name="password1">
				<div id="toggle"></div>
			</div>
			<?= form_error('password1', '<small class="teks-buy">', '</small>'); ?>
			<input type="password" class="kontrol" id="password2" placeholder="Konfirmasi password" spellcheck="false" name="password2">
			<div id="toggle2"></div>
		</div>
		<button class="kontrol" type="submit">Daftar</button>
	</form>
	<a class="daf" href="<?= base_url('auth'); ?>">Dah Punya Akun ?</a>
</div>
