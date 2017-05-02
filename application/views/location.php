<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/component.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick-theme.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/magnific-popup.css'?>">
<script src="<?php echo base_url() . JS_DIR . '/classie.js' ?>"></script>
<script src="<?php echo base_url() . JS_DIR . '/modernizr.min.js' ?>"></script>
<script src="<?php echo base_url() . JS_DIR . '/photostack.js' ?>"></script>
<script src="<?php echo base_url() . JS_DIR . '/slick.min.js' ?>"></script>
<script src="<?php echo base_url() . JS_DIR . '/jquery.magnific-popup.min.js' ?>"></script>

<script>
$(document).ready(function(){
	
	var popUpId = 0;

	$('.locDes').each(function()
	{
		if($(this).html().length > 400)
		{
			var original = $(this).html();
			var text = original;

			text = text.substring(0, 400);
			last = text.lastIndexOf(" ");
			text = text.substring(0, last);

			$(this).html(text + '... <a class="popupclick" id="#' + popUpId +'" href="#' + popUpId +'">Read More</a>');

			$(this).parent().append('<div class="popup mfp-hide" id="'  + popUpId + '">' + original + '</div');

			popUpId++;
		}
	});

	for(var i=0; i<popUpId; i++)
	{
		$(".popupclick").magnificPopup({
			type:'inline',
			midClick: true
		});
	}

});
</script>


<section id="whereAreWe">
	<div class="row">
		<div class="col-xl-5">
			<div class="mapsWrapper">
				
			</div>
		</div>
		<div class="col-xl-5">
			<div class="rightSideMaps">
				<h1>Where Are We</h1>
				<?php echo $headerLocation->ta_where; ?>
			</div>
		</div>
	</div>
</section>

<!-- //DESIGN Probably trlalu ke bwh -->
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
	<?php
		if(!empty($locations)){
			foreach ($locations as $location) {
				// if the string is longer than 50 chars
				echo'
				<div class="row">
					<div class="col-lg-6 panel">
						<div class="touristLeft">
							<h1>'.$location->name.'</h1>'. 
							'<div class="locDes wordwrapper">'.$location->description.'</div>
						</div>
					</div>
					<div class="col-lg-6 panel">
						<div class="imageTourist" 
							 style="background:url(\''. base_url() .'assets/images/uploads/locations/' . $location->image.'\');
							 ">&nbsp</div>
					</div>
				</div>

				';
			}
		}
	?>

</section>

<section id="scattered">
	<section id="photostack-2" class="photostack photostack-start">
		<div>
			<?php 
				if(!empty($photos)){
					foreach ($photos as $photo) {
						echo'
							<figure>
								<a href="'.$photo->link.'" class="photostack-img"><img src="'. base_url ().'assets/images/uploads/locationPhotos/'.$photo->photo .'" alt="img01"/></a>
								<figcaption>
									<h2 class="photostack-title">'.$photo->title.'</h2>
									<div class="photostack-back">
										'.$photo->caption.'
									</div>
								</figcaption>
							</figure>			
						';


					}
				}

			?>
			
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
  		autoplaySpeed: 5000,
	  });
	});
</script>