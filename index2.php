<?php
session_start();
require 'inc/koneksi.php';
// Jika tombol login belum berisi false maka redirect login.php
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
} else {
	$data_id = $_SESSION["ses_id"];
	$data_nama = $_SESSION["ses_nama"];
	$data_user = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
}


//FUNGSI RUPIAH
require 'inc/rupiah.php';
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Keuangan Devi Cell</title>
	<link rel="icon" href="dist/img/konter.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<script src="plugins/js/Chart.js"></script>
	<!-- Alert -->
	<script src="plugins/alert.js"></script>

</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->

	<!------- Level User ------->
	<?php
	$data_level = $_SESSION["ses_level"];
	if ($data_level == "Administrator") {
	?>
		<?php
		if (isset($_GET['page'])) {
			$hal = $_GET['page'];
		}
		?>

		<?php
		include 'navbar/navbar_bottom.php';
		?>
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-default navbar-light">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" data-widget="pushmenu" href="#">
							<i class="fas fa-bars"></i>
						</a>
					</li>
				</ul>




				<!-- Form Jam -->
				<form class="form-inline ml-3">
					<div class="input-group input-group-sm">
						<button class="btn btn-navbar" type="text">
							<i class="fas fa-clock"></i> &nbsp;<?php
																include "inc/tgl_indo.php";
																date_default_timezone_set('Asia/Makassar');
																echo "Tanggal  = " . tgl_indo(date('Y-m-d'));
																?>
						</button>
					</div>
				</form>


			</nav>
			<!-- /.navbar -->

			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="?page=MyApp/admin" class="brand-link text-center">
					<!-- <img src="dist/img/konter.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .9"> -->
					<span class="brand-text font-weight-light text-center"><b>Konter Pulsa Devi Cell</b></span>
				</a>

				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user (optional) -->
					<div class="user-panel mt-2 pb-2 mb-2 d-flex">
						<div class="">
							<img src="dist/img/profile/<?php $sql = mysqli_query($koneksi, "SELECT * FROM tb_pengguna where id_pengguna='$data_id'");
														while ($data = mysqli_fetch_array($sql)) {
															echo $data['foto_profile'] ?>" class="rounded" style="width:55px;">
						</div>
						<div class="info">
							<a href="?page=MyApp/profile" class="d-block">
								<?php echo $data["nama_pengguna"]; ?>
							</a>
							<span class="badge badge-success">
								<?php echo $data_level; ?>
							</span>
						<?php
														}
						?>
						</div>
					</div>

					<!-- Sidebar Menu -->

					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<li class="nav-item">
								<a href="?page=MyApp/admin" class="nav-link <?php if ($hal == 'MyApp/admin') {
																				echo 'active';
																			} ?>">
									<i class="nav-icon fas fa-columns"></i>
									<p>
										Dashboard
										<span class="badge badge-warning right">6 Info</span>
									</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="?page=i_data_k" class="nav-link <?php if ($hal == 'i_data_k' || $hal == 'i_add_k' || $hal == 'i_edit_k') {
																				echo 'active';
																			} ?>">
									<i class="nav-icon fas fa-th"></i>
									<p>
										Data Kategori
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview <?php if (
																	$hal == 'i_data_km' || $hal == 'i_add_km' || $hal == 'i_edit_km'
																	|| $hal == 'o_data_km' || $hal == 'o_add_km' || $hal == 'o_edit_km' || $hal == 'rekap_km'
																) {
																	echo 'menu-open';
																} ?>">
								<a href="#" class="nav-link <?php if (
																$hal == 'i_data_km' || $hal == 'i_add_km' || $hal == 'i_edit_km'
																|| $hal == 'o_data_km' || $hal == 'o_add_km' || $hal == 'o_edit_km' || $hal == 'rekap_km'
															) {
																echo 'active';
															} ?>">
									<i class="nav-icon fas fa-wallet"></i>
									<p>
										Data Transaksi
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=i_data_km" class="nav-link <?php if ($hal == 'i_data_km' || $hal == 'i_add_km' || $hal == 'i_edit_km') {
																						echo 'active';
																					} ?>">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Pemasukan</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=o_data_km" class="nav-link <?php if ($hal == 'o_data_km' || $hal == 'o_add_km' || $hal == 'o_edit_km') {
																						echo 'active';
																					} ?>">
											<i class="nav-icon far fa-circle text-danger"></i>
											<p>Pengeluaran</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=rekap_km" class="nav-link <?php if ($hal == 'rekap_km') {
																						echo 'active';
																					} ?>">
											<i class="nav-icon far fa-circle text-primary"></i>
											<p>Rekap Kas Konter Pulsa</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item">
								<a href="?page=lap_pulsa" class="nav-link  <?php if ($hal == 'lap_pulsa') {
																				echo 'active';
																			} ?>">
									<i class="nav-icon fas fa-print"></i>
									<p>
										Print/ Save Laporan
									</p>
								</a>
							</li>

							<br>

							<li class="nav-item has-treeview <?php if ($hal == 'MyApp/data_pengguna' || $hal == 'MyApp/profile') {
																	echo 'menu-open';
																} ?>">
								<a href="#" class="nav-link <?php if ($hal == 'MyApp/data_pengguna' || $hal == 'MyApp/profile') {
																echo 'active';
															} ?>">
									<i class="nav-icon fas fa-cog"></i>
									<p>
										Settings
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=MyApp/data_pengguna" class="nav-link <?php if ($hal == 'MyApp/data_pengguna') {
																								echo 'active';
																							} ?>">
											&emsp13;&emsp13;<i class="nav-icon fas fa-user"></i>
											<p>Data User
												<?php
												$sql = $koneksi->query("SELECT COUNT(id_pengguna) as pengguna from tb_pengguna");
												while ($data = $sql->fetch_assoc()) {
													$jml = $data['pengguna'];
												}
												?>
												<span class="badge badge-warning right"><?php echo $jml; ?> Level</span>
											</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=MyApp/profile" class="nav-link <?php if ($hal == 'MyApp/profile') {
																							echo 'active';
																						} ?>">
											&emsp13;&emsp13;&nbsp;<i class="nav-icon fas fa-user-cog"></i>
											<p>Profile</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item">
								<a href="?page=MyApp/about" class="nav-link <?php if ($hal == 'MyApp/about') {
																				echo 'active';
																			} ?>">
									<i class="nav-icon fas fa-info-circle"></i>
									<p>
										About
									</p>
								</a>
							</li>


							<!----------- Jika Level Karyawan -------------->
						<?php
					} elseif ($data_level == "Karyawan") {

						if (isset($_GET['page'])) {
							$hal = $_GET['page'];
						}

						include 'navbar/navbar_bottom_karyawan.php';
						?>


							<div class="wrapper">
								<!-- Navbar -->
								<nav class="main-header navbar navbar-expand navbar-default navbar-light">
									<!-- Left navbar links -->
									<ul class="navbar-nav">
										<li class="nav-item">
											<a class="nav-link" data-widget="pushmenu" href="#">
												<i class="fas fa-bars"></i>
											</a>
										</li>
									</ul>


									<form class="form-inline ml-3">
										<div class="input-group input-group-sm">
											<button class="btn btn-navbar" type="text">
												<i class="fas fa-clock"></i> &nbsp;<?php
																					include "inc/tgl_indo.php";
																					date_default_timezone_set('Asia/Makassar');
																					echo "Tanggal dan Pukul  = " . tgl_indo(date('Y-m-d')) . "&emsp;" . date('H:i:s a');
																					?>
											</button>
										</div>
									</form>

									<!-- Right navbar links -->

								</nav>
								<!-- /.navbar -->

								<!-- Main Sidebar Container -->
								<aside class="main-sidebar sidebar-dark-primary elevation-4">
									<!-- Brand Logo -->
									<a href="?page=MyApp/karyawan" class="brand-link text-center">
										<!-- <img src="dist/img/konter.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .9"> -->
										<span class="brand-text font-weight-light text-center"><b>Konter Pulsa Devi Cell</b></span>
									</a>

									<!-- Sidebar -->
									<div class="sidebar">
										<!-- Sidebar user (optional) -->
										<div class="user-panel mt-3 pb-3 mb-3 d-flex">
											<div class="">
												<img src="dist/img/profile/<?php $sql = mysqli_query($koneksi, "SELECT * FROM tb_pengguna where id_pengguna='$data_id'");
																			while ($data = mysqli_fetch_array($sql)) {
																				echo $data['foto_profile'] ?>" class="rounded" style="width:55px;">
											</div>

											<div class="info">
												<a href="?page=MyApp/profile" class="d-block">
													<?php echo $data["nama_pengguna"]; ?>
												</a>
												<span class="badge badge-success">
													<?php echo $data_level; ?>
												</span>
											<?php
																			}
											?>
											</div>
										</div>

										<!-- Sidebar Menu -->
										<nav class="mt-2">
											<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
												<li class="nav-item">
													<a href="?page=MyApp/karyawan" class="nav-link <?php if ($hal == 'MyApp/karyawan') {
																										echo 'active';
																									} ?>">
														<i class="nav-icon fas fa-tachometer-alt"></i>
														<p>
															Dashboard
															<span class="badge badge-warning right">5 Info</span>
														</p>
													</a>
												</li>

												<li class="nav-item has-treeview <?php if (
																						$hal == 'i_data_kmk' || $hal == 'o_data_kmk'
																						|| $hal == 'rekap_kmk'
																					) {
																						echo 'menu-open';
																					} ?>">
													<a href="#" class="nav-link <?php if (
																					$hal == 'i_data_kmk'
																					|| $hal == 'o_data_kmk' || $hal == 'rekap_kmk'
																				) {
																					echo 'active';
																				} ?>">
														<i class="nav-icon fas fa-bell"></i>
														<p>
															Data Transaksi
															<i class="fas fa-angle-left right"></i>
														</p>
													</a>
													<ul class="nav nav-treeview">
														<li class="nav-item">
															<a href="?page=i_data_kmk" class="nav-link <?php if ($hal == 'i_data_kmk') {
																											echo 'active';
																										} ?>">
																<i class="nav-icon far fa-circle text-success"></i>
																<p>Pemasukan Pulsa</p>
															</a>
														</li>
														<li class="nav-item">
															<a href="?page=o_data_kmk" class="nav-link <?php if ($hal == 'o_data_kmk') {
																											echo 'active';
																										} ?>">
																<i class="nav-icon far fa-circle text-danger"></i>
																<p>Pengeluaran Pulsa</p>
															</a>
														</li>
														<li class="nav-item">
															<a href="?page=rekap_kmk" class="nav-link <?php if ($hal == 'rekap_kmk') {
																											echo 'active';
																										} ?>">
																<i class="nav-icon far fa-circle text-primary"></i>
																<p>Rekap Kas Konter Pulsa</p>
															</a>
														</li>
													</ul>
												</li>

												<li class="nav-item">
													<a href="?page=lap_pulsak" class="nav-link  <?php if ($hal == 'lap_pulsak') {
																									echo 'active';
																								} ?>">
														<i class="nav-icon fas fa-print"></i>
														<p>
															Print/ Save Laporan
														</p>
													</a>
												</li>

												<br>
												<li class="nav-item has-treeview <?php if ($hal == 'MyApp/profile') {
																						echo 'menu-open';
																					} ?>">
													<a href="#" class="nav-link <?php if ($hal == 'MyApp/profile') {
																					echo 'active';
																				} ?>">
														<i class="nav-icon fas fa-cog"></i>
														<p>
															Settings
															<i class="fas fa-angle-left right"></i>
														</p>
													</a>
													<ul class="nav nav-treeview">
														<li class="nav-item">
															<a href="?page=MyApp/profile" class="nav-link <?php if ($hal == 'MyApp/profile') {
																												echo 'active';
																											} ?>">
																&emsp13;&emsp13;&nbsp;<i class="nav-icon fas fa-user-cog"></i>
																<p>Profile</p>
															</a>
														</li>
													</ul>
												</li>

												<li class="nav-item">
													<a href="?page=MyApp/about" class="nav-link <?php if ($hal == 'MyApp/about') {
																									echo 'active';
																								} ?>">
														<i class="nav-icon fas fa-info-circle"></i>
														<p>
															About
														</p>
													</a>
												</li>

											<?php
										}
											?>

											<li class="nav-item">
												<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
													<i class="nav-icon far fa-circle text-danger"></i>
													<p>
														Logout
													</p>
												</a>
											</li>



										</nav>
										<!-- /.sidebar-menu -->
									</div>
									<!-- /.sidebar -->
								</aside>

								<!-- Content Wrapper. Contains page content -->
								<div class="content-wrapper">
									<!-- Content Header (Page header) -->
									<section class="content-header">
									</section>

									<!-- Main content -->
									<section class="content">
										<!-- /. WEB DINAMIS DISINI ############################################################################### -->
										<div class="container-fluid">


											<?php
											if (isset($_GET['page'])) {
												$hal = $_GET['page'];

												switch ($hal) {
														//Klik Halaman Home Pengguna
													case 'MyApp/admin':
														include "home/admin.php";
														break;
													case 'MyApp/karyawan':
														include "home/karyawan.php";
														break;


														//Pengguna
													case 'MyApp/data_pengguna':
														include "admin/pengguna/data_pengguna.php";
														break;
													case 'MyApp/add_pengguna':
														include "admin/pengguna/add_pengguna.php";
														break;
													case 'MyApp/edit_pengguna':
														include "admin/pengguna/edit_pengguna.php";
														break;
													case 'MyApp/del_pengguna':
														include "admin/pengguna/del_pengguna.php";
														break;
													case 'MyApp/about':
														include "admin/pengguna/about.php";
														break;
													case 'MyApp/profile':
														include "admin/pengguna/profile.php";
														break;

														//Data Kategori admin
													case 'i_data_k':
														include "data_admin/kategori/data_kas.php";
														break;
													case 'i_add_k':
														include "data_admin/kategori/add_kas.php";
														break;
													case 'i_edit_k':
														include "data_admin/kategori/edit_kas.php";
														break;
													case 'i_del_k':
														include "data_admin/kategori/del_kas.php";
														break;


														//Konter in admin
													case 'i_data_km':
														include "data_admin/konter/in/data_kas.php";
														break;
													case 'i_add_km':
														include "data_admin/konter/in/add_kas.php";
														break;
													case 'i_edit_km':
														include "data_admin/konter/in/edit_kas.php";
														break;
													case 'i_del_km':
														include "data_admin/konter/in/del_kas.php";
														break;

														//Konter in karyawan
													case 'i_data_kmk':
														include "karyawan/konter/in/data_kas.php";
														break;
													case 'i_add_kmk':
														include "karyawan/konter/in/add_kas.php";
														break;
														// case 'i_edit_kmk':
														// 	include "karyawan/konter/in/edit_kas.php";
														// 	break;
														// case 'i_del_kmk':
														// 	include "karyawan/konter/in/del_kas.php";
														// 	break;

														//Konter out admin
													case 'o_data_km':
														include "data_admin/konter/out/data_kas.php";
														break;
													case 'o_add_km':
														include "data_admin/konter/out/add_kas.php";
														break;
													case 'o_edit_km':
														include "data_admin/konter/out/edit_kas.php";
														break;
													case 'o_del_km':
														include "data_admin/konter/out/del_kas.php";
														break;

														//Konter out karyawan
													case 'o_data_kmk':
														include "karyawan/konter/out/data_kas.php";
														break;
													case 'o_add_kmk':
														include "karyawan/konter/out/add_kas.php";
														break;
														// case 'o_edit_kmk':
														// 	include "karyawan/konter/out/edit_kas.php";
														// 	break;
														// case 'o_del_kmk':
														// 	include "karyawan/konter/out/del_kas.php";
														// 	break;

													case 'rekap_km':
														include "data_admin/konter/rekap_kas.php";
														break;

													case 'rekap_kmk':
														include "karyawan/konter/rekap_kas.php";
														break;


														//lap kas konter pulsa
													case 'lap_pulsa':
														include "data_admin/laporan/lap_pulsa.php";
														break;

													case 'lap_pulsa2':
														include "data_admin/laporan/lap_pulsa2.php";
														break;

													case 'lap_pulsa3':
														include "data_admin/laporan/lap_pulsa3.php";
														break;

													case 'lap_pulsak':
														include "karyawan/laporan/lap_pulsa.php";
														break;

													case 'lap_pulsak2':
														include "karyawan/laporan/lap_pulsa2.php";
														break;

													case 'lap_pulsak3':
														include "karyawan/laporan/lap_pulsa3.php";
														break;


														//default
														//default
													default:
														echo "<center><h1> ERROR !</h1></center>";
														break;
												}
											} else {
												// Auto Halaman Home Pengguna
												if ($data_level == "Administrator") {
													include "home/admin.php";
												} elseif ($data_level == "Karyawan") {
													include "home/karyawan.php";
												}
											}
											?>


										</div>
									</section>
									<!-- /.content -->
								</div>
								<!-- /.content-wrapper -->

								<footer class="main-footer">
									<div class="float-right d-none d-sm-block">
										Konter Pulsa Devi Cell
									</div>
									Copyright &copy;
									<a target="_blank" href="https://www.facebook.com/">
										<strong> elseif software house</strong>
									</a>
									All rights reserved.
								</footer>

								<!-- Control Sidebar -->
								<aside class="control-sidebar control-sidebar-dark">
									<!-- Control sidebar content goes here -->
								</aside>
								<!-- /.control-sidebar -->
							</div>
							<!-- ./wrapper -->


							<!-- jQuery -->
							<script src="plugins/jquery/jquery.min.js"></script>
							<!-- Bootstrap 4 -->
							<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
							<!-- Select2 -->
							<script src="plugins/select2/js/select2.full.min.js"></script>
							<!-- DataTables -->
							<script src="plugins/datatables/jquery.dataTables.js"></script>
							<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
							<!-- AdminLTE App -->
							<script src="dist/js/adminlte.min.js"></script>
							<!-- AdminLTE for demo purposes -->
							<script src="dist/js/demo.js"></script>
							<!-- page script -->
							<script>
								$(function() {
									$('#example1').DataTable();
									$('#example2').DataTable({ // Data Kategori
										"paging": true,
										"lengthChange": false,
										"searching": true,
										"ordering": true,
										"columnDefs": [{
											"targets": [3], // column index
											"orderable": false
										}],
										"info": true,
										"autoWidth": false,
									});
									$('#example3').DataTable({ // Data Kategori
										"paging": true,
										"lengthChange": false,
										"searching": true,
										"ordering": true,
										"columnDefs": [{
											"targets": [3, 4, 5], // column index
											"orderable": false
										}],
										"info": true,
										"autoWidth": false,
									});
								});
							</script>

							<script>
								$(function() {
									//Initialize Select2 Elements
									$('.select2').select2()

									//Initialize Select2 Elements
									$('.select2bs4').select2({
										theme: 'bootstrap4'
									})
								})
							</script>

</body>

</html>