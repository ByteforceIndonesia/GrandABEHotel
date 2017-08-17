<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick-theme.css'?>">
<script src="<?php echo base_url() . JS_DIR . '/slick.min.js' ?>"></script>
<section id="headerBusinessandMeetings">
	<div class="row">
		<div class="col-lg-1">&nbsp</div>
		<div class="col-lg-5">
			<div class="panelHeaderBusinessMeetings">
				<h1>Business & Meetings</h1>
			</div>
		</div>
	</div>
</section>

<section id="headerBusiness">
	<div class="row">
		<div class="col-lg-12">
			<?php echo $bnm->ta_bnmPageDesc ?>
		</div>
	</div>
</section>

<section id="packages" class="container">
	<div class="package-scroller">
		<?php
			if(!empty($packages)){
				foreach($packages as $package){
		?>
			<div class="row">
				<div class="col-md-6 panel" style="padding-top:40px;">
					<div class="packageImage" 
					style="background-image:url('<?php echo base_url().'assets/images/uploads/packages/'.$package->image;?>');
						background-size: contain;
						background-repeat: no-repeat;
                        margin:auto;
                        max-width:1000px;
                        max-height:1000px;
					">
					
						&nbsp
					</div>
				</div>
				<div class="col-md-6 panel">
					<h1><?php echo $package->name?></h1>
					<?php echo $package->description?>
				</div>
			</div>


		<?php
				}
			}

		?>
	
	</div>
</section>

<section id="" class="container" style="
        margin-top: -50px;
        margin-bottom: 40px;
">
    <div class="">
        <div class="row">
            <div class="col-md-12 panel">
                <a href="<?php echo base_url().'assets/images/table_specs.png' ?>">
                    <div class=""
                         style="background-image:url('<?php echo base_url().'assets/images/table_specs.png' ?>');
                                 background-size: contain;
                                 background-repeat: no-repeat;
                                 max-width:580px;
                                 height:400px;
                                 margin:auto;
                                 ">
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section id="carousel">
    <div class="container">
        <div class="img-carousel">
            <?php foreach($images as $count => $image): ?>
                <?php if($count % 3 == 0): ?>
                    <div>
                <?php endif; ?>
                    <div class="col-sm-4 panel">
                        <div
                            style="background:url('<?php echo base_url() .'assets/images/uploads/bnmImages/' . $image->image ?>');" >

                        </div>
                    </div>
                <?php if(($count+1) % 3 == 0): ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<script>
    $(document).ready(function()
    {
        $('.img-carousel').slick({
            autoplay: true,
            autoplaySpeed: 5000,
        });

        $('.package-scroller').slick({
            autoplay: true,
            autoplaySpeed: 5000,
        });
    });
</script>