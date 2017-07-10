<style>
	.old-image
	{
		max-width: 100%;
	}

	.submit-btn
	{
		margin-top: 20px;
		margin-bottom: 10px;
	}
</style>
<div class="row">
	<div class="col-md-6">
		<img src="<?php echo base_url() . 'assets/' . $link ?>" alt="" class="old-image">
	</div>
	<div class="col-md-6">
	<?php echo form_open_multipart('admin/resto/item_change_image/' . $type . '/' . $id) ?>
		<div class="form-group">
			<div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        Browse&hellip; <input type="file" name="new-image" style="display: none;" multiple>
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
            <div class="input-group">
            	<input type="submit" value="Upload" class="submit-btn btn btn-primary">
            </div>
		</div>
	<?php echo form_close() ?>
	</div>
</div>