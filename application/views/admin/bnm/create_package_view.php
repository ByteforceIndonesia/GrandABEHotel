<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	tinymce.init({
		selector:'#ta_packageDesc'
	});
</script>

<div class="container">
	<div class="col-lg-10 col-lg-offset-1">
		<div class="col-lg-12 text-center">
			<h3>Add Package</h3>
		</div>
		<?php echo form_open_multipart('admin/bnm/createPackage',array('class'=>'form-horizontal')); ?>

			<div class="form-group">
				<label for="ta_packageName" class="control-label col-sm-3">Package Name:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control " id="ta_packageName" name="ta_packageName">
				</div>
				<?php echo form_error('ta_packageName','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="upload_package" class="control-label col-sm-3">Package Image:</label>
				<div class="col-sm-4">	
					<div class="input-group">
						<label class="input-group-btn">
							<span class="btn btn-default">
								Browse&hellip; <input type="file" style="display: none;" id="upload_package" accept=".png,.jpg,.jpeg,.gif" name="upload_package">
							</span>
						</label>
						<input type="text" class="form-control" name="txtpackage" readonly>
					</div>
				</div>	
				<div class="col-sm-5" >
					<div class="imgDiv">
						<img src="<?php echo base_url() ?>assets/images/img_placeholder.png" id="img_package" >
					</div>
				</div>
				<?php echo form_error('txtpackage','<div style="color:red;">','</div>');?>
				<?php echo form_error('upload_package','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for = "ta_packageDesc" class="control-label col-sm-3">Room Description:</label>
				<div class="col-sm-9">
					<textarea id="ta_packageDesc" name="ta_packageDesc"></textarea>
				</div>
				<?php echo form_error('ta_packageDesc','<div style="color:red;">','</div>');?>
			</div>

		<?php echo form_submit('submit' , 'Add' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
		<br>
		<br>
	</div>
</div>

<script type="text/javascript">
	document.getElementById('upload_package').onchange = function(e) {
		// Get the first file in the FileList object
		var imageFile = this.files[0];
		// get a local URL representation of the image blob
		var url = window.URL.createObjectURL(imageFile);
		// Now use your newly created URL!
		img_package.src = url;
	}
</script>