<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php $thumbs = glob($room->image . '/*.{jpg,png,gif,jpeg}', GLOB_BRACE); ?>

<script type="text/javascript">
	tinymce.init({
		selector:'#ta_roomDesc'
	});
</script>

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
	<div class="col-lg-10 col-lg-offset-1">
		<div class="col-lg-12 text-center">
			<h3>Edit Room</h3>
		</div>
		<?php echo form_open_multipart('admin/roompage/editRoom/'.$room->id,array('class'=>'form-horizontal')); ?>

			<div class="form-group">
				<label for="ta_roomName" class="control-label col-sm-3">Package Name:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control " id="ta_roomName" name="ta_roomName"
					value="<?php echo set_value('ta_roomName', $room->name); ?>"
					>
				</div>
				<?php echo form_error('ta_roomName','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="upload_room" class="control-label col-sm-3">Package Image:</label>
				<div class="col-sm-4">	
					<div class="input-group">
						<label class="input-group-btn">
							<span class="btn btn-default">
								Browse&hellip; <input type="file" multiple style="display: none;" id="upload_room" accept=".png,.jpg,.jpeg,.gif" name="upload_room[]">
							</span>
						</label>
						<input type="text" class="form-control" name="txtroom" readonly 
						value="<?php echo set_value('txtroom', $room->image); ?>"
						>
					</div>
				</div>	
				<div class="col-sm-5" >
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Image</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($thumbs as $count => $thumb): ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $count+1 ?></td>
                                        <td><img src="<?php echo base_url().$thumb?>" width="200px" id="img_room" ></td>
                                        <td>
                                            <button
                                                class="btn btn-danger"
                                                id="<?php echo $thumb ?>"
                                                type="button"
                                                onclick="delete_picture(this)">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
				</div>
				<?php echo form_error('txtroom','<div style="color:red;">','</div>');?>
				<?php echo form_error('upload_package','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for = "ta_roomDesc" class="control-label col-sm-3">Room Description:</label>
				<div class="col-sm-9">
					<textarea id="ta_roomDesc" name="ta_roomDesc">
						<?php echo set_value('ta_roomDesc', $room->description); ?>
					</textarea>
				</div>
				<?php echo form_error('ta_roomDesc','<div style="color:red;">','</div>');?>
			</div>

		<?php echo form_submit('submit' , 'Update' , 'class="btn btn-primary col-lg-offset-3"');?>
		<?php echo form_close();?>
		<br>
		<br>
	</div>
</div>

<script type="text/javascript">
	document.getElementById('upload_room').onchange = function(e) {
		// Get the first file in the FileList object
		var imageFile = this.files[0];
		// get a local URL representation of the image blob
		var url = window.URL.createObjectURL(imageFile);
		// Now use your newly created URL!
		img_room.src = url;
	}

    function toggleSuccess()
    {
        $('.success').addClass('show');
        setTimeout(function(){
            $('.success').removeClass('show');
        }, 1000);
    }

    function toggleError()
    {
        $('.error').addClass('show');
        setTimeout(function(){
            $('.error').removeClass('show');
        }, 1000);
    }

    function delete_picture(e){

	    var id = e.id;

        $.ajax({
            type: 'post',
            url: "<?php echo base_url('admin/roompage/delete_image'); ?>",
            data: {file: id},
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
                setTimeout(function()
                {
                    location.reload();
                }, 2000);
            }
        });
    }
</script>