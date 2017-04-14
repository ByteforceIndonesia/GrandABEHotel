<!-- //DESIGN LOL IDevenK jona -->
<section id="weddings">
	<div class="row">
		<div class="col-lg-6">
			<div class="row">
				<?php
					if(!empty($weddings)){
						foreach ($weddings as $wedding) {
				?>
					<div class="col-lg-6">
						<img src="<?php echo base_url().'assets/images/uploads/weddingImages/'.$wedding->image ?>" width="100%" >
					</div>
				<?php			
						}
					}
				?>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="panelWedding">
				<h1>Weddings</h1>
				<?php echo $header->ta_wedding?>				
			</div>
		</div>
	</div>
</section>

<section id="birthdays">
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-4">
			<div></div>
			<div class="panelBirthday">
				<h1>Birthdays</h1>
				<?php echo $header->ta_birthday?>	
			</div>
		</div>

		<div class="col-lg-6">
			<div class="row">
				<?php
					if(!empty($birthdays)){
						foreach ($birthdays as $birthday) {
				?>
					<div class="col-lg-6">
						<img src="<?php echo base_url().'assets/images/uploads/birthdayImages/'.$birthday->image ?>" width="100%" >
					</div>
				<?php			
						}
					}
				?>
			</div>
		</div>
	</div>
</section>