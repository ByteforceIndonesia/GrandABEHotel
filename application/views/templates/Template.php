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
	<?php echo $body ?>
</body>
</html>