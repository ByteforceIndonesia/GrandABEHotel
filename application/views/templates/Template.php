<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Title -->
	<title><?php echo $page_title ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'styleNotHome.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'bootstrap.min.css' ?>">

	<!-- JS -->
	<script src="<?php echo base_url() . JS_DIR . 'jquery-3.1.1.min.js' ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="<?php echo base_url() . JS_DIR . 'bootstrap.min.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'jquery.waypoints.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'main.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'parallax.min.js' ?>"></script>
	

</head>
<body>
<div class="wrapper">
		<nav class="navbar navbar-toggleable-lg navbar-light bg-faded bigLogoNav" id="navigation" >
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-10">
					<h1>Grand ABE <strong>Hotel</strong></h1>
				</div>
				<div class="col-lg-2">
					<img src="<?php echo base_url() . 'assets/images/logo.png'?>" alt="">
				</div>
			</div>
		<div class="row">
		  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
			  <div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav">
					<li class="active nav-item">
						<a class="nav-link" href="<?php echo base_url() ?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('rooms') ?>">Rooms</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('businessandmeetings') ?>">Business & Meetings</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('location') ?>">Location</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('weddingsandbirthdays') ?>">Weddings and Birthdays</a>
					</li>
				</ul>
			</div>
		</div>
		</div>
		</nav>

		<!-- navbar -->
	<nav class="navbar navbar-toggleable-lg navbar-light bg-faded noLogoNav" id="navigation">
	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <a class="navbar-brand" href="#">GRAND ABE <strong>HOTEL</strong></a>
		  <div class="collapse navbar-collapse" id="navbar">
			<ul class="navbar-nav">
				<li class="active nav-item">
					<a class="nav-link" href="<?php echo base_url() ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('rooms') ?>">Rooms</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('businessandmeetings') ?>">Business & Meetings</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('location') ?>">Location</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('weddingsandbirthdays') ?>">Weddings and Birthdays</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- Parallax -->
	<section id="firstPage">
		<div id="parallax">
			<div class="darkerFilter"></div>
		</div>
	</section>

	<section id="body">
		<?php echo $body ?>
	</section>

	<section id="footer">
		<div class="row">
			<div class="col-lg-5 leftPanel">
				<h4>Footer Grand Abe</h4>
				<p>
					Donec accumsan ultricies vehicula. Vestibulum malesuada egestas leo, vel iaculis magna vestibulum ac. Donec vitae posuere risus. Nullam rutrum elementum sollicitudin. Mauris gravida arcu dui, ac sollicitudin orci bibendum eget. Donec quis tincidunt lacus. Suspendisse scelerisque tellus vel nunc imperdiet, sed bibendum lacus consectetur.
				</p>
			</div>
			<div class="col-lg-7 rightPanel row">
				<div class="col-lg-4">
					<h4>Address</h4>
					<p>
						Donec accumsan ultricies vehicula. Vestibulum malesuada egestas leo, vel iaculis magna vestibulum ac. Donec vitae posuere risus. Nullam rutrum elementum sollicitudin.
					</p>
				</div>
				<div class="col-lg-4">
					<h4>Newsletter</h4>
					<p>Sign Up for latest news</p>
				</div>
				<div class="col-lg-4">
					<h4>Contact Us</h4>
					<p>FB</p>
					<p>Instagram</p>
				</div>
			</div>
		</div>
	</section>
</div>
</body>
</div>
</body>
<script>
	var navFixed = $('#body').waypoint(function(event, direction) 
	{
	  $('#navigation').toggleClass('fixed');
	  	if (direction == 'down')
		  $('#navbar').css({ 'height':nav.outerHeight() });
		else
		  $('#navbar').css({ 'height':'auto' })
	  ,{
	  	offset: function() {
		    return -(this.element.clientHeight + 300)
		  }
	  };	  
	});
</script>
</html>