<script type="text/javascript">
	tinymce.init({
		selector: '#ta_wedding'
	});
	tinymce.init({
		selector: '#ta_birthday'
	});
</script>

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

<div class="row">
	<div class="col-lg-10 col-lg-offset-1">

		<div class="col-lg-12 text-center">
			<h1>Weddings & Birthdays</h1>
		</div>

		<?php echo form_open('admin/wnb/edit',array('class'=>'form-horizontal')); ?>

			<div class="form-group">
				<label for="ta_wedding" class="control-label col-sm-3">Wedding Description:</label>
				<div class="col-sm-9">
					<textarea id="ta_wedding" name="ta_wedding">
						<?php if(!empty($header)) echo set_value('ta_wedding', $header->ta_wedding); ?>
					</textarea>
					<?php echo form_error('ta_wedding','<div style="color:red;">','</div>');?>
				</div>
			</div>

			<div class="form-group">
				<label for="ta_birthday" class="control-label col-sm-3">Birthday Description:</label>
				<div class="col-sm-9">
					<textarea id="ta_birthday" name="ta_birthday">
						<?php if(!empty($header)) echo set_value('ta_birthday', $header->ta_birthday); ?>
					</textarea>
					<?php echo form_error('ta_birthday','<div style="color:red;">','</div>');?>
				</div>
			</div>

		<?php echo form_submit('submit' , 'Save' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-lg-12 text-center">
		<h3>Weddings Gallery</h3>
	</div>
	<?php
		if(!empty($weddingphotos)){
	?>
	<div class="col-lg-12">
		<?php echo form_open('admin/wnb/deleteWeddingImages',array('class'=>'form-horizontal')); ?>
			

	<?php
				foreach ($weddingphotos as $weddingphoto) {
	?>
				<ul class="gallery">
					<li>
						<img src="<?php echo base_url().'assets/images/uploads/weddingImages/'.$weddingphoto->image?>">
						<center>
							<input type="checkbox" name="checkedWeddingImages[]" value="<?php echo $weddingphoto->id?>">
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
		<?php echo form_open_multipart('admin/wnb/addWeddingImages',array('class'=>'form-horizontal')); ?>
		<div class="form-group">
			<label for="upload_wedding" class="control-label col-sm-3">Add Photo:</label>
			<div class="col-sm-4">	
				<div class="input-group">
					<label class="input-group-btn">
						<span class="btn btn-default">
							Browse&hellip; <input type="file" style="display: none;" id="upload_wedding" name="upload_weddings[]" multiple accept=".png,.jpg,.jpeg,.gif">
						</span>
					</label>
					<input type="text" class="form-control" name="txtwedding" readonly>
				</div>
			</div>	
			<div class="col-sm-6" >
				<span>Multiple files allowed.</span>
			</div>
			<?php echo form_error('txtwedding','<div style="color:red;">','</div>');?>
			<?php echo form_error('upload_weddings[]','<div style="color:red;">','</div>');?>
		</div>
		<?php echo form_submit('submit' , 'Add' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
	</div>
</div>
<hr>

<div class="row">
	<div class="col-lg-12 text-center">
		<h3>Birthday Gallery</h3>
	</div>
	<?php
		if(!empty($birthdayphotos)){
	?>
	<div class="col-lg-12">
		<?php echo form_open('admin/wnb/deleteBirthdayImages',array('class'=>'form-horizontal')); ?>
			

	<?php
				foreach ($birthdayphotos as $birthdayphoto) {
	?>
				<ul class="gallery">
					<li>
						<img src="<?php echo base_url().'assets/images/uploads/birthdayImages/'.$birthdayphoto->image?>">
						<center>
							<input type="checkbox" name="checkedBirthdayImages[]" value="<?php echo $birthdayphoto->id?>">
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
		<?php echo form_open_multipart('admin/wnb/addBirthdayImages',array('class'=>'form-horizontal')); ?>
		<div class="form-group">
			<label for="upload_birthday" class="control-label col-sm-3">Add Photo:</label>
			<div class="col-sm-4">	
				<div class="input-group">
					<label class="input-group-btn">
						<span class="btn btn-default">
							Browse&hellip; <input type="file" style="display: none;" id="upload_birthday" name="upload_birthdays[]" multiple accept=".png,.jpg,.jpeg,.gif">
						</span>
					</label>
					<input type="text" class="form-control" name="txtbirthday" readonly>
				</div>
			</div>	
			<div class="col-sm-6" >
				<span>Multiple files allowed.</span>
			</div>
			<?php echo form_error('txtbirthday','<div style="color:red;">','</div>');?>
			<?php echo form_error('upload_birthdays[]','<div style="color:red;">','</div>');?>
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