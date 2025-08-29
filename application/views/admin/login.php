<div class="kartu-login">
	<img src="<?= base_url(); ?>assets/img/profile/profile1.png" width="200" alt="foto">
	<h2>Login Admin</h2>
	<?= $this->session->flashdata('pesan'); ?>
	<form action="<?= base_url('admin/login'); ?>" class="form-login" method="POST">
		<div class="pengguna">
			<input type="text" autocomplete="off" spellcheck="false" class="kontrol" placeholder="Email" value="<?= set_value('email'); ?>" name="email">
			<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
			<input type="password" class="kontrol" id="password" placeholder="password" spellcheck="false" name="password">
			<div id="toggle"></div>
		</div>
		<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
		<button type="submit" class="kontrol">Login</button>
	</form>
</div>
<!-- <script src="../../../assets/js/daftar3.js"></script> -->
