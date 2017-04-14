<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	tinymce.init({
		selector:'#ta_where'
	});
</script>

<div class="row">
	<div class="col-lg-10 col-lg-offset-1">

		<div class="col-lg-12 text-center">
			<h1>Location</h1>
		</div>

		<?php echo form_open('admin/location/edit',array('class'=>'form-horizontal')); ?>

			<div class="form-group">
				<label for="ta_where" class="control-label col-sm-3">Where Are We:</label>
				<div class="col-sm-9">
					<textarea id="ta_where" name="ta_where">
						<?php if(!empty($headerLocation)) echo set_value('ta_where', $headerLocation->ta_where); ?>
					</textarea>
				</div>
				<?php echo form_error('ta_where','<div style="color:red;">','</div>');?>
			</div>
		<?php echo form_submit('submit' , 'Save' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
	</div>

</div>
<hr>
<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-12 text-center">
			<h3>Tourist Attractions Management</h3>
		</div>
		<table class="table table-hover table-bordered table-condensed">
			<tr>
				<td>
					Location Name
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

			<?php
				if(!empty($locations)){
					foreach ($locations as $location ) {
						echo '<tr>';
						echo 
						'<td>'.$location->name.'</td>'.
						'<td><div class="imgDiv"><img src='. base_url().'assets/images/uploads/locations/'.$location->image.' id="img_location" ></div></td>'.
						'<td>'.$location->description.'</td>'.
						'<td>'.anchor('admin/location/editlocation/'.$location->id,'<span class="glyphicon glyphicon-pencil"></span>')
						.' '.anchor('admin/location/deleteLocation/'.$location->id,'<span class="glyphicon glyphicon-remove"></span>').'</td>';
					}
				}
			?>

		</table>
		<div class="col-lg-12">
			<a href="<?php echo site_url('admin/location/addlocation');?>" class="btn btn-primary">
				Add Location
			</a>
		</div>

	</div>

</div>

<div class="row">
	<div class="col-lg-12">
		<hr>
		<div class="col-lg-12 text-center">
			<h3>Gallery Management</h3>
		</div>
		<table class="table table-hover table-bordered table-condensed">
			<tr>
				<td>
					Photo
				</td>
				<td>
					Photo Title
				</td>
				<td>
					Caption
				</td>
				<td>
					Link
				</td>
				<td>
					Operations
				</td>
			</tr>

			<?php
				if(!empty($photos)){
					foreach ($photos as $photo ) {
						echo '<tr>';
						echo 
						'<td><div class="imgDiv"><img src='. base_url().'assets/images/uploads/locationPhotos/'.$photo->photo.' id="img_photo" ></div></td>'.
						'<td>'.$photo->title.'</td>'.
						'<td>'.$photo->caption.'</td>'.
						'<td>'.$photo->link.'</td>'.
						'<td>'.anchor('admin/location/editPhoto/'.$photo->id,'<span class="glyphicon glyphicon-pencil"></span>')
						.' '.anchor('admin/location/deletePhoto/'.$photo->id,'<span class="glyphicon glyphicon-remove"></span>').'</td>';
					}
				}
			?>

		</table>
		<div class="col-lg-12">
			<a href="<?php echo site_url('admin/location/addphoto');?>" class="btn btn-primary">
				Add Photo
			</a>
		</div>
		
	</div>
	
</div>
<br>
	<br>