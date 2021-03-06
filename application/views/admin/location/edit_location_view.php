<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	tinymce.init({
		selector:'#ta_locationDesc'
	});
</script>

<div class="container">
	<div class="col-lg-10 col-lg-offset-1">
		<div class="col-lg-12 text-center">
			<h3>Edit Location</h3>
		</div>
		<?php echo form_open_multipart('admin/location/editlocation/'.$location->id,array('class'=>'form-horizontal')); ?>

			<div class="form-group">
				<label for="ta_locationName" class="control-label col-sm-3">Location Name:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control " id="ta_locationName" name="ta_locationName"
					value="<?php echo set_value('ta_locationName', $location->name); ?>">
				</div>
				<?php echo form_error('ta_locationName','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="upload_location" class="control-label col-sm-3">Location Image:</label>
				<div class="col-sm-4">	
					<div class="input-group">
						<label class="input-group-btn">
							<span class="btn btn-default">
								Browse&hellip;  <input type="file" style="display: none;" id="upload_location" accept=".png,.jpg,.jpeg,.gif" name="upload_location">
							</span>
						</label>
						<input type="text" class="form-control" name="txtlocation" readonly
						value="<?php echo set_value('txtlocation', $location->image); ?>"
						>
					</div>
				</div>	
				<div class="col-sm-5" >
					<div class="imgDiv">
						<img src="<?php echo base_url().'assets/images/uploads/locations/'.$location->image?>" id="img_location" >
					</div>
				</div>
				<?php echo form_error('txtlocation','<div style="color:red;">','</div>');?>
				<?php echo form_error('upload_location','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for = "ta_locationDesc" class="control-label col-sm-3">Location Description:</label>
				<div class="col-sm-9">
					<textarea id="ta_locationDesc" name="ta_locationDesc">
						<?php echo set_value('ta_locationDesc', $location->description); ?>
					</textarea>
				</div>
				<?php echo form_error('ta_locationDesc','<div style="color:red;">','</div>');?>
			</div>

		<?php echo form_submit('submit' , 'Update' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
		<br>
		<br>
	</div>
</div>

<script type="text/javascript">
	document.getElementById('upload_location').onchange = function(e) {
		// Get the first file in the FileList object
		var imageFile = this.files[0];
		// get a local URL representation of the image blob
		var url = window.URL.createObjectURL(imageFile);
		// Now use your newly created URL!
		img_location.src = url;
	}
</script>