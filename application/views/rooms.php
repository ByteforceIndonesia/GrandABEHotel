

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
		foreach ($rooms as $room) {
			echo'

	<div class="row room" id="superiorRoom">
		<div class="col-lg-6">
			<div class="picPanelRooms">
				<div class="imgRoom"
					style="background-image:url(\''. base_url().'assets/images/uploads/rooms/'.$room->image.'\');
					background-size:cover;"
				></div>
			</div>
		</div>
		<div class="col-lg-5">
			<div class="headerPanelRoomText">
				<h3>'. $room->name.'</h3>'.
				$room->description.
			'</div>
		</div>
	</div>

		';		
		}
	}
?>
</section>

