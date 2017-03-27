<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	tinymce.init({
		selector:'#ta_locationDesc'
	});
</script>

<div class="container">
	<div class="col-lg-10 col-lg-offset-1">
		<div class="col-lg-12 text-center">
			<h3>Add Location</h3>
		</div>
		<?php echo form_open('admin/location/addlocation',array('class'=>'form-horizontal')); ?>

			<div class="form-group">
				<label for="ta_locationName" class="control-label col-sm-3">Location Name:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control " id="ta_locationName" name="ta_locationName">
				</div>
				<?php echo form_error('ta_locationName','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="upload_package" class="control-label col-sm-3">Location Image:</label>
				<div class="col-sm-4">	
					<div class="input-group">
						<label class="input-group-btn">
							<span class="btn btn-default">
								Browse&hellip; <input type="file" style="display: none;" multiple id="upload_location" name="upload_location">
							</span>
						</label>
						<input type="text" class="form-control" readonly>
					</div>
				</div>	
				<div class="col-sm-5" >
					<div class="imgDiv">
						<img src="<?php echo base_url() ?>assets/images/img_placeholder.png" id="img_room" >
					</div>
				</div>
				<?php echo form_error('upload_location','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for = "ta_locationDesc" class="control-label col-sm-3">Location Description:</label>
				<div class="col-sm-9">
					<textarea id="ta_locationDesc" name="ta_locationDesc"></textarea>
				</div>
				<?php echo form_error('ta_locationDesc','<div style="color:red;">','</div>');?>
			</div>

		<?php echo form_submit('submit' , 'Add' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
		<br>
		<br>
	</div>
</div>