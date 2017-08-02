<div class="row">
	<div class="col-lg-12">
		<h3>Category Name</h3>
	</div>
</div>
<br>
<?php echo form_open('admin/news/new_category') ?>
<div class="row">
	<div class="col-lg-8 col-offset-lg-2">
		<input type="text" name="category" id="category" class="form-control">
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-4 pull-right">
		<input type="submit" value="Create New" class="btn btn-primary">
	</div>
</div>
<?php echo form_close() ?>