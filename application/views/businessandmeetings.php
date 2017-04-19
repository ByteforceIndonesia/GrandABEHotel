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

<!-- DESIGN ini masih blom bener jona -->
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
		<div id="imgCarousel" class="carousel slide" data-ride="carousel" height="100%">
			<ol class="carousel-indicators">
		      <?php
		      	if(!empty($images)){
		      		echo '<li data-target="#imgCarousel" data-slide-to="0" class="active"></li>';
		      		for ($i=1; $i <count($images) ; $i++) { 
		      			echo'<li data-target="#imgCarousel" data-slide-to="'.$i.'"></li>';
		      		}
		      	}
		      ?>
   			</ol>
   			<!-- //DESIGN halp, gmbrnya bingung gw jona -->
			<div class="carousel-inner" role="listbox">
			<?php
				if(!empty($images))	{
					echo'
					<div class="item active" style="height:40vh;">
				
						<img src="'.base_url().'assets/images/uploads/bnmImages/'.$images[0]->image .'" style="height: 100%;" >
						
					</div>
					';
					for ($i=1; $i <count($images) ; $i++) { 
		      			echo '
		      				<div class="item" style="height:40vh;">
		      				
									<img src="'.base_url().'assets/images/uploads/bnmImages/'.$images[$i]->image .'" style="height: 100%;">
							
							</div>
		      			';
		      		}
				}
			?>
				<a class="left carousel-control" href="#imgCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#imgCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				</a>
   			</div>
		</div>
</section>