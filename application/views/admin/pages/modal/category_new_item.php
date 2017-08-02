<div class="row">
	<div class="col-lg-12">
	<?php echo form_open_multipart('admin/resto/category_item_new') ?>
		<div class="form-group">
			<label for="name">Category Name</label>
			<input type="text" name="content" class="form-control">
		</div>
		<div class="form-group pull-right">
			<input type="submit" value="Submit" class="btn btn-primary">
		</div>
	</div>
	<?php echo form_close() ?>
</div>