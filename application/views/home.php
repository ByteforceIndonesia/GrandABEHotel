<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Title -->
	<title><?php echo $page_title ?></title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'style.css' ?>">
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
	<nav class="navbar navbar-toggleable-lg navbar-inverse bg-faded" id="navigation">
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
	<div id="parallax" style="
		<?php if(!empty($main->background))
			echo 'background-image:url(\''. base_url() .'assets/images/uploads/background/'.$main->background.'\' );'
		?>
	">
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
					<div class="homeLine" name="homeLine">
						<?php echo $home->ta_landingScreen ?>
						<button id="btnLearn">Learn More</button>
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
						<div class="col-lg-7 col-md-12 panelBooking row">
							<div class="col-md-6 day">
								<center>
									<p>Check In</p>
									<input type="date" name="starting" id="starting" class="form-control" value="<?php echo date("Y-m-d"); ?>" required>
								</center>
							</div>
							<div class="col-md-6 month">
								<center>
									<p>Check Out</p>
									<input type="date" name="end" id="end" class="form-control" value="<?php echo date("Y-m-d"); ?>" required>
								</center>
							</div>
						</div>
						<div class="col-lg-5 col-md-12 formBook">
                            <input type="text" id= "name" name="name" placeholder="Name" class="form-control" <?php echo set_value('name');?>>
                            <br>
							<input type="text" id="email" name="email" placeholder="E-mail" class="form-control" <?php echo set_value('email');?>>
                            <select name="class" id="class" class="form-control">
                                <?php foreach($class as $room): ?>
                                    <option value="<?php echo $room->name ?>"><?php echo $room->name ?></option>
                                <?php endforeach; ?>
                            </select>
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
				<!--//DESIGN ini masih agak berantakan jona -->

				<div class="bedAbout"
					<?php if(!empty($home->upload_leftImage))
					echo 'style="background-image:url(\''. base_url() .'assets/images/uploads/leftImage/'.$home->upload_leftImage.'\' );"'
					?>
				>
					&nbsp
				</div>
			</div>
			<div class="col-lg-7 leftAbout row">
				<div class="col-lg-3">&nbsp</div>
				<div class="col-lg-6">
					<center>
						<div class="logoAbout">
							<img src="<?php if(!empty($main))echo base_url().'assets/images/uploads/logo/'.$main->logo?>" alt="" >
						</div>
						<h1>Grand ABE</h1>

						<?php echo $home->ta_ShortDesc?>
					</center>
				</div>
				<div class="col-lg-3">&nbsp</div>
			</div>
		</div>
	</section>

	<section id="pageFour">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 offset-lg-1">
				<div class="aboutUs">
					<h1>About Us</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="aboutUsParagraph">
					<?php echo $home->ta_aboutUs?>
				</div>
			</div>
		</div>
	</div>
	</section>
	<section id="pageFive">
		<div class="container">
			<div class="wrapMe row">
				<div class="col-lg-5">&nbsp</div>
				<div class="col-lg-6">
					<div class="whitePanel">
						<h1>Virtual <strong>Tour</strong></h1>
					</div>
					<div class="virtualTourButton">
						<button id="virtualTourBtn" onclick="window.location='<?php echo $home->ta_virtualTourLink?>';">
							Click Here
						</button>
					</div>
				</div>
				<div class="col-lg-1">&nbsp</div>
			</div>
		</div>
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
	$('#btnLearn').click(function() {
		$('html, body').animate({
        	scrollTop: $("#pageFour").offset().top
    	}, 1000);
	});

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