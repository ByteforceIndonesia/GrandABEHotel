<div class="row">
	<div class="col-lg-12">
	<?php echo form_open_multipart('admin/resto/resto_item_new') ?>
		<div class="form-group">
			<label for="name">Content</label>
			<textarea name="content" id="content" cols="30" rows="10" required class="form-control"></textarea>
		</div>

		<div class="form-group">
			<label for="image">Image</label>
			<input type="file" name="image" id="image" class="form-control" required>
		</div>

		<div class="form-group pull-right">
			<input type="submit" value="Submit" class="btn btn-primary">
		</div>
	</div>
	<?php echo form_close() ?>
</div>