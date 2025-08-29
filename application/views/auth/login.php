<div class="kartu-login">
	<img src="<?= base_url(); ?>assets/img/profile/foto.jpg" width="200" alt="foto">
	<h2>Login </h2>
	<!-- perintah untuk menampilkan nilai dari flashdata dengan nama pesan -->
	<?= $this->session->flashdata('pesan'); ?> 
	<form action="<?= base_url('auth'); ?>" class="form-login" method="POST">
		<div class="pengguna">
			<input type="text" autocomplete="off" spellcheck="false" class="kontrol" placeholder="Email" value="<?= set_value('email'); ?>" name="email">
			<!-- untuk menampilkan pesan kesalahan jika ada validasi yang salah -->
			<?= form_error('email', '<small class="teks-buy pl-3">', '</small>'); ?>
			<div class="wa-pw">
				<input type="password" class="kontrol" id="password" placeholder="password" spellcheck="false" name="password">
				<div id="toggle"></div>
			</div>
		</div>
		<?= form_error('password', '<small class="teks-buy pl-3">', '</small>'); ?>
		<button type="submit" class="kontrol">Login</button>
	</form>
	<a class="daf" href="<?= base_url('auth/registration'); ?>">Mau Daftar Dulu ?</a>
</div>
