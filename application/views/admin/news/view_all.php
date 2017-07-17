<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
		<br><br>
			<h1>All News</h1>
			<br><br>
			<table class="table">
				<thead>
					<tr>
						<td>No</td>
						<td>Title</td>
						<td>Category</td>
						<td>Content</td>
						<td>Image</td>
						<td>Actions</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach($news as $count => $one): ?>
						<tr>
							<td><?php echo $count+1 ?></td>
							<td>
								<input type="text" name="title" id="title"
									value="<?php echo $one->title ?>">
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>