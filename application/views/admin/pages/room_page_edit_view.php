<script type="text/javascript">
	tinymce.init({
		selector: '#ta_roomPageDesc'
	});
	
</script>

<div class="row">
	<div class="col-lg-10 col-lg-offset-1">

		<div class="col-lg-12 text-center">
			<h1>Room</h1>
		</div>

<<<<<<< HEAD
		<?php echo form_open('admin/roompage/edit',array('class'=>'form-horizontal')); ?>
=======
		<?php echo form_open('roompage/edit',array('class'=>'form-horizontal')); ?>
>>>>>>> origin/master

			<div class="form-group">
				<label for="ta_roomPageDesc" class="control-label col-sm-3">Page Description:</label>
				<div class="col-sm-9">
<<<<<<< HEAD
					<textarea id="ta_roomPageDesc" name="ta_roomPageDesc">
						<?php if(!empty($headerRoom)) echo set_value('ta_roomPageDesc', $headerRoom->ta_roomPageDesc); ?>
					</textarea>
					<?php echo form_error('ta_roomPageDesc','<div style="color:red;">','</div>');?>
=======
					<textarea id="ta_roomPageDesc" name="ta_roomPageDesc"></textarea>
>>>>>>> origin/master
				</div>
			</div>
		<?php echo form_submit('submit' , 'Save' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
	</div>

</div>
<hr>
<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-12 text-center">
			<h3>Room Management</h3>
		</div>
		<table class="table table-hover table-bordered table-condensed">
			<tr>
				<td>
					Room Name
				</td>
				<td>
					Image
				</td>
				<td>
					Description
				</td>
				<td>
					Operations
				</td>
			</tr>
<<<<<<< HEAD

			<?php
				if(!empty($rooms)){
					foreach ($rooms as $room ) {
						echo '<tr>';
						echo 
						'<td>'.$room->name.'</td>'.
						'<td><div class="imgDiv"><img src='. base_url().'assets/images/uploads/rooms/'.$room->image.' id="img_room" ></div></td>'.
						'<td>'.$room->description.'</td>'.
						'<td>'.anchor('admin/roompage/editRoom/'.$room->id,'<span class="glyphicon glyphicon-pencil"></span>')
						.' '.anchor('admin/roompage/deleteRoom/'.$room->id,'<span class="glyphicon glyphicon-remove"></span>').'</td>';
					}
				}
			?>

		</table>
		<div class="col-lg-12">
			<a href="<?php echo site_url('admin/roompage/createRoom');?>" class="btn btn-primary">
=======
		</table>
		<div class="col-lg-12">
			<a href="<?php echo site_url('admin/roompage/create');?>" class="btn btn-primary">
>>>>>>> origin/master
				Add Room
			</a>
		</div>
		<br>
		<br>
	</div>
</div>