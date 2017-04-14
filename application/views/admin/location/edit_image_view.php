<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
	<div class="col-lg-10 col-lg-offset-1">
		<div class="col-lg-12 text-center">
			<h3>Add Photo</h3>
		</div>
		<?php echo form_open_multipart('admin/location/editPhoto/'.$photo->id,array('class'=>'form-horizontal')); ?>

			<div class="form-group">
				<label for="upload_photo" class="control-label col-sm-3">Photo:</label>
				<div class="col-sm-4">	
					<div class="input-group">
						<label class="input-group-btn">
							<span class="btn btn-default">
								Browse&hellip; <input type="file" style="display: none;" id="upload_photo" name="upload_photo" accept=".png,.jpg,.jpeg">
							</span>
						</label>
						<input type="text" class="form-control" name="txtphoto" readonly
						value="<?php echo set_value('txtphoto', $photo->photo); ?>"
						>
					</div>
				</div>	
				<div class="col-sm-5" >
					<div class="imgDiv">
						<img src="<?php echo base_url().'assets/images/uploads/locationPhotos/'.$photo->photo?>" id="img_photo" >
					</div>
				</div>
				<?php echo form_error('txtphoto','<div style="color:red;">','</div>');?>
				<?php echo form_error('upload_photo','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="ta_photoTitle" class="control-label col-sm-3">Photo Title:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control " id="ta_photoTitle" name="ta_photoTitle"
					value="<?php echo set_value('ta_photoTitle', $photo->title); ?>"
					>
				</div>
				<?php echo form_error('ta_photoTitle','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="ta_photoCaption" class="control-label col-sm-3">Photo Caption:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control " id="ta_photoCaption" name="ta_photoCaption"
					value="<?php echo set_value('ta_photoCaption', $photo->caption); ?>"
					>
				</div>
				<?php echo form_error('ta_photoCaption','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="ta_photoLink" class="control-label col-sm-3">Photo Link:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control " id="ta_photoLink" name="ta_photoLink"
					value="<?php echo set_value('ta_photoLink', $photo->link); ?>"
					>
				</div>
				<?php echo form_error('ta_photoLink','<div style="color:red;">','</div>');?>
			</div>
			
		<?php echo form_submit('submit' , 'Add' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
		<br>
		<br>
	</div>
</div>