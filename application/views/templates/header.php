<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Admin Dashboard</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css" rel="stylesheet">
	<style>
		body {
			padding-top: 56px;
			background-color: #f8f9fa;
		}

		.navbar-dark.bg-dark {
			background-color: #6f42c1 !important;
			/* Soft purple */
		}

		.sidebar {
			position: fixed;
			top: 56px;
			bottom: 0;
			left: 0;
			z-index: 1000;
			padding: 20px;
			overflow-x: hidden;
			overflow-y: auto;
			border-right: 1px solid #dee2e6;
			background-color: #f3e8ff;
			/* Light purple */
		}

		.sidebar .nav-link.active {
			color: #fff;
			background-color: #6f42c1;
			/* Soft purple */
		}

		.main-content {
			margin-left: 240px;
			padding: 20px;
		}

		.btn-primary {
			background-color: #6f42c1;
			border-color: #6f42c1;
		}

		.btn-primary:hover {
			background-color: #5a379a;
			border-color: #5a379a;
		}

		.table thead {
			background-color: #6f42c1;
			color: #fff;
		}

		.dataTables_wrapper .dataTables_paginate .paginate_button {
			background-color: #6f42c1 !important;
			color: #fff !important;
		}

		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			background-color: #5a379a !important;
			color: #fff !important;
		}

		.dataTables_wrapper .dataTables_filter input {
			border: 1px solid #6f42c1;
		}

		.swal2-popup {
			font-size: 1rem !important;
			max-width: 400px !important;
			/* Adjust this value to make it smaller or larger */
			padding: 20px !important;
		}

		.alert-danger {
			color: #721c24;
			background-color: #f8d7da;
			border-color: #f5c6cb;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="#">Admin Dashboard</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<?php if ($this->session->userdata('user_id')) : ?>
					<li class="nav-item">
						<span class="navbar-text mr-3">
							<?php echo $this->session->userdata('user_name'); ?> (<?php echo ucfirst($this->session->userdata('user_role')); ?>)
						</span>
					</li>
					<li class="nav-item">
						<a class="nav-link btn-danger text-white" href="<?php echo site_url('AuthController/logout'); ?>">Logout</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>
	<div class="sidebar">
		<ul class="nav flex-column">
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('UserController'); ?>">Users</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('LaporanController'); ?>">Laporan</a>
			</li>
		</ul>
	</div>
	<div class="main-content">