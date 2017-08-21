<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick-theme.css'?>">
<script src="<?php echo base_url() . JS_DIR . '/slick.min.js' ?>"></script>

<section id="headerRooms">
    <div class="panelHeaderRooms">
        <div class="container">
            <h1 align="center">Guest <strong>Rooms</strong></h1>
            <br>
            <?php echo $headerRoom->ta_roomPageDesc; ?>
        </div>
    </div>
</section>

<section id="roomDetails">
<div class="container">
    <div class="row">
<?php
	if(!empty($rooms)){
		foreach ($rooms as $room): ?>

    <?php $thumbs = glob($room->image . '/*.{jpg,png,gif,jpeg}', GLOB_BRACE); ?>
    <div class="col-lg-4 col-md-6" id="superiorRoom">
        <div class="room">
		<div class="col-lg-12 room-img">
			<div class="picPanelRooms">
<!--                Deprecated-->
<!--				<div class="imgRoom"-->
<!--					style="background-image:url(\''. base_url().'assets/images/uploads/rooms/'.$room->image.'\');-->
<!--					background-size:cover;"-->
<!--				></div>-->
                <div class="sliderWrapper">
                    <?php foreach($thumbs as $count => $thumb): ?>
                        <img src="<?php echo base_url() . $thumb ?>" alt="">
                    <?php endforeach; ?>
			    </div>
            </div>
		</div>
		<div class="col-lg-12">
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
    </div>
</div>
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
