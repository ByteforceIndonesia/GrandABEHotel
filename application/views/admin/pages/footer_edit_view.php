<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	tinymce.init({
		selector:'.texteditor'
	});
</script>

<div class="row">
	<div class="col-lg-10 col-lg-offset-1">

		<div class="col-lg-12 text-center">
			<h1>Footer</h1>
		</div>

		<?php echo form_open('location/edit',array('class'=>'form-horizontal')); ?>
			<div class="form-group">
				<label for="ta_footerTitle" class="control-label col-sm-3">Footer Title:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control " id="ta_footerTitle" name="ta_footerTitle">
				</div>
				<?php echo form_error('ta_footerTitle','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="ta_footerContent" class="control-label col-sm-3">Footer Content:</label>
				<div class="col-sm-9">
					<textarea id="ta_footerContent" name="ta_footerContent" class="texteditor"></textarea>
				</div>
				<?php echo form_error('ta_footerContent','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="ta_addressContent" class="control-label col-sm-3">Address Content:</label>
				<div class="col-sm-9">
					<textarea id="ta_addressContent" name="ta_addressContent" class="texteditor"></textarea>
				</div>
				<?php echo form_error('ta_addressContent','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="ta_newsletterContent" class="control-label col-sm-3">Newsletter Content:</label>
				<div class="col-sm-9">
					<textarea id="ta_newsletterContent" name="ta_newsletterContent" class="texteditor"></textarea>
				</div>
				<?php echo form_error('ta_newsletterContent','<div style="color:red;">','</div>');?>
			</div>

		<?php echo form_submit('submit' , 'Save' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
	</div>

</div>
<hr>
<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-12 text-center">
			<h3>Contact Management</h3>
		</div>
		<table class="table table-hover table-bordered table-condensed">
			<tr>
				<td>
					Social Media
				</td>
				<td>
					Link
				</td>
				<td>
					Operations
				</td>
			</tr>
		</table>
		<div class="col-lg-12">
			<a href="<?php echo site_url('admin/footer/add');?>" class="btn btn-primary">
				Add Contact Info
			</a>
		</div>
	</div>
</div>

<br><br>