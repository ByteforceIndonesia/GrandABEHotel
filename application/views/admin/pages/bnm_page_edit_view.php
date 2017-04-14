<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	tinymce.init({
		selector:'#ta_bnmPageDesc'
	});
</script>
<<<<<<< HEAD
<style type="text/css">
	.gallery{
	    padding:0 0 0 0;
	    margin:0 0 40px 0;
	}

	.gallery li {
	    list-style:none;
	    margin-bottom:10px;
	}

	.gallery input{
	    margin-bottom:10px;
	    padding:12px;
	    
	}
</style>

=======
>>>>>>> origin/master

<div class="row">
	<div class="col-lg-10 col-lg-offset-1">

		<div class="col-lg-12 text-center">
			<h1>Business & Meetings</h1>
		</div>

<<<<<<< HEAD
		<?php echo form_open('admin/bnm/edit',array('class'=>'form-horizontal')); ?>
=======
		<?php echo form_open('bnm/edit',array('class'=>'form-horizontal')); ?>
>>>>>>> origin/master

			<div class="form-group">
				<label for="ta_bnmPageDesc" class="control-label col-sm-3">Page Description:</label>
				<div class="col-sm-9">
<<<<<<< HEAD
					<textarea id="ta_bnmPageDesc" name="ta_bnmPageDesc">
						<?php if(!empty($bnm)) echo set_value('ta_bnmPageDesc', $bnm->ta_bnmPageDesc); ?>
					</textarea>
=======
					<textarea id="ta_bnmPageDesc" name="ta_bnmPageDesc"></textarea>
>>>>>>> origin/master
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
<<<<<<< HEAD

			<?php
				if(!empty($packages)){
					foreach ($packages as $package ) {
						echo '<tr>';
						echo 
						'<td>'.$package->name.'</td>'.
						'<td><div class="imgDiv"><img src='. base_url().'assets/images/uploads/packages/'.$package->image.' id="img_package" ></div></td>'.
						'<td>'.$package->description.'</td>'.
						'<td>'.anchor('admin/bnm/editPackage/'.$package->id,'<span class="glyphicon glyphicon-pencil"></span>')
						.' '.anchor('admin/bnm/deletePackage/'.$package->id,'<span class="glyphicon glyphicon-remove"></span>').'</td>';


					}
				}
			?>

		</table>
		<div class="col-lg-12">
			<a href="<?php echo site_url('admin/bnm/createPackage');?>" class="btn btn-primary">
				Add Package
			</a>
		</div>
	</div>
</div>

<hr>

<div class="row">
	<div class="col-lg-12 text-center">
		<h3>Images Gallery</h3>
	</div>
	<?php
		if(!empty($images)){
	?>
	<div class="col-lg-12">
		<?php echo form_open('admin/bnm/deleteImages',array('class'=>'form-horizontal')); ?>
			

	<?php
				foreach ($images as $image) {
	?>
				<ul class="gallery">
					<li>
						<img src="<?php echo base_url().'assets/images/uploads/bnmImages/'.$image->image?>">
						<center>
							<input type="checkbox" name="checkedImages[]" value="<?php echo $image->id?>">
						</center>
					</li>
				</ul>
	<?php						
				}
	?>
			
			<div class="col-lg-12">	
				<?php echo form_submit('submit' , 'Delete' , 'class="btn btn-primary "');?>
			</div>
			<?php echo form_close();?>
	<?php
		}
		else{
	?>
		<center>
			<p>No Images Yet</p>
		</center>
	<?php		
		}
	?>
		
	</div>
</div>

<br>
<br>

<div class="row">
	<div class="col-lg-12">
		<?php echo form_open_multipart('admin/bnm/addImages',array('class'=>'form-horizontal')); ?>
		<div class="form-group">
			<label for="upload_image" class="control-label col-sm-3">Add Photo:</label>
			<div class="col-sm-4">	
				<div class="input-group">
					<label class="input-group-btn">
						<span class="btn btn-default">
							Browse&hellip; <input type="file" style="display: none;" id="upload_image" name="upload_images[]" multiple accept=".png,.jpg,.jpeg,.gif">
						</span>
					</label>
					<input type="text" class="form-control" name="txtimage" readonly>
				</div>
			</div>	
			<div class="col-sm-6" >
				<span>Multiple files allowed.</span>
			</div>
			<?php echo form_error('txtimage','<div style="color:red;">','</div>');?>
			<?php echo form_error('upload_images[]','<div style="color:red;">','</div>');?>
		</div>
		<?php echo form_submit('submit' , 'Add' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
	</div>
</div>

<br>
<br>

<script type="text/javascript">
	$(document).ready(function(){
	  $('ul.gallery').bsPhotoGallery({
	    "classes" : "col-lg-2 col-md-4 col-sm-3 col-xs-4 col-xxs-12",
	    "hasModal" : false
	  });
	});
</script>
=======
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
>>>>>>> origin/master
