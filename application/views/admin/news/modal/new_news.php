<?php echo form_open_multipart('admin/news/new_news') ?>
<div class="row">
	<div class="col-md-6">
		<h3>Title</h3>
		<br>
		<input type="text" name="title" id="title" class="form-control">
	</div>
	<div class="col-md-6">
		<h3>Category</h3>
		<br>
		<select name="category" id="category" class="form-control">
			<?php foreach($categories as $category): ?>
				<option 
				value="<?php echo $category->id ?>">
					<?php echo $category->name ?>
				</option>
			<?php endforeach; ?>
		</select>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<h3>Image</h3>
		<br>
		<div class="input-group">
            <label class="input-group-btn">
                <span class="btn btn-primary">
                    Browse&hellip; <input type="file" style="display: none;" name="image">
                </span>
            </label>
            <input type="text" class="form-control" readonly>
        </div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<h3>Content</h3>
	</div>
	<div class="col-lg-12">
		<textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-4 pull-right">
		<input type="submit" value="Create New" class="btn btn-primary">
	</div>
</div>
<?php echo form_close() ?>