<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon">
					<i class="fas fa-store"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Tama Shop </div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider">
			<!-- query menu -->
			<?php
			$id_peran = $this->session->userdata('id_peran');
			$queryMenu = "SELECT `user_menu`.`id`, `menu`
			FROM `user_menu` JOIN `user_akses_menu`
			ON `user_menu`.`id` = `user_akses_menu`.`id_menu`
			WHERE `user_akses_menu`.`id_peran` = $id_peran
			ORDER BY `user_akses_menu`.`id_peran` ASC
			";
			$menu = $this->db->query($queryMenu)->result_array();
			?>

			<!-- Heading -->
			<!-- Kategori -->
			<?php foreach ($menu as $m): ?>
				<div class="sidebar-heading">
					<?= $m['menu']; ?>
				</div>

				<!-- submenu sesuai menu -->
				<?php 
				$idMenu = $m['id'];
				$querySubMenu = "SELECT *
				FROM `user_sub_menu`
				WHERE `id_menu` = $idMenu
				AND `is_aktif` = 1
				";
				$subMenu = $this->db->query($querySubMenu)->result_array();
				?>

				<?php foreach ($subMenu as $sm): ?>
					<?php if ($judul == $sm['judul']): ?>
						<li class="nav-item active">
							<?php else: ?>
								<li class="nav-item">
								<?php endif ?>
								<a href="<?= base_url($sm['url']); ?>" class="nav-link pb-0">
									<i class="<?= $sm['icon']; ?>"></i>
									<span><?= $sm['judul']; ?></span>
								</a>
							</li>
						</li>
					<?php endforeach; ?>

					<hr class="sidebar-divider mt-3">
				<?php endforeach; ?>



				<!-- Nav Item - Tables -->


					<!-- Divider -->
					<!-- <hr class="sidebar-divider d-none d-md-block"> -->

					<!-- Sidebar Toggler (Sidebar) -->
					<div class="text-center d-none d-md-inline">
						<button class="rounded-circle border-0" id="sidebarToggle"></button>
					</div>
				</ul>
									<!-- End of Sidebar -->