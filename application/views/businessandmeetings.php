<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick-theme.css'?>">
<script src="<?php echo base_url() . JS_DIR . '/slick.min.js' ?>"></script>
<!--<section id="headerBusinessandMeetings">-->
<!--	<div class="row">-->
<!--		<div class="col-lg-1">&nbsp</div>-->
<!--		<div class="col-lg-5">-->
<!--			<div class="panelHeaderBusinessMeetings">-->
<!--				<h1>Business & Meetings</h1>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</section>-->

<section id="headerBusiness">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 paragraph">
                <h1 align="center">Business & Meetings</h1>
                <?php echo $bnm->ta_bnmPageDesc ?>
            </div>
        </div>
    </div>
</section>

<section id="packages" class="container">
	<div class="package-scroller">
		<?php
			if(!empty($packages)){
				foreach($packages as $count=>$package){
		?>
            <div class="col-lg-4 col-md-6 panel">
                <div class="block">
                    <div class="col-lg-12 img-full">
                        <img src="<?php echo base_url().'assets/images/uploads/packages/'.$package->image;?>" alt="">
                    </div>
                    <div class="col-lg-12 content">
                        <h1><?php echo $package->name?></h1>
                        <hr>
                        <?php echo $package->description?>
                    </div>
                </div>
            </div>
        <?php
				}
			}
		?>
	</div>
</section>

<section class="container">
    <div class="row">
        <div class="wrapper-specs">
            <div id="specs">
                <div class="col-lg-5 left-pane pane">
                    <a href="<?php echo base_url().'assets/images/table_specs.png' ?>">
                        <img src="<?php echo base_url().'assets/images/table_specs.png' ?>" alt="">
                    </a>
                </div>
                <div class="col-lg-7 right-pane pane">
                    <div>
                        <h3>Make Your Business Meeting Your Own</h3>
                        <hr>
                        <p>Customize your meeting space for your company needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="carousel">
    <div class="container">
        <div class="img-carousel">
            <?php foreach($images as $count => $image): ?>
                <div class="col-sm-4 panel">
                    <div
                        style="background:url('<?php echo base_url() .'assets/images/uploads/bnmImages/' . $image->image ?>');" >

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<script>
    $(document).ready(function()
    {
        var responsiveSettings = [
            {
                breakpoint: 992,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: true
                }
            }
        ];

        $('.img-carousel').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow:3,
            arrows:false,
            responsive:responsiveSettings
        });

        $('.package-scroller').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow:3,
            arrows:false,
            responsive:responsiveSettings
        });
    });
</script>