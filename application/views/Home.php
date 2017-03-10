<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Title -->
	<title><?php echo $page_title ?></title>

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'style.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'bootstrap.min.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'bootstrap-theme.min.css' ?>">

	<!-- JS -->
	<script src="<?php echo base_url() . JS_DIR . 'jquery-3.1.1.min.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'bootstrap.min.js' ?>"></script>
	
</head>
<body>
	
	<div class="container-fluid">
		<nav>
			<ul class="navigation">
				<li>
					<a href="<?php echo base_url() ?>">Home</a>
				</li>
				<li>
					<a href="<?php echo base_url('rooms') ?>">Rooms</a>
				</li>
			</ul>
		</nav>
	</div>

	<section id="firstPage">
		<div class="container-fluid">
			<h1></h1>
		</div>
	</section>

</body>
</html>