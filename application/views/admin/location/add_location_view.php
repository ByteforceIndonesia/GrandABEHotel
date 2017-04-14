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
<<<<<<< HEAD
		<?php echo form_open_multipart('admin/location/addlocation',array('class'=>'form-horizontal')); ?>
=======
		<?php echo form_open('admin/location/addlocation',array('class'=>'form-horizontal')); ?>
>>>>>>> origin/master

			<div class="form-group">
				<label for="ta_locationName" class="control-label col-sm-3">Location Name:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control " id="ta_locationName" name="ta_locationName">
				</div>
				<?php echo form_error('ta_locationName','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
<<<<<<< HEAD
				<label for="upload_location" class="control-label col-sm-3">Location Image:</label>
=======
				<label for="upload_package" class="control-label col-sm-3">Location Image:</label>
>>>>>>> origin/master
				<div class="col-sm-4">	
					<div class="input-group">
						<label class="input-group-btn">
							<span class="btn btn-default">
<<<<<<< HEAD
								Browse&hellip;  <input type="file" style="display: none;" id="upload_location" accept=".png,.jpg,.jpeg,.gif" name="upload_location">
							</span>
						</label>
						<input type="text" class="form-control" name="txtlocation" readonly>
=======
								Browse&hellip; <input type="file" style="display: none;" multiple id="upload_location" name="upload_location">
							</span>
						</label>
						<input type="text" class="form-control" readonly>
>>>>>>> origin/master
					</div>
				</div>	
				<div class="col-sm-5" >
					<div class="imgDiv">
<<<<<<< HEAD
						<img src="<?php echo base_url() ?>assets/images/img_placeholder.png" id="img_location" >
					</div>
				</div>
				<?php echo form_error('txtlocation','<div style="color:red;">','</div>');?>
=======
						<img src="<?php echo base_url() ?>assets/images/img_placeholder.png" id="img_room" >
					</div>
				</div>
>>>>>>> origin/master
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
<<<<<<< HEAD
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
=======
</div>
>>>>>>> origin/master
