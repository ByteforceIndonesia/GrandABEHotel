<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	tinymce.init({
		selector:'#ta_landingScreen'
	});

	tinymce.init({
		selector:'#ta_aboutUs'
	});
</script>

	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="col-lg-12 text-center">
				<h1>Home</h1>
			</div>
			
			<br>

			<?php echo form_open('homepage/edit',array('class'=>'form-horizontal')); ?>
				<div class="form-group">
					<label class="control-label col-sm-3" for="ta_landingScreen">Landing Screen:</label>
					<div class="col-sm-9">
						<textarea id="ta_landingScreen" name = "ta_landingScreen"></textarea>
					</div>
					<?php echo form_error('ta_landingScreen','<div style="color:red;">','</div>');?>
				</div>

				<br>

				<div class="form-group">
					<label for="upload_bg" class="control-label col-sm-3">Landing Screen background:</label>
					<div class="col-sm-4">
						<div class="input-group">
							<label class="input-group-btn">
								<span class="btn btn-default">
									Browse&hellip; <input type="file" style="display: none;" multiple id="upload_bg" name="upload_bg">
								</span>
							</label>
							<input type="text" class="form-control" readonly>
						</div>
					</div>
					<div class="col-sm-5 " >
						<div class="imgDiv">
							<img src="<?php echo base_url() ?>assets/images/img_placeholder.png" id="img_bg" >
						</div>
					</div>
					<?php echo form_error('upload_bg','<div style="color:red;">','</div>');?>
				</div>

				<br>

				<div class="form-group">
					<label for="upload_logo" class="control-label col-sm-3">Logo:</label>
					<div class="col-sm-4">	
						<div class="input-group">
							<label class="input-group-btn">
								<span class="btn btn-default">
									Browse&hellip; <input type="file" style="display: none;" multiple id="upload_logo" name="upload_logo">
								</span>
							</label>
							<input type="text" class="form-control" readonly>
						</div>
					</div>	
					<div class="col-sm-5" >
						<div class="imgDiv">
							<img src="<?php echo base_url() ?>assets/images/img_placeholder.png" id="img_logo" >
						</div>
					</div>
					<?php echo form_error('upload_logo','<div style="color:red;">','</div>');?>
				</div>

				
				
				<br>
				<div class="form-group">
					<label for = "ta_aboutUs" class="control-label col-sm-3">About Us:</label>
					<div class="col-sm-9">
						<textarea id="ta_aboutUs" name="ta_aboutUs"></textarea>
					</div>
					<?php echo form_error('ta_aboutUs','<div style="color:red;">','</div>');?>
				</div>

				<br>

				<div class="form-group">
					<label for="ta_virtualTourLink" class="control-label col-sm-3">Virtual Tour Link:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control " id="ta_virtualTourLink" name="ta_virtualTourLink">
					</div>
					<?php echo form_error('ta_virtualTourLink','<div style="color:red;">','</div>');?>
				</div>

			<?php echo form_submit('submit' , 'Save' , 'class="btn btn-primary col-lg-offset-3"');?>
			<?php echo form_close();?>
		</div>
		
	</div>

	<br><br>