<script type="text/javascript">
	tinymce.init({
		selector: '#ta_roomPageDesc'
	});
	
</script>

<div class="row">
	<div class="col-lg-10 col-lg-offset-1">

		<div class="col-lg-12 text-center">
			<h1>Room</h1>
		</div>

		<?php echo form_open('roompage/edit',array('class'=>'form-horizontal')); ?>

			<div class="form-group">
				<label for="ta_roomPageDesc" class="control-label col-sm-3">Page Description:</label>
				<div class="col-sm-9">
					<textarea id="ta_roomPageDesc" name="ta_roomPageDesc"></textarea>
				</div>
			</div>
		<?php echo form_submit('submit' , 'Save' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
	</div>

</div>
<hr>
<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-12 text-center">
			<h3>Room Management</h3>
		</div>
		<table class="table table-hover table-bordered table-condensed">
			<tr>
				<td>
					Room Name
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
			<a href="<?php echo site_url('admin/roompage/create');?>" class="btn btn-primary">
				Add Room
			</a>
		</div>
		<br>
		<br>
	</div>
</div>