<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	tinymce.init({
		selector:'#ta_landingScreen'
	});

	tinymce.init({
		selector:'#ta_aboutUs'
	});

	tinymce.init({
		selector:'#ta_ShortDesc'
	});
</script>

	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="col-lg-12 text-center">
				<h1>Home</h1>
			</div>
			
			<br>

			<?php echo form_open_multipart('admin/homepage/edit',array('class'=>'form-horizontal')); ?>
				<div class="form-group">
					<label class="control-label col-sm-3" for="ta_landingScreen">Landing Screen:</label>
					<div class="col-sm-9">
						<textarea id="ta_landingScreen" name = "ta_landingScreen">
							<?php if(!empty($home)) echo set_value('ta_landingScreen', $home->ta_landingScreen); ?>
						</textarea>
					</div>
					<?php echo form_error('ta_landingScreen','<div style="color:red;">','</div>');?>
				</div>

				<br>

				<div class="form-group">
					<label for="upload_leftImage" class="control-label col-sm-3">Left Image:</label>
					<div class="col-sm-4">	
						<div class="input-group">
							<label class="input-group-btn">
								<span class="btn btn-default">
									Browse&hellip; <input type="file" style="display: none;" id="upload_leftImage" name="upload_leftImage"accept=".png,.jpg,.jpeg">
								</span>
							</label>
							<input type="text" class="form-control" name="txtleftImage" readonly
								value="<?php if(!empty($home->upload_leftImage)) echo set_value('txtleftImage', $home->upload_leftImage); ?>"
							>
						</div>
					</div>	
					<div class="col-sm-5" >
						<div class="imgDiv">
							<img src="<?php if(!empty($home->upload_leftImage)) echo base_url().'assets/images/uploads/leftImage/'.$home->upload_leftImage?>" id="img_left" >
						</div>
					</div>
					<?php echo form_error('txtleftImage','<div style="color:red;">','</div>');?>
					<?php echo form_error('upload_leftImage','<div style="color:red;">','</div>');?>
				</div>

				<br>

				<div class="form-group">
					<label for = "ta_ShortDesc" class="control-label col-sm-3">Short Description:</label>
					<div class="col-sm-9">
						<textarea id="ta_ShortDesc" name="ta_ShortDesc">
							<?php if(!empty($home)) echo set_value('ta_ShortDesc', $home->ta_ShortDesc); ?>
						</textarea>
					</div>
					<?php echo form_error('ta_ShortDesc','<div style="color:red;">','</div>');?>
				</div>

				<br>

				<div class="form-group">
					<label for = "ta_aboutUs" class="control-label col-sm-3">About Us:</label>
					<div class="col-sm-9">
						<textarea id="ta_aboutUs" name="ta_aboutUs">
							<?php if(!empty($home)) echo set_value('ta_aboutUs', $home->ta_aboutUs); ?>
						</textarea>
					</div>
					<?php echo form_error('ta_aboutUs','<div style="color:red;">','</div>');?>
				</div>

				<br>

				<div class="form-group">
					<label for="upload_virtualBg" class="control-label col-sm-3">Virtual Link Background:</label>
					<div class="col-sm-4">
						<div class="input-group">
							<label class="input-group-btn">
								<span class="btn btn-default">
									Browse&hellip; <input type="file" style="display: none;" id="upload_virtualBg" name="upload_virtualBg" accept=".png,.jpg,.jpeg">
								</span>
							</label>
							<input type="text" class="form-control" name="txtvirtualBg" readonly
								value="<?php if(!empty($home->upload_virtualBg)) echo set_value('txtvirtualBg', $home->upload_virtualBg); ?>"
							>
						</div>
					</div>
					<div class="col-sm-5 " >
						<div class="imgDiv">
							<img src="<?php if(!empty($home->upload_virtualBg)) echo base_url().'assets/images/uploads/virtualBackground/'.$home->upload_virtualBg?>" id="img_virtual" >
						</div>
					</div>
					<?php echo form_error('txtvirtualBg','<div style="color:red;">','</div>');?>
					<?php echo form_error('upload_virtualBg','<div style="color:red;">','</div>');?>
				</div>
				
				<br>

				<div class="form-group">
					<label for="ta_virtualTourLink" class="control-label col-sm-3">Virtual Tour Link:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="ta_virtualTourLink" name="ta_virtualTourLink"
						value="<?php if(!empty($home)) echo set_value('ta_virtualTourLink', $home->ta_virtualTourLink); ?>"
						>
					</div>
					<?php echo form_error('ta_virtualTourLink','<div style="color:red;">','</div>');?>
				</div>

			<?php echo form_submit('submit' , 'Save' , 'class="btn btn-primary col-lg-offset-3"');?>
			<?php echo form_close();?>
		</div>
		
	</div>

	<br><br>

<script type="text/javascript">
	document.getElementById('upload_virtualBg').onchange = function(e) {
		// Get the first file in the FileList object
		var imageFile = this.files[0];
		// get a local URL representation of the image blob
		var url = window.URL.createObjectURL(imageFile);
		// Now use your newly created URL!
		img_virtual.src = url;
	}

	document.getElementById('upload_leftImage').onchange = function(e) {
		// Get the first file in the FileList object
		var imageFile = this.files[0];
		// get a local URL representation of the image blob
		var url = window.URL.createObjectURL(imageFile);
		// Now use your newly created URL!
		img_left.src = url;
	}
</script>