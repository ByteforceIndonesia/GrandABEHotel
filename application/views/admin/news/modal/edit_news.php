<?php echo form_open_multipart('admin/news/edit') ?>
<div class="row">
	<div class="col-md-6">
		<h3>Title</h3>
		<br>
		<input type="text" name="title" id="title" class="form-control" value="<?php echo $datas->title ?>">
		<input type="hidden" name="id" value="<?php echo $datas->id ?>">
	</div>
	<div class="col-md-6">
		<h3>Category</h3>
		<br>
		<select name="category" id="category" class="form-control" required>
			<?php foreach($categories as $category): ?>
				<option 
					value="<?php echo $category->id ?>"
					<?php 
					if($datas->category_id == $category->id): ?>
						selected
					<?php endif; ?>
					class="form-control">
					<?php echo $category->name ?>
				</option>
			<?php endforeach; ?>
		</select>
		<br>
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
		<textarea name="content" id="content" cols="30" rows="10" class="form-control"><?php echo $datas->content ?></textarea>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-4 pull-right">
		<input type="submit" value="Edit" class="btn btn-primary">
	</div>
</div>
<?php echo form_close() ?>