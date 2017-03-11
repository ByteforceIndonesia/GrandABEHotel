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
	<script src="<?php echo base_url() . JS_DIR . 'main.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'bootstrap.min.js' ?>"></script>
	
</head>
<body>
<div class="wrapper">
	<section id="firstPage">
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
	</section>

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
		
	</section>
</div>
</body>
</html>