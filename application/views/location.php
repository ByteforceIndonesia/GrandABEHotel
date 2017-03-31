<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/component.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick-theme.css'?>">
<script src="<?php echo base_url() . JS_DIR . '/classie.js' ?>"></script>
<script src="<?php echo base_url() . JS_DIR . '/modernizr.min.js' ?>"></script>
<script src="<?php echo base_url() . JS_DIR . '/photostack.js' ?>"></script>
<script src="<?php echo base_url() . JS_DIR . '/slick.min.js' ?>"></script>

<section id="whereAreWe">
	<div class="row">
		<div class="col-xl-5">
			<div class="mapsWrapper">
				
			</div>
		</div>
		<div class="col-xl-5">
			<div class="rightSideMaps">
				<h1>Where Are We</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis, sem et accumsan convallis, sapien lectus consequat ante, ac placerat erat neque a nulla. Fusce pellentesque diam ante, at placerat velit vehicula gravida.
				</p>
			</div>
		</div>
	</div>
</section>

<section id="headerTouristAttraction">
	<div class="row">
		<div class="col-lg-6">&nbsp</div>
		<div class="col-lg-4">
			<div class="panelHeaderTouristAttraction">
				<h1>Tourist Attractions</h1>
			</div>
		</div>
	</div>
</section>

<section id="touristAttraction" class="container">
	<div class="row">
		<div class="leftSideTourist">
			<div class="touristLeft">
				<h1>Pantai APEL</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis, sem et accumsan convallis, sapien lectus consequat ante, ac placerat erat neque a nulla. Fusce pellentesque diam ante, at placerat velit vehicula gravida. Suspendisse pharetra ullamcorper laoreet. 
				</p>
			</div>
		</div>
		<div class="rightSideTourist">
			<div class="imageTourist" 
				 style="background:url('<?php echo base_url() . IMAGES_DIR . '/home_large.jpg' ?>')
				 ">&nbsp</div>
		</div>
	</div>

	<div class="row">
		<div class="leftSideTourist">
			<div class="touristLeft">
				<h1>Pantai Hotelkamp</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis, sem et accumsan convallis, sapien lectus consequat ante, ac placerat erat neque a nulla. Fusce pellentesque diam ante, at placerat velit vehicula gravida. Suspendisse pharetra ullamcorper laoreet. 
				</p>
			</div>
		</div>
		<div class="rightSideTourist">
			<div class="imageTourist" 
				 style="background:url('<?php echo base_url() . IMAGES_DIR . '/home_large.jpg' ?>')
				 ">&nbsp</div>
		</div>
	</div>
</section>

<section id="scattered">
	<section id="photostack-2" class="photostack photostack-start">
		<div>
			<figure>
				<a href="http://goo.gl/49lN3k" class="photostack-img"><img src="<?php echo base_url () . IMAGES_DIR ?>/scattered/1.jpg" alt="img01"/></a>
				<figcaption>
					<h2 class="photostack-title">Heaven of time</h2>
					<div class="photostack-back">
						<p>What might be right for you may not be right for some. And we know Flipper lives in a world full of wonder flying there-under under the sea.</p>
					</div>
				</figcaption>
			</figure>
			<figure>
				<a href="http://goo.gl/NJ1Dhf" class="photostack-img"><img src="<?php echo base_url () . IMAGES_DIR ?>/scattered/2.jpg" alt="img02"/></a>
				<figcaption>
					<h2 class="photostack-title">Speed Racer</h2>
				</figcaption>
			</figure>
			<figure data-shuffle-iteration="2">
				<a href="http://goo.gl/Qw3ND4" class="photostack-img"><img src="<?php echo base_url () . IMAGES_DIR ?>/scattered/3.jpg" alt="img03"/></a>
				<figcaption>
					<h2 class="photostack-title">Serenity Beach</h2>
					<div class="photostack-back">
						<p>I have never been to a place so serene in my entire life before. Swimming in clear waters opened my mind to nature and reminded me of my and <span>eveybody</span> everybody else's mortality.</p>
					</div>
				</figcaption>
			</figure>
		</div>
	</section>
</section>


<script>
	new Photostack( document.getElementById( 'photostack-2' ), {
		callback : function( item ) {
			//console.log(item)
		}
	} );
</script>

<script>
	$(document).ready(function(){
	  $('#touristAttraction').slick({
	  	autoplay: true,
  		autoplaySpeed: 2000,
	  });
	});
</script>