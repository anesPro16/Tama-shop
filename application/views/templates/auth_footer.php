<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>assets/js/nes.js"></script>

	<script>
		const pw = document.querySelector('input[name=password1]');
		const toggle = document.querySelector('#toggle');
		toggle.addEventListener('click', () => {
			if (pw.type === 'password') {
				pw.setAttribute('type', 'text');
				toggle.classList.add('merem')
			} else {
				pw.setAttribute('type', 'password');
				toggle.classList.remove('merem');
			}
		})

		const pw2 = document.querySelector('input[name=password2]');
		const toggle2 = document.querySelector('#toggle2');
		toggle2.addEventListener('click', () => {
			if (pw2.type === 'password') {
				pw2.setAttribute('type', 'text');
				toggle2.classList.add('merem')
			} else {
				pw2.setAttribute('type', 'password');
				toggle2.classList.remove('merem');
			}
		})

	</script>
</body>

</html>