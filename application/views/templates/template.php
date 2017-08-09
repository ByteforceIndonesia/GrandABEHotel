<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Title -->
	<title><?php echo $page_title ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'styleNotHome.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'styleAdminPage.css' ?>">
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
		<!-- navbar -->
	<nav class="navbar navbar-toggleable-lg navbar-light bg-faded" id="navigation">
	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="toggleNav">
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
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Weddings and Events</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				          <a class="dropdown-item" href="<?php echo base_url('weddingsandevents') ?>#wedding">Wedding</a>
				          <a class="dropdown-item" href="<?php echo base_url('weddingsandevents') ?>#birthdays">Birthday</a>
				        </div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="restaurantDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Restaurant</a>
						<div class="dropdown-menu" aria-labelledby="restaurantDropDown">
				          <a class="dropdown-item" href="<?php echo base_url('restaurant') ?>#headresto">GRACIA CAFE & RESTO</a>
				          <a class="dropdown-item" href="<?php echo base_url('restaurant') ?>#headcake">CAKE & BAKERY SHOP</a>
				        </div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#"  id="locationDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Location</a>
						<div class="dropdown-menu" aria-labelledby="locationDropDown">
				          <a class="dropdown-item" href="<?php echo base_url('location') ?>#wherearewe">Maps</a>
				          <a class="dropdown-item" href="<?php echo base_url('location') ?>#headerTouristAttraction">Tourist Destinations</a>
				        </div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('news') ?>">News & Promotion</a>
					</li>
				</ul>
		</div>
	</nav>

	<!-- Parallax -->
	<section id="firstPage">
		<div id="parallax"
		style="
		<?php if(!empty($main->background))
			echo 'background-image:url(\''. base_url() .'assets/images/uploads/background/'.$main->background.'\' );'
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
					<?php foreach ($contacts as $contact): ?>
                        <a href="<?php echo $contact->link ?>" style="margin-right: 10px;">
                            <img src="<?php echo base_url() . 'assets/images/' . $contact->image ?>" alt="" width="40px">
                        </a>
                    <?php endforeach; ?>
                    <br><br>
                    <img src="<?php echo base_url() . 'assets/images/whatsapp.png' ?>" width="30px" alt="">&nbsp +628114825123
                    <br><br>
                    <img src="<?php echo base_url() . 'assets/images/phone.png' ?>" width="30px" alt=""> +628239977-2012/2017/2018
				</div>
			</div>
		</div>
	</section>
</div>
</body>
<script>
	$('#toggleNav').click(function(){
		if($('#navbar').hasClass('show'))
		{
			$('#navigation').removeClass('opened');
		}else
		{
			$('#navigation').addClass('opened');
		}
	});
</script>
</html>