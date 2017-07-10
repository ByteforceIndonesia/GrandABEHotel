<style>
	.btn-apel
	{
		width:100%;
		margin-bottom: 15px;
		margin-top: 15px;
	}

	.apel
	{
		margin-top: 0px;
		margin-left: 20px;
	}
</style>
<div class="row">
	<div class="col-lg-10 col-lg-offset-1">
		<h3 class="apel">Are you sure?</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<button class="btn btn-danger btn-apel delete-item-confirm" id = "<?php echo $id ?>" data-dismiss="modal">
			Delete
		</button>
	</div>
	<div class="col-md-6">
		<button class="btn btn-apel btn-primary" data-dismiss="modal">
			Cancel
		</button>
	</div>
</div>

<script>
$(document).ready(function(){

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

	// Delete Resto Items
	$('.delete-item-confirm').click(function()
	{
		var id 		= $(this).attr('id');

		$.ajax({
			type: 'post',
			url: "<?php echo base_url() . "admin/resto/item_delete/" . $type ?>",
			data: {id: id},
			success: function(res)
			{
				toggleSuccess();
				setTimeout(function()
				{
					location.reload();
				}, 2000);
			},
			error: function()
			{
				toggleError();
			}
		});
	});
});
</script>