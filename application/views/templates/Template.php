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
	<nav id="navigation" class="navbar navbar-default">
		<div class="container-fluid">
		<div class="row">
			<div class="col-lg-10">
				<h1>Grand ABE <strong>Hotel</strong></h1>
			</div>
			<div class="col-lg-2">
				<img src="<?php echo base_url() . 'assets/images/logo.png'?>" alt="">
			</div>
		</div>
		<!-- For Mobile -->
			<div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <!-- <a class="navbar-brand" href="#">Grand ABE <strong>Hotel</strong></a> -->
		    </div>

		<!-- The real navbar lol -->
		    <div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="<?php echo base_url() ?>">Home</a>
					</li>
					<li>
						<a href="<?php echo base_url('rooms') ?>">Rooms</a>
					</li>
					<li>
						<a href="<?php echo base_url('businessandmeetings') ?>">Business & Meetings</a>
					</li>
					<li>
						<a href="<?php echo base_url('location') ?>">Location</a>
					</li>
					<li>
						<a href="<?php echo base_url('weddingsandbirthdays') ?>">Weddings and Birthdays</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Parallax -->
	<section id="firstPage">
		<div id="parallax"
		style="
		<?php if(!empty($main->background))
			echo 'style="background-image:url(\''. base_url() .'assets/images/uploads/background/'.$main->background.'\' );"'
		?>
		"
		>
			<div class="darkerFilter"></div>
		</div>
	</section>

	<section id="body">
		<?php echo $body ?>
	</section>

	<section id="footer">
		<div class="row">
			<div class="col-lg-5 leftPanel">

				<h4><?php echo $footer->ta_footerTitle?></h4>
				<?php echo $footer->ta_footerContent?>
			</div>
			<div class="col-lg-7 rightPanel row">
				<div class="col-lg-4">
					<h4>Address</h4>
					<?php echo $footer->ta_addressContent?>
					
				</div>
				<div class="col-lg-4">
					<h4>Newsletter</h4>
					<?php echo $footer->ta_newsletterContent?>
				</div>
				<div class="col-lg-4">
					<h4>Contact Us</h4>
					<?php foreach ($contacts as $contact) {
						echo '<a href="'.$contact->link.'"><p>'.$contact->socialmedia.'</p></a>';
					}?>
					
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