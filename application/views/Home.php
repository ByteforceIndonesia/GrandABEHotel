<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Title -->
	<title><?php echo $page_title ?></title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'style.css' ?>">
	<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'bootstrap.min.css' ?>">

	<!-- JS -->
	<script src="<?php echo base_url() . JS_DIR . 'jquery-3.1.1.min.js' ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="<?php echo base_url() . JS_DIR . 'bootstrap.min.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'jquery.waypoints.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'main.js' ?>"></script>

</head>
<body>
<div class="wrapper">
	<!-- navbar -->
	<nav class="navbar navbar-toggleable-lg navbar-light bg-faded" id="navigation">
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
	<?php
			if($this->session->flashdata('mailMessage')&& $this->session->flashdata('mailMessageHeader'))
			{
		?>
				
			<div id = "mailModalBox" class="modal fade in" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="modal-title"><?php echo $this->session->flashdata('mailMessageHeader');?></h2>
						</div>
						<div class="modal-body">
							<p><?php echo $this->session->flashdata('mailMessage');?></p>
						</div>
					</div>
				</div>
			</div>

		<script type="text/javascript">
			$('#mailModalBox').modal('show');
		</script>	

		<?php
			}
		?>
	<section id="firstPage">
	<div id="parallax">
	</div>
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
					<?php echo form_open('email/mail') ?>
					<div class="bookingPanel row">
						<div class="col-lg-8 row">
							<div class="col-xl-4 day">
								<center>
									<h5>DAY</h5>
									<div>
										<label for="selectDay" id="dayBig">0</label>	
									</div>
									<select name="day" id="selectDay" <?php echo set_value('day');?> >
										<option value="0">-</option>
										<?php for($i = 1; $i<32; $i++): ?>
											<option value="<?php echo $i ?>">
												<?php echo $i; ?>
											</option>
										<?php endfor; ?>
									</select>
								</center>
							</div>
							<div class="col-xl-4 month">
								<center>
									<h5>MONTH</h5>
									<div>
										<label for="selectMonth" id="monthBig">0</label>	
									</div>
									<select name="month" id="selectMonth" <?php echo set_value('month');?> >
										<option value="0">-</option>
										<?php for($i = 1; $i<13; $i++): ?>
											<option value="<?php echo $i ?>">
												<?php echo $i; ?>
											</option>
										<?php endfor; ?>
									</select>
								</center>
							</div>
							<div class="col-xl-4 year">
								<center>
									<h5>YEAR</h5>
									<div>
										<label for="selectYear" id="yearBig">0</label>	
									</div>
									<select name="year" id="selectYear" <?php echo set_value('year');?>>
										<option value="0">-</option>
										<?php for($i = 16; $i<20; $i++): ?>
											<option value="<?php echo $i ?>">
												<?php echo $i; ?>
											</option>
										<?php endfor; ?>
									</select>
								</center>
							</div>
						</div>
						<div class="col-lg-4 formBook">
							<input type="text" id= "name" name="name" placeholder="Name" <?php echo set_value('name');?>>
							<br>
							<input type="text" id="email" name="email" placeholder="E-mail" <?php echo set_value('email');?>>
							<br>
							<input type="submit" id="submit" value="Mail Me!">
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
			<div class="col-lg-7 leftAbout row">
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
		<div class="darkerFilter wrapMe row">
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