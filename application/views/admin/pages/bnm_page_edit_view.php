<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	tinymce.init({
		selector:'#ta_bnmPageDesc'
	});
</script>

<div class="row">
	<div class="col-lg-10 col-lg-offset-1">

		<div class="col-lg-12 text-center">
			<h1>Business & Meetings</h1>
		</div>

		<?php echo form_open('bnm/edit',array('class'=>'form-horizontal')); ?>

			<div class="form-group">
				<label for="ta_bnmPageDesc" class="control-label col-sm-3">Page Description:</label>
				<div class="col-sm-9">
					<textarea id="ta_bnmPageDesc" name="ta_bnmPageDesc"></textarea>
				</div>
				<?php echo form_error('ta_bnmPageDesc','<div style="color:red;">','</div>');?>
			</div>
		<?php echo form_submit('submit' , 'Save' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
	</div>

</div>
<hr>
<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-12 text-center">
			<h3>Package Management</h3>
		</div>
		<table class="table table-hover table-bordered table-condensed">
			<tr>
				<td>
					Package Name
				</td>
				<td>
					Image
				</td>
				<td>
					Description
				</td>
				<td>
					Operations
				</td>
			</tr>
		</table>
		<div class="col-lg-12">
			<a href="<?php echo site_url('admin/bnm/create');?>" class="btn btn-primary">
				Add Room
			</a>
		</div>
		<br>
		<br>
	</div>
</div>