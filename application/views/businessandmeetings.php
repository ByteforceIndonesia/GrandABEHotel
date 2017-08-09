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

<section id="packages">
	<div class="container">
		<?php
			if(!empty($packages)){
				foreach($packages as $package){
		?>
			<div class="row">
				<div class="col-xl-5">
					<div class="packageImage" 
					style="background-image:url('<?php echo base_url().'assets/images/uploads/packages/'.$package->image;?>');
						background-size: contain;
						background-repeat: no-repeat;
					">
					
						&nbsp
					</div>
				</div>
				<div class="col-xl-5">
					<h1><?php echo $package->name?></h1>
					<?php echo $package->description?>
				</div>
				<div class="col-xl-2">&nbsp</div>
			</div>


		<?php
				}
			}

		?>
	
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
    });
</script>