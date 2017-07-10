<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/dt-1.10.15/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>

<style>
	.modal-container
	{
		width:100%;
		height:100%;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.notif-container
	{
		display:flex;
		justify-content: center;
		align-items: center;
	}

	.notification
	{
		position:fixed;
		margin-top:-25px;
		transform: translateY(-100px);
		transform: translateZ(100px);
		transition:all .3s ease-in-out;
		z-index: 1000;
	}

	.show
	{
		transform: translateY(80px);
	}
</style>

<div class="container">
	<div class="notif-container">
		<!-- Success Notification -->
		<div class="notification success">
			<div class="alert alert-success">
			  <strong>Success!</strong> Your editing has successfully been saved.
			</div>
		</div>

		<!-- Error Notification -->
		<div class="notification error">
			<div class="alert alert-danger">
			  <strong>Error!</strong> Oops something has gone wrong.
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-container">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Modal Header</h4>
	      </div>
	      <div class="modal-body">
	        <p>Some text in the modal.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>	
	</div>
	<br>
	<!-- Resto -->
	<div class="row">
		<div class="col-lg-12">
			<h1>Resto</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<h3>Heading Text</h3>
			<div class="form-group">
				<textarea name="resto_heading" id="" cols="30" rows="10" class="texteditor-resto-heading form-control resto-header-text">
					<?php echo $headers[0]->value_1 ?>
				</textarea>
			</div>
		</div>
	</div>
<br><br><br><br>
	<div class="row">
		<div class="row">
			<div class="col-lg-3 col-lg-offset-1">
				<h3>Heading Image</h3>
			</div>
			<div class="col-lg-8">&nbsp</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-lg-offset-1 current-image">
				<h4>Current Image</h4>
				<img src="<?php echo base_url() . 'assets/' . $headers[0]->value_2?>" alt="Error Loading Image" width="200px">
			</div>
			<div class="col-lg-3">
				<h4>Change Image</h4>
				<div class="form-group">
				<?php echo form_open_multipart('admin/resto/header_image/resto') ?>
					<div class="input-group">
		                <label class="input-group-btn">
		                    <span class="btn btn-primary">
		                        Browse&hellip; <input type="file" style="display: none;" name="header_image">
		                    </span>
		                </label>
		                <input type="text" class="form-control" readonly>
		            </div>
		            <br>
		            <div class="input-group">
		            	<input type="submit" value="Submit" class="btn btn-primary">
		            </div>
	            <?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
<br><br><br><br>
	<div class="row">
		<div class="row">
			<div class="col-md-3 col-lg-offset-1">
				<h3>Resto Items</h3>
			</div>
			<div class="col-md-2 pull-right">
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="new-resto-item">
					Create New
				</button>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<table class="table">
					<thead>
						<tr>
							<td>No</td>
							<td>Name</td>
							<td>Image</td>
							<td>Actions</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach($resto as $count => $item): ?>
						<tr>
							<td><?php echo $count+1 ?></td>
							<td id="<?php echo $item->id ?>">
								<textarea name="resto-name" class="resto-name form-control">
									<?php echo $item->name ?>
								</textarea>
							</td>
							<td>
								<img src="<?php echo base_url() . 'assets/' . $item->link?>" alt="Error Loading Image" width="100px">
							</td>
							<td>
								<button class="btn btn-danger delete-resto-item" id="<?php echo $item->id ?>" data-toggle="modal" data-target="#myModal">Delete</button>
								<button class="btn btn-primary change-image-resto" data-toggle="modal" data-target="#myModal" id="<?php echo $item->id ?>">Change Image</button>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<br><br><br><br>
	<!-- Cafe -->
	<div class="row">
		<div class="col-lg-12">
			<h1>Cafe</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<h3>Heading Text</h3>
			<div class="form-group">
				<textarea name="resto_heading" id="" cols="30" rows="10" class="texteditor-cafe-heading form-control">
					<?php echo $headers[1]->value_1 ?>
				</textarea>
			</div>
		</div>
	</div>
<br><br><br><br>
	<div class="row">
		<div class="row">
			<div class="col-lg-3 col-lg-offset-1">
				<h3>Heading Image</h3>
			</div>
			<div class="col-lg-8">&nbsp</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-lg-offset-1 current-image">
				<h4>Current Image</h4>
				<img src="<?php echo base_url() . 'assets/' . $headers[1]->value_2?>" alt="Error Loading Image" width="200px">
			</div>
			<div class="col-lg-3">
				<h4>Change Image</h4>
				<div class="form-group">
				<?php echo form_open_multipart('admin/resto/header_image/cafe') ?>
					<div class="input-group">
		                <label class="input-group-btn">
		                    <span class="btn btn-primary">
		                        Browse&hellip; <input type="file" style="display: none;" name="header_image">
		                    </span>
		                </label>
		                <input type="text" class="form-control" readonly>
		            </div>
		            <br>
		            <div class="input-group">
		            	<input type="submit" value="Submit" class="btn btn-primary">
		            </div>
	            <?php echo form_close() ?>
				</div>
			</div>
		</div>
	</div>
<br><br><br><br>
	<div class="row">
		<div class="row">
			<div class="col-md-3 col-lg-offset-1">
				<h3>Cafe Categories</h3>
			</div>
			<div class="col-md-2 pull-right">
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="new-category-item">
					Create New
				</button>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<table class="table">
					<thead>
						<tr>
							<td>No</td>
							<td>Category Name</td>
							<td>Actions</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach($catagories as $count => $category): ?>
						<tr>
							<td><?php echo $count+1 ?></td>
							<td 
								contenteditable="true"
								class="category-name"
								id="<?php echo $category->id ?>">
								<?php echo $category->catagory ?>
							</td>
							<td>
								<button 
								class="btn btn-danger delete-category"
								data-toggle="modal" data-target="#myModal"
								id="<?php echo $category->id ?>">
									Delete
								</button>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
		<br><br><br><br>
	<div class="row">
		<div class="row">
			<div class="col-md-3 col-lg-offset-1">
				<h3>Cafe Items</h3>
			</div>
			<div class="col-md-2 pull-right">
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="new-cafe-item">
					Create New
				</button>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<table class="table">
					<thead>
						<tr>
							<td>No</td>
							<td>Name</td>
							<td>Catagory</td>
							<td>Image</td>
							<td>Actions</td>
						</tr>
					</thead>
					<tbody>
					<?php foreach($cafe as $count => $item): ?>
						<tr>
							<td><?php echo $count+1 ?></td>
							<td><?php echo $item->name ?></td>
							<td>
								<select name="category" class="category-change" id="<?php echo $item->id?>">
									<?php foreach($catagories as $catagory): ?>
										<option
										<?php if($catagory->id == $item->value_2): ?>
											selected
										<?php endif; ?>
										value="<?php echo $catagory->id ?>"><?php echo $catagory->catagory ?></option>
									<?php endforeach; ?>
								</select>
							</td>
							<td>
								<img src="<?php echo base_url() . 'assets/' . $item->images?>" alt="Error Loading Image" width="100px">
							</td>
							<td>
								<button 
								class="btn btn-danger cafe-item-delete"
								id="<?php echo $item->id?>">
									Delete
								</button>
								<button 
								class="btn btn-primary change-image-cafe" 
								id="<?php echo $item->id?>"
								data-toggle="modal" 
								data-target="#myModal">
									Change Image
								</button>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<br><br><br><br>

<script>
/* ------------------------------
--------- Byteforce Indonesia----
------ Author : ZoneCapt --------
------- Psalms 91 ---------------
--------------------------------*/

$(document).ready(function(){

    $('.table').DataTable();

    $('body').on('focus', '[contenteditable]', function() {
	    var $this = $(this);
	    $this.data('before', $this.html());
	    return $this;
	}).on('blur paste', '[contenteditable]', function() {
	    var $this = $(this);
	    if ($this.data('before') !== $this.html()) {
	        $this.data('before', $this.html());
	        $this.trigger('change');
	    }
	    return $this;
	});

	function changeHeadingResto(init)
	{
		var content = init.getBody().innerHTML;

		$.ajax({
			type: 'post',
			url: "<?php echo base_url(); ?>admin/resto/header_text/resto",
			data: {content: content},
			success: function(res)
			{
				toggleSuccess();
			},
			error: function()
			{
				toggleError();
			}
		});
	}

	function changeHeadingCafe(init)
	{
		var content = init.getBody().innerHTML;

		$.ajax({
			type: 'post',
			url: "<?php echo base_url(); ?>admin/resto/header_text/cafe",
			data: {content: content},
			success: function(res)
			{
				toggleSuccess();
			},
			error: function()
			{
				toggleError();
			}
		});
	}

    tinymce.init({
		selector:'.texteditor-resto-heading',
		setup: function(editor) {
	        editor.on('change', function() {
	            changeHeadingResto(editor)
	        });
	    }
	});

	tinymce.init({
		selector:'.texteditor-cafe-heading',
		setup: function(editor) {
	        editor.on('change', function() {
	            changeHeadingCafe(editor)
	        });
	    }
	});

    function toggleSuccess()
	{
		$('.success').addClass('show');
		setTimeout(function(){
			$('.success').removeClass('show');
		}, 2000);
	}

	function toggleError()
	{
		$('.error').addClass('show');
		setTimeout(function(){
			$('.error').removeClass('show');
		}, 2000);
	}

	// Message from php
	<?php if($this->session->flashdata('success')): ?>
		toggleSuccess()
	<?php elseif($this->session->flashdata('error')): ?>
		toggleError()
	<?php endif; ?>

	// Change resto name ajax
	$('.resto-name').change(function()
	{
		var id 		= $(this).parent().attr('id');
		var content = $(this).val();

		$.ajax({
			type: 'post',
			url: "<?php echo base_url(); ?>admin/resto/resto_item_edit",
			data: {id: id,content: content},
			success: function(res)
			{
				toggleSuccess();
			},
			error: function()
			{
				toggleError();
			}
		});
	});

	$('.cafe-item-delete').click(() => {
		var id 		= $(this).attr('id');

		$('.modal-title').html('Delete Confirmation');
		$.post("<?php echo base_url('admin/resto/item_delete_modal/cafe/') ?>" + id, function(data){
			    $(".modal-body").html(data).fadeIn();
			});
	});

	// Change category name
	$('.category-name').on('change', function()
	{
		var id 		= $(this).attr('id');
		var content = $(this).html();

		$.ajax({
			type: 'post',
			url: "<?php echo base_url(); ?>admin/resto/category_name_change",
			data: {id: id,content: content},
			success: function(res)
			{
				toggleSuccess();
			},
			error: function()
			{
				toggleError();
			}
		});
	});

	// Delete Category
	$('.delete-category').click(function()
	{
		var id 		= $(this).attr('id');

		$('.modal-title').html('Delete Confirmation');
		$.post("<?php echo base_url('admin/resto/item_delete_modal/category/') ?>" + id, function(data){
			    $(".modal-body").html(data).fadeIn();
			});
	});

	// Change item catagory
	$('.category-change').change(function()
	{
		var id = $(this).attr('id');
		var val = $(this).val();

		$.ajax({
			type: 'post',
			url: "<?php echo base_url(); ?>admin/resto/cafe_edit/category",
			data: {id: id,content: val},
			success: function(res)
			{
				toggleSuccess();
			},
			error: function()
			{
				toggleError();
			}
		});
	});

	// Delete resto dialog
	$('.delete-resto-item').click(function()
	{
		var id 		= $(this).attr('id');

		$('.modal-title').html('Delete Confirmation');
		$.post("<?php echo base_url('admin/resto/item_delete_modal/resto/') ?>" + id, function(data){
			    $(".modal-body").html(data).fadeIn();
			});
	});

	// Change Image
	$('.change-image-resto').click(function()
	{
		var id = $(this).attr('id');

		$('.modal-title').html('Change Image');
		$.post("<?php echo base_url('admin/resto/item_change_image/resto/') ?>" + id, function(data){
			    $(".modal-body").html(data).fadeIn();
			});
	});

	// Change Image
	$('.change-image-cafe').click(function()
	{
		var id = $(this).attr('id');

		$('.modal-title').html('Change Image');
		$.post("<?php echo base_url('admin/resto/item_change_image/cafe/') ?>" + id, function(data){
			    $(".modal-body").html(data).fadeIn();
			});
	});

	// New Resto Item
	$('#new-resto-item').click(function()
	{
		$('.modal-title').html('New Resto Item');
		$.post("<?php echo base_url('admin/resto/resto_item_new') ?>", function(data){
			    $(".modal-body").html(data).fadeIn();
			});
	});

	// New Category Item
	$('#new-category-item').click(function()
	{
		$('.modal-title').html('New Resto Item');
		$.post("<?php echo base_url('admin/resto/category_item_new') ?>", function(data){
			    $(".modal-body").html(data).fadeIn();
			});
	});

	// New Cafe Item
	$('#new-cafe-item').click(function()
	{
		$('.modal-title').html('New Resto Item');
		$.post("<?php echo base_url('admin/resto/cafe_item_new') ?>", function(data){
			    $(".modal-body").html(data).fadeIn();
			});
	});

});
</script>