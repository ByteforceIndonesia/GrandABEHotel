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
	<script src="<?php echo base_url() . JS_DIR . 'jquery.waypoints.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'main.js' ?>"></script>
	
</head>
<body>
<div class="wrapper">

	<nav id="navigation" class="navbar navbar-default">
		<div class="container-fluid">
		<!-- For Mobile -->
			<div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <!-- <a class="navbar-brand" href="#">Brand</a> -->
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
				</ul>
			</div>
		</div>
	</nav>

	<section id="firstPage">
	<div class="darkerFilter">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logoName">
						<h1>GRAND ABE <strong>HOTEL</strong></h1>
					</div>
				</div>
			</div>
		
			<div class="row">
				<div class="col-lg-5">
					&nbsp
				</div>
				<div class="col-lg-6">
					<div class="homeLine">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis, sem et accumsan convallis, sapien lectus consequat ante, ac placerat erat neque a nulla. Fusce pellentesque diam ante, at placerat velit vehicula gravida.
						</p>
						<button>Learn More</button>
					</div>
				</div>
				<div class="col-lg-1">
					&nbsp
				</div>
			</div>
		</div>
	</div>
	</section>

	<section id="pageTwo">
		<div id="booking">
			<div class="container">
				<center>
					<div class="bookingNow">
						<h1>
							GET YOUR <strong>BOOKING</strong> NOW
						</h1>
					</div>

					<!-- Jeff ini formnya kemana? -->
					<?php echo form_open('backendstuff') ?>
					<div class="bookingPanel">
						<div class="col-lg-8">
							<div class="col-lg-4 day">
								<center>
									<h5>DAY</h5>
									<div id="dayBig">
										01	
									</div>
									<select name="day" id="selectDay">
										<?php for($i = 1; $i<32; $i++): ?>
											<option value="<?php echo $i ?>">
												<?php echo $i; ?>
											</option>
										<?php endfor; ?>
									</select>
								</center>
							</div>
							<div class="col-lg-4 month">
								<center>
									<h5>MONTH</h5>
									<div id="monthBig">
										01	
									</div>
									<select name="month" id="selectMonth">
										<?php for($i = 1; $i<13; $i++): ?>
											<option value="<?php echo $i ?>">
												<?php echo $i; ?>
											</option>
										<?php endfor; ?>
									</select>
								</center>
							</div>
							<div class="col-lg-4 year">
								<center>
									<h5>YEAR</h5>
									<div id="yearBig">
										01	
									</div>
									<select name="year" id="selectYear">
										<?php for($i = 16; $i<20; $i++): ?>
											<option value="<?php echo $i . "'" ?>">
												<?php echo $i; ?>
											</option>
										<?php endfor; ?>
									</select>
								</center>
							</div>
						</div>
						<div class="col-lg-4 formBook">
							<input type="text" name="name" placeholder="Name">
							<br>
							<input type="text" name="email" placeholder="E-mail">
							<br>
							<input type="submit" value="Mail Me!">
						</div>
					</div>
					<?php echo form_close () ?>
				</center>
			</div>
		</div>
	</section>
	
	<section id="pageThree">
		<div class="row ">
			<div class="col-lg-5 leftAbout">
				<div class="bedAbout">
					&nbsp
				</div>
			</div>
			<div class="col-lg-7 leftAbout">
				<div class="col-lg-3">&nbsp</div>
				<div class="col-lg-6">
					<center>
						<div class="logoAbout">
							<img src="<?php echo base_url() ?>assets/images/logo.png" alt="">
						</div>
						<h1>Grand ABE</h1>
						<p><strong>Hotel</strong> adalah hotel berbintang tiga tertelak di area utama jalan abepura dan hanya berjarak 30 menit berkendara dari bandar utara setani.</p>
					</center>
				</div>
				<div class="col-lg-3">&nbsp</div>
			</div>
		</div>
	</section>

	<section id="pageFour">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="aboutUs">
					<h1>About Us</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="aboutUsParagraph">
				<p>
					Donec accumsan ultricies vehicula. Vestibulum malesuada egestas leo, vel iaculis magna vestibulum ac. Donec vitae posuere risus. Nullam rutrum elementum sollicitudin. Mauris gravida arcu dui, ac sollicitudin orci bibendum eget. Donec quis tincidunt lacus. Suspendisse scelerisque tellus vel nunc imperdiet, sed bibendum lacus consectetur. Pellentesque placerat egestas imperdiet. Nunc viverra sodales imperdiet. Praesent et erat ornare, hendrerit dolor et, pretium dui. Integer tristique scelerisque risus, ut bibendum enim maximus id. Nam rhoncus ut enim vel eleifend.
				</p>

				<p>
					Donec accumsan ultricies vehicula. Vestibulum malesuada egestas leo, vel iaculis magna vestibulum ac. Donec vitae posuere risus. Nullam rutrum elementum sollicitudin. Mauris gravida arcu dui, ac sollicitudin orci bibendum eget. Donec quis tincidunt lacus. Suspendisse scelerisque tellus vel nunc imperdiet, sed bibendum lacus consectetur. Pellentesque placerat egestas imperdiet. Nunc viverra sodales imperdiet. Praesent et erat ornare, hendrerit dolor et, pretium dui. Integer tristique scelerisque risus, ut bibendum enim maximus id. Nam rhoncus ut enim vel eleifend.
				</p>
			</div>
		</div>
	</div>
	</section>

	<section id="pageFive">
		<div class="darkerFilter wrapMe">
			<div class="col-lg-5">&nbsp</div>
			<div class="col-lg-6">
				<div class="whitePanel">
					<h1>Virtual <strong>Tour</strong></h1>
				</div>
				<div class="virtualTourButton">
					<button id="virtualTourBtn">
						Click Here
					</button>
				</div>
			</div>
			<div class="col-lg-1">&nbsp</div>
		</div>
	</section>

	<section id="footer">
		<div class="row">
			<div class="col-lg-5 leftPanel">
				<h4>Footer Grand Abe</h4>
				<p>
					Donec accumsan ultricies vehicula. Vestibulum malesuada egestas leo, vel iaculis magna vestibulum ac. Donec vitae posuere risus. Nullam rutrum elementum sollicitudin. Mauris gravida arcu dui, ac sollicitudin orci bibendum eget. Donec quis tincidunt lacus. Suspendisse scelerisque tellus vel nunc imperdiet, sed bibendum lacus consectetur.
				</p>
			</div>
			<div class="col-lg-7 rightPanel">
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

<script>
	var navFixed = $('#pageTwo').waypoint(function(event, direction) 
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