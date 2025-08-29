			</div> <!-- akhir main content -->
			<!-- footer -->
			<footer class="sticky-footer bg-gray">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<p>Sistem Informasi</p>
						<span>Copyright &copy; Kelompok 2 19.4A.05 <?= date('Y'); ?></span>
					</div>
				</div>
			</footer> <!-- akhir footer -->

		</div>
		<!-- akhir content wrapper -->

	</div>
	<!-- akhir page wrapper -->

	<!-- scroll ke atas -->
	<a href="#page-top" class="scroll-to-top rounded">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Serius, ingin keluar?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Klik Logout jika ingin segera keluar</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
					<a class="btn btn-primary" href="<?= base_url('auth/logOut'); ?>">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

	<script>
		$('.custom-file-input').on('change', function() {
			let fileName = $(this).val().split('\\').pop();
			$(this).next('.custom-file-label').addClass('selected').html(fileName);
		});

		const bars = document.querySelector('nav .fa-bars');
		const cf = document.querySelector('.container-fluid');
		bars.addEventListener('click', () => {
			document.body.classList.toggle('open');
			cf.classList.toggle('turun');
		})

		// konfirmasi log out
		const kirim = document.querySelector('.fa-sign-out-alt');
		const popUp = document.querySelector('.pop-up');
		const kotak = document.querySelector('.kotak');
		const ya = document.querySelector('.pop-up button');
		const tak = document.querySelector('.pop-up button[type=button]');
		kirim.addEventListener('click', () => {
			popUp.classList.add('buka-popUp');
			kotak.classList.add('kotak-penuh');
		})
		tak.addEventListener('click', () => {
			popUp.classList.remove('buka-popUp');
			kotak.classList.remove('kotak-penuh');
		})

	</script>

</body>
</html>
