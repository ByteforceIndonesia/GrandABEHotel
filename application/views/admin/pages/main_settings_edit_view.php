<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="col-lg-12 text-center">
				<h1>Home</h1>
			</div>
			
			<br>

			<?php echo form_open_multipart('admin/mainsettings/edit',array('class'=>'form-horizontal')); ?>

			<div class="form-group">
				<label for="upload_logo" class="control-label col-sm-3">Logo:</label>
				<div class="col-sm-4">	
					<div class="input-group">
						<label class="input-group-btn">
							<span class="btn btn-default">
								Browse&hellip; <input type="file" style="display: none;" id="upload_logo" name="upload_logo"accept=".png">
							</span>
						</label>
						<input type="text" class="form-control" name="txtlogo" readonly
						value="<?php if(!empty($main)) echo set_value('txtlogo',$main->logo);?>">
					</div>
				</div>	
				<div class="col-sm-5" >
					<div class="imgDiv">
						<img src="
						<?php 
							if(!empty($main)) echo base_url().'assets/images/uploads/logo/'.$main->logo;
							else echo base_url().'assets/images/img_placeholder.png';
						?>" id="img_logo" >
					</div>
				</div>
				<?php echo form_error('txtlogo','<div style="color:red;">','</div>');?>
				<?php echo form_error('upload_logo','<div style="color:red;">','</div>');?>
			</div>

			<br>

			<div class="form-group">
				<label for="upload_bg" class="control-label col-sm-3">Main Background:</label>
				<div class="col-sm-4">
					<div class="input-group">
						<label class="input-group-btn">
							<span class="btn btn-default">
								Browse&hellip; <input type="file" style="display: none;" id="upload_bg" name="upload_bg" accept=".png,.jpg,.jpeg">
							</span>
						</label>
						<input type="text" class="form-control" name="txtbg" readonly
						value="<?php if(!empty($main)) echo set_value('upload_bg',$main->background);?>"
						>
					</div>
				</div>
				<div class="col-sm-5 " >
					<div class="imgDiv">
						<img src="
						<?php 
							if(!empty($main)) echo base_url().'assets/images/uploads/background/'.$main->background;
							else echo base_url().'assets/images/img_placeholder.png';
						?>"
						id="img_bg" >
					</div>
				</div>

				<?php echo form_error('txtbg','<div style="color:red;">','</div>');?>
				<?php echo form_error('upload_bg','<div style="color:red;">','</div>');?>
			</div>

			<br>

			<div class="form-group">
				<label for="ta_email" class="control-label col-sm-3">Reservation Email:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="ta_email" name="ta_email"
					value="<?php if(!empty($main)) echo set_value('ta_email', $main->email); ?>"
					>
				</div>
				<?php echo form_error('ta_email','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="ta_password" class="control-label col-sm-3">Email Password:</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="ta_password" name="ta_password">
				</div>
				<?php echo form_error('ta_password','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="ta_cpassword" class="control-label col-sm-3">Confirm Password:</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="ta_cpassword" name="ta_cpassword">
				</div>
				<?php echo form_error('ta_cpassword','<div style="color:red;">','</div>');?>
			</div>
			

			<?php echo form_submit('submit' , 'Save' , 'class="btn btn-primary col-lg-offset-3"');?>
			<?php echo form_close();?>

			<br><br>

<script type="text/javascript">
	document.getElementById('upload_bg').onchange = function(e) {
		// Get the first file in the FileList object
		var imageFile = this.files[0];
		// get a local URL representation of the image blob
		var url = window.URL.createObjectURL(imageFile);
		// Now use your newly created URL!
		img_bg.src = url;
	}

	document.getElementById('upload_logo').onchange = function(e) {
		// Get the first file in the FileList object
		var imageFile = this.files[0];
		// get a local URL representation of the image blob
		var url = window.URL.createObjectURL(imageFile);
		// Now use your newly created URL!
		img_logo.src = url;
	}
</script>