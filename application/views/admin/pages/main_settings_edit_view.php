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
</div>
<div class="row">
		<div class="col-lg-10 col-lg-offset-1">
			<div class="col-lg-12 text-center">
				<h1>Home</h1>
			</div>
			
			<br><br>

			<?php echo form_open_multipart('admin/mainsettings/edit',array('class'=>'form-horizontal')); ?>

			<div class="form-group">
				<label for="upload_logo" class="control-label col-sm-3">Logo:</label>
				<div class="col-sm-4">	
					<div class="input-group">
						<label class="input-group-btn">
							<span class="btn btn-default">
								Browse&hellip; <input type="file" style="display: none;" id="upload_logo" name="upload_logo"accept=".png">
							</span>
						</label>
						<input type="text" class="form-control" name="txtlogo" readonly
						value="<?php if(!empty($main)) echo set_value('txtlogo',$main->logo);?>">
					</div>
				</div>	
				<div class="col-sm-5" >
					<div class="imgDiv">
						<img src="
						<?php 
							if(!empty($main)) echo base_url().'assets/images/uploads/logo/'.$main->logo;
							else echo base_url().'assets/images/img_placeholder.png';
						?>" id="img_logo" >
					</div>
				</div>
				<?php echo form_error('txtlogo','<div style="color:red;">','</div>');?>
				<?php echo form_error('upload_logo','<div style="color:red;">','</div>');?>
			</div>

			<br>

			<div class="form-group">
				<label for="upload_bg" class="control-label col-sm-3">Main Background:</label>
				<div class="col-sm-4">
					<div class="input-group">
						<label class="input-group-btn">
							<span class="btn btn-default">
								Browse&hellip; <input type="file" style="display: none;" id="upload_bg" name="upload_bg" accept=".png,.jpg,.jpeg">
							</span>
						</label>
						<input type="text" class="form-control" name="txtbg" readonly
						value="<?php if(!empty($main)) echo set_value('upload_bg',$main->background);?>"
						>
					</div>
				</div>
				<div class="col-sm-5 " >
					<div class="imgDiv">
						<img src="
						<?php 
							if(!empty($main)) echo base_url().'assets/images/uploads/background/'.$main->background;
							else echo base_url().'assets/images/img_placeholder.png';
						?>"
						id="img_bg" >
					</div>
				</div>

				<?php echo form_error('txtbg','<div style="color:red;">','</div>');?>
				<?php echo form_error('upload_bg','<div style="color:red;">','</div>');?>
			</div>

			<br>

			<div class="form-group">
				<label for="ta_email" class="control-label col-sm-3">Reservation Email:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="ta_email" name="ta_email"
					value="<?php if(!empty($main)) echo set_value('ta_email', $main->email); ?>"
					>
				</div>
				<?php echo form_error('ta_email','<div style="color:red;">','</div>');?>
			</div>

            <?php

                $thumbs = glob( './assets/images/uploads/promos/*.{jpg,png,gif,jpeg}', GLOB_BRACE);

            ?>



            <br><br>
            <h3>Promo Images</h3>
            <button class="btn btn-primary"
            type="button"
            onclick="newimage()"
            data-toggle="modal" data-target="#myModal"
            >
                New Promo Image
            </button>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Image</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($thumbs as $count => $thumb): ?>
                                <tr>
                                    <td><?php echo $count+1 ?></td>
                                    <td>
                                        <img src="<?php echo base_url() .  $thumb ?>" width="200px" alt="">
                                    </td>
                                    <td>
                                        <button class="btn btn-danger"
                                        onclick="delete_promo(this)"
                                        id="<?php echo $thumb ?>"
                                        type="button">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>

            <script>
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

                function delete_promo(e)
                {
                    var id = e.id;

                    $.ajax({
                        type: 'post',
                        url: "<?php echo base_url('admin/mainsettings/delete_image'); ?>",
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

                function newimage()
                {
                    $('.modal-title').html('New Promo Image');
                    $.post("<?php echo base_url('admin/mainsettings/new_promo') ?>", function(data){
                        $(".modal-body").html(data).fadeIn();
                    });
                }
            </script>
            <!--
                Deprecated
                Doesn't need password


			<div class="form-group">
				<label for="ta_password" class="control-label col-sm-3">Email Password:</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="ta_password" name="ta_password">
				</div>
				<?php echo form_error('ta_password','<div style="color:red;">','</div>');?>
			</div>

			<div class="form-group">
				<label for="ta_cpassword" class="control-label col-sm-3">Confirm Password:</label>
				<div class="col-sm-9">
					<input type="password" class="form-control" id="ta_cpassword" name="ta_cpassword">
				</div>
				<?php echo form_error('ta_cpassword','<div style="color:red;">','</div>');?>
			</div>

			-->
			

			<?php echo form_submit('submit' , 'Save' , 'class="btn btn-primary col-lg-offset-3"');?>
			<?php echo form_close();?>

			<br><br>

<script type="text/javascript">
	document.getElementById('upload_bg').onchange = function(e) {
		// Get the first file in the FileList object
		var imageFile = this.files[0];
		// get a local URL representation of the image blob
		var url = window.URL.createObjectURL(imageFile);
		// Now use your newly created URL!
		img_bg.src = url;
	}

	document.getElementById('upload_logo').onchange = function(e) {
		// Get the first file in the FileList object
		var imageFile = this.files[0];
		// get a local URL representation of the image blob
		var url = window.URL.createObjectURL(imageFile);
		// Now use your newly created URL!
		img_logo.src = url;
	}
</script>