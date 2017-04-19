<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
	<div class="col-lg-10 col-lg-offset-1">
		<div class="col-lg-12 text-center">
			<h3>Add Contact Info</h3>
		</div>
		<?php echo form_open('admin/footer/addContact',array('class'=>'form-horizontal')); ?>


			<div class="form-group">
				<label for="ta_socialMedia" class="control-label col-sm-3">Social Media:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control " id="ta_socialMedia" name="ta_socialMedia">
				</div>
				<?php echo form_error('ta_socialMedia','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="ta_link" class="control-label col-sm-3">Link:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control " id="ta_link" name="ta_link">
				</div>
				<?php echo form_error('ta_link','<div style="color:red;">','</div>');?>
			</div>

		<?php echo form_submit('submit' , 'Add' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
		<br>
		<br>
	</div>
</div>