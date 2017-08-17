<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick-theme.css'?>">
<style>
    #body{
        background:#1B2021;
    }
</style>
<script src="<?php echo base_url() . JS_DIR . '/slick.min.js' ?>"></script>

<section id="headerRooms">
	<div class="row">
		<div class="col-lg-1">&nbsp</div>
		<div class="col-lg-5">
			<div class="panelHeaderRooms">
				<h1>Guest Rooms</h1>
				<?php echo $headerRoom->ta_roomPageDesc; ?>
			
			</div>
		</div>
	</div>
</section>

<section id="roomDetails">
<?php
	if(!empty($rooms)){
		foreach ($rooms as $room): ?>

    <?php $thumbs = glob($room->image . '/*.{jpg,png,gif,jpeg}', GLOB_BRACE); ?>
<div class="container">
    <div class="row room" id="superiorRoom">
		<div class="col-lg-5">
			<div class="picPanelRooms">
<!--                Deprecated-->
<!--				<div class="imgRoom"-->
<!--					style="background-image:url(\''. base_url().'assets/images/uploads/rooms/'.$room->image.'\');-->
<!--					background-size:cover;"-->
<!--				></div>-->
                <div class="sliderWrapper">
                    <?php foreach($thumbs as $count => $thumb): ?>
                    <div class="imgRoom"
                        style="background-image:url('<?php echo $thumb ?>');
                        background-size:100% 100%;"
                    ></div>
                    <?php endforeach; ?>
			    </div>
            </div>
		</div>
		<div class="col-lg-7">
			<div class="headerPanelRoomText">
				<h3><?php echo $room->name ?></h3>
				<?php echo $room->description ?>
			</div>
		</div>
	</div>
</div>
    <?php endforeach;
	}
?>
</section>

<script>
    $(document).ready(function(){
        $('.sliderWrapper').slick({
            autoplay: true,
            autoplaySpeed: 3500,
            arrows: false,
            fade: true
        });
    });
</script>
