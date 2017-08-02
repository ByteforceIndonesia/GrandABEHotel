<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

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
		transform: translateY(100px);
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
			  <strong>Error!</strong> <p class="error-msg"></p>.
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
	
	<br><br>

	<!-- Categories -->
	<div class="row">
		<div class="col-md-3 col-lg-offset-1">
				<h1>Categories</h1>
			</div>
			<div class="col-md-2 pull-right">
				<br>
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="new-category">
					Create New
				</button>
			</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-12">
			<table class="table">
				<thead>
					<tr>
						<td>No.</td>
						<td>Category</td>
						<td>Actions</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach($categories as $count => $category): ?>
						<tr>
							<td><?php echo $count+1 ?></td>
							<td>
								<input type="text" name="name" id="<?php echo $category->id ?>" value="<?php echo $category->name ?>" class="form-control edit-category">
							</td>
							<td>
								<button 
									class="btn btn-danger delete-category"
									id="<?php echo $category->id ?>"
									data-toggle="modal" 
									data-target="#myModal"
									>
									Delete
								</button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- News -->
	<div class="row">
		<div class="col-md-3 col-lg-offset-1">
				<h1>News Items</h1>
			</div>
			<div class="col-md-2 pull-right">
				<br>
				<button class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="new-news">
					Create New
				</button>
			</div>
	</div><br>
	<div class="row">
		<div class="col-lg-12">
			<table class="table">
				<thead>
					<tr>
						<td>No.</td>
						<td>Title</td>
						<td>Content</td>
						<td>Category</td>
						<td>Image</td>
						<td>Actions</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach($news as $count => $single): ?>
						<tbody>
							<tr>
								<td><?php echo $count+1 ?></td>
								<td>
									<?php echo $single->title ?>		
								</td>
								<td>
									<?php echo $single->content ?>
								</td>
								<td>
									<select name="category" id="category" class="form-control" required>
										<?php foreach($categories as $category): ?>
											<option 
												value="<?php echo $category->id ?>"
												<?php 
												if($single->category_id == $category->id): ?>
													selected
												<?php endif; ?>
												class="form-control">
												<?php echo $category->name ?>
											</option>
										<?php endforeach; ?>
									</select>
								</td>
								<td>
									<img src="<?php echo base_url() . 'assets/images/news/' . $single->image ?>" alt="No Image" width="200px">
								</td>
								<td>
									<button 
										class="btn btn-primary edit-news"
										data-toggle="modal" 
										data-target="#myModal"
										id="<?php echo $single->id ?>">
										Edit
									</button>
									<button 
										class="btn btn-danger delete-news"
										data-toggle="modal" 
										data-target="#myModal"
										id="<?php echo $single->id ?>">
										Delete
									</button>
								</td>
							</tr>
						</tbody>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$(document).ready(function()
	{
		function toggleSuccess()
		{
			$('.success').addClass('show');
			setTimeout(function(){
				$('.success').removeClass('show');
			}, 2000);
		}

		function toggleError(data)
		{
			$('.error-msg').html(data);
			$('.error').addClass('show');
			setTimeout(function(){
				$('.error').removeClass('show');
			}, 2000);
		}

		// Message from php
		<?php if($this->session->flashdata('success')): ?>
			toggleSuccess()
		<?php elseif($this->session->flashdata('error')): ?>
			toggleError('<?php echo $this->session->flashdata('error') ?>')
		<?php endif; ?>

		$('#new-category').click(() => {

			$('.modal-title').html('New Category');
			$.post("<?php echo base_url('admin/news/new_category') ?>", function(data){
				    $(".modal-body").html(data).fadeIn();
				});

		});

		$('#new-news').click(() => {

			$('.modal-title').html('New Category');
			$.post("<?php echo base_url('admin/news/new_news') ?>", function(data){
				    $(".modal-body").html(data).fadeIn();
				});
		});

		$('.delete-category').click(function() {

			var id = $(this).attr('id');

			$('.modal-title').html('Delete Category Confirmation');
			$.post("<?php echo base_url('admin/news/delete_confirm/category/') ?>" + id, function(data){
				    $(".modal-body").html(data).fadeIn();
				});
		});

		$('.delete-news').click(function(){

			var id = $(this).attr('id');

			$('.modal-title').html('Delete Press Item Confirmation');
			$.post("<?php echo base_url('admin/news/delete_confirm/news/') ?>" + id, function(data){
				    $(".modal-body").html(data).fadeIn();
				});
		});

		$('.edit-news').click(function(){

			var id = $(this).attr('id');

			$('.modal-title').html('Delete Press Item Confirmation');
			$.post("<?php echo base_url('admin/news/edit/') ?>" + id, function(data){
				    $(".modal-body").html(data).fadeIn();
				});
		});

		$('.edit-category').change(function(){

			var id 			= $(this).attr('id');
			var val 	= $(this).val();

			$.ajax({
				type: 'post',
				url: "<?php echo base_url(); ?>admin/news/edit_category",
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
	});
</script>