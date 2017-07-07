<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<script type="text/javascript">
	tinymce.init({
		selector:'.texteditor'
	});
</script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/datatables.min.js"></script>

<script>
	$(document).ready(function(){
	    $('.table').DataTable();
	});
</script>

<pre>
	<?php print_r($cafe) ?>
</pre>

<div class="container">

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
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
				<textarea name="resto_heading" id="" cols="30" rows="10" class="texteditor form-control">
					<?php echo $headers[0]->value_1 ?>
				</textarea>
			</div>
		</div>
	</div>

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
					<div class="input-group">
		                <label class="input-group-btn">
		                    <span class="btn btn-primary">
		                        Browse&hellip; <input type="file" style="display: none;" multiple>
		                    </span>
		                </label>
		                <input type="text" class="form-control" readonly>
		            </div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<h3>Resto Items</h3>
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
							<td><?php echo $item->name ?></td>
							<td>
								<img src="<?php echo base_url() . 'assets/' . $item->link?>" alt="Error Loading Image" width="100px">
							</td>
							<td>
								<a href="#">
									<button class="btn btn-danger">Delete</button>
								</a>
								<a href="#">
									<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Change Image</button>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

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
				<textarea name="resto_heading" id="" cols="30" rows="10" class="texteditor form-control">
					<?php echo $headers[1]->value_1 ?>
				</textarea>
			</div>
		</div>
	</div>

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
					<div class="input-group">
		                <label class="input-group-btn">
		                    <span class="btn btn-primary">
		                        Browse&hellip; <input type="file" style="display: none;" multiple>
		                    </span>
		                </label>
		                <input type="text" class="form-control" readonly>
		            </div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				
			</div>
		</div>
	</div>

	<div class="row">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<h3>Cafe Items</h3>
			</div>
		</div>
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
								<select name="category" id="">
									<?php foreach($catagories as $catagory): ?>
										<option value="<?php echo $catagory->id ?>"><?php echo $catagory->catagory ?></option>
									<?php endforeach; ?>
								</select>
							<?php echo $item->catagory ?></td>
							<td>
								<img src="<?php echo base_url() . 'assets/' . $item->images?>" alt="Error Loading Image" width="100px">
							</td>
							<td>
								<a href="#">
									<button class="btn btn-danger">Delete</button>
								</a>
								<a href="#">
									<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Change Image</button>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>