<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title><?php echo $page_title;?></title>

			<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'style.css' ?>">
			<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/bootstrap3/bootstrap.min.css' ?>">
			<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'jquery.bsPhotoGallery.css' ?>">
			<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . 'styleAdminPage.css' ?>">
			<script src="<?php echo base_url() . JS_DIR . 'jquery-3.1.1.min.js' ?>"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
			<script src="<?php echo base_url() . JS_DIR . '/bootstrap3/bootstrap.min.js' ?>"></script>
			<script src="<?php echo base_url() . JS_DIR . 'jquery.waypoints.js' ?>"></script>
			<script src="<?php echo base_url() . JS_DIR . 'fileinput.js' ?>"></script>
			<script src="<?php echo base_url() . JS_DIR . 'jquery.bsPhotoGallery.js' ?>"></script>
			<script src="<?php echo base_url().'assets/tinymce/jquery.tinymce.min.js'?>"></script>
			<script src="<?php echo base_url().'assets/tinymce/tinymce.min.js'?>"></script>

			<?php echo $before_head;?>
		</head>
	<body>
		<?php
			if($this->ion_auth->logged_in()) {
		?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="<?php echo site_url('admin');?>"><?php echo $this->config->item('cms_title');?></a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								Page Management
								<span class="caret"></span>
							</a>
						
							<ul class="dropdown-menu" role="menu">
								<li>
									<a href="<?php echo site_url('admin/mainsettings')?>">Main Settings</a>
								</li>

								<li class="divider"></li>
								<li>
									<a href="<?php echo site_url('admin/homepage')?>">Home</a>
								</li>
								<!-- <li class="divider"></li> -->

								<li>
									<a href="<?php echo site_url('admin/roompage')?>">Rooms</a>
								</li>
								<li>
									<a href="<?php echo site_url('admin/bnm')?>">Business & Meetings</a>
								</li>
								<li>
									<a href="<?php echo site_url('admin/location')?>">Location</a>
								</li>
								<li>
									<a href="<?php echo site_url('admin/wnb')?>">Weddings & Birthdays</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo site_url('admin/footer')?>">Footer</a>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<?php print_r($this->ion_auth->user()->row()->username);?> 
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<?php
									if($this->ion_auth->is_admin()){
								?>
									<li><a href="<?php echo site_url('admin/groups'); ?>">Groups</a></li>
									<li><a href="<?php echo site_url('admin/users'); ?>">Users</a></li>
								<?php
									}
								?>
								<li class="divider"></li>
								<li><a href="<?php echo site_url('admin/user/logout');?>">Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
		<?php
			if($this->session->flashdata('message'))
			{
		?>
			<div class="container" style="padding-top:40px;">
				<div class="alert alert-info alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $this->session->flashdata('message');?>
				</div>
			</div>

		<?php
			}
			}
		?>