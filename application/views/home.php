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
    <link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick.css'?>">
    <link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick-theme.css'?>">

	<!-- JS -->
	<script src="<?php echo base_url() . JS_DIR . 'jquery-3.1.1.min.js' ?>"></script>
    <script src="<?php echo base_url() . JS_DIR . '/slick.min.js' ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="<?php echo base_url() . JS_DIR . 'bootstrap.min.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'jquery.waypoints.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'main.js' ?>"></script>
	<script src="<?php echo base_url() . JS_DIR . 'parallax.min.js' ?>"></script>

    <!--    Favicons-->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/images/favicons/') ?>apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('assets/images/favicons/') ?>apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/images/favicons/') ?>apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/images/favicons/') ?>apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/images/favicons/') ?>apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/images/favicons/') ?>apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assets/images/favicons/') ?>apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/images/favicons/') ?>apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/images/favicons/') ?>apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('assets/images/favicons/') ?>android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/images/favicons/') ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/images/favicons/') ?>favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicons/') ?>favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url('assets/images/favicons/') ?>manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url('assets/images/favicons/') ?>ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>
<body>

<div id="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrap">
                    <div class="input-top">
                        Check In :<br>
                        <input type="date" name="starting" id="starting" value="<?php echo date("Y-m-d"); ?>" required>
                    </div>
                    <div class="input-top">
                        Check Out :<br>
                        <input type="date" name="end" id="end" class="" value="<?php echo date("Y-m-d"); ?>" required>
                    </div>
                    <div class="input-top">
                        Name :<br>
                        <input type="text" id= "name" name="name" placeholder="Name" <?php echo set_value('name');?>>
                    </div>
                    <div class="input-top">
                        Email : <br>
                        <input type="text" id="email" name="email" placeholder="E-mail" <?php echo set_value('email');?>>
                    </div>
                    <div class="input-top">
                        Class : <br>
                        <select name="class" id="class">
                            <?php foreach($class as $room): ?>
                                <option value="<?php echo $room->name ?>"><?php echo $room->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="input-top">
                        <br>
                        <input type="submit" id="submit" value="Book Now!">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('joboffers') ?>">Job Opportunities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('contactus') ?>">Contact Us</a>
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

<!--    Depreceated per client's request 17 aug 2017-->
<!--	<section id="pageTwo">-->
<!--		<div id="booking">-->
<!--			<div class="container">-->
<!--				<center>-->
<!--					<div class="bookingNow">-->
<!--						<h1>-->
<!--							GET YOUR <strong>BOOKING</strong> NOW-->
<!--						</h1>-->
<!--					</div>-->
<!--					<!-- Jeff ini formnya kemana? -->
<!--					--><?php //echo form_open('email/mail') ?>
<!--					<div class="bookingPanel row">-->
<!--						<div class="col-lg-7 col-md-12 panelBooking row">-->
<!--							<div class="col-md-6 day">-->
<!--								<center>-->
<!--									<p>Check In</p>-->
<!--									<input type="date" name="starting" id="starting" class="form-control" value="--><?php //echo date("Y-m-d"); ?><!--" required>-->
<!--								</center>-->
<!--							</div>-->
<!--							<div class="col-md-6 month">-->
<!--								<center>-->
<!--									<p>Check Out</p>-->
<!--									<input type="date" name="end" id="end" class="form-control" value="--><?php //echo date("Y-m-d"); ?><!--" required>-->
<!--								</center>-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="col-lg-5 col-md-12 formBook">-->
<!--                            <input type="text" id= "name" name="name" placeholder="Name" class="form-control" --><?php //echo set_value('name');?><!-->
<!--                            <br>-->
<!--							<input type="text" id="email" name="email" placeholder="E-mail" class="form-control" --><?php //echo set_value('email');?><!-->
<!--                            <select name="class" id="class" class="form-control">-->
<!--                                --><?php //foreach($class as $room): ?>
<!--                                    <option value="--><?php //echo $room->name ?><!--">--><?php //echo $room->name ?><!--</option>-->
<!--                                --><?php //endforeach; ?>
<!--                            </select>-->
<!--							<br>-->
<!--							<input type="submit" id="submit" value="Mail Me!">-->
<!--						</div>-->
<!--					</div>-->
<!--					--><?php //echo form_close () ?>
<!--				</center>-->
<!--			</div>-->
<!--		</div>-->
<!--	</section>-->

    <?php if($main_slider):?>
    <section id="sliderPage">
        <div class="container">
            <div class="tagline-whats-new">
                <h1>What's <strong>New</strong> ?</h1>
            </div>
            <br><br>
            <div class="promo-slider">
                <?php foreach($main_slider as $slide): ?>
                    <div class="row">
                        <div class="col-lg-6 panel">
                            <img src="<?php echo base_url() . 'assets/images/uploads/promos/' . $slide->image ?>" alt="">
                        </div>
                        <div class="col-lg-6 panel">
                            <br>
                            <h3><?php echo $slide->title ?></h3>
                            <br>
                            <p><?php echo $slide->content ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $('.promo-slider').slick({
                autoplay: true,
                autoplaySpeed: 3500,
                arrows: false,
                fade: true
            });
        });
    </script>
    <?php endif; ?>


<!--    Deprecated per revision 16 aug 2017-->
<!--	<section id="pageThree">-->
<!--		<div class="row ">-->
<!--			<div class="col-lg-5 leftAbout">-->
<!--				<div class="bedAbout"-->
<!--					--><?php //if(!empty($home->upload_leftImage))
//					echo 'style="background-image:url(\''. base_url() .'assets/images/uploads/leftImage/'.$home->upload_leftImage.'\' );"'
//					?>
<!--				>-->
<!--					&nbsp-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="col-lg-7 leftAbout row">-->
<!--				<div class="col-lg-3">&nbsp</div>-->
<!--				<div class="col-lg-6">-->
<!--					<center>-->
<!--						<div class="logoAbout">-->
<!--							<img src="--><?php //if(!empty($main))echo base_url().'assets/images/uploads/logo/'.$main->logo?><!--" alt="" >-->
<!--						</div>-->
<!--						<h1>Grand ABE Hotel</h1>-->
<!---->
<!--						--><?php //echo $home->ta_ShortDesc?>
<!--					</center>-->
<!--				</div>-->
<!--				<div class="col-lg-3">&nbsp</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</section>-->

	<section id="pageFour">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="aboutUs">
					<h1>About Us</h1>
				</div>
			</div>
		</div>
		<div class="row">
            <div class="col-lg-3 offset-lg-1">
                <div class="logoAboutUs">
                    <div class="img-wrapper">
                        <img src="<?php if(!empty($main))echo base_url().'assets/images/uploads/logo/'.$main->logo?>" alt="" >
                    </div>
                </div>
            </div>
			<div class="col-lg-7">
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
                    <img src="<?php echo base_url() . 'assets/images/phone.png' ?>" width="30px" alt="">+628239977-&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp2012/2017/2018
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