<?php
/**
 * Created by PhpStorm.
 * User: John Nate
 * Date: 8/11/2017
 * Time: 8:21 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
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

<div class="container" style="margin-top:20px">
    <div class="row">
        <div class="notif-container">
            <!-- Success Notification -->
            <div class="notification success">
                <div class="alert alert-success">
                    <strong>Success!</strong> Your editing has successfully been saved.
                </div>
            </div>

            <!-- Error Notification -->
            <div class="notification error">
                <div class="alert alert-danger error_msg">
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
        <div class="col-md-8">
            <h1>
                Job Opportunities System
            </h1>
        </div>
        <div class="col-md-4">
            <br>
            <button
                class="btn btn-primary pull-right"
                data-toggle="modal" data-target="#myModal"
                id="new_job">
                Create New
            </button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Title</td>
                        <td>Content</td>
                        <td>Image</td>
                        <td>Created</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($jobs as $count => $item): ?>
                        <tbody>
                            <tr>
                                <td><?php echo $count+1 ?></td>
                                <td><?php echo $item->title ?></td>
                                <td><?php echo $item->content ?></td>
                                <td>
                                    <img src="<?php echo base_url() . 'assets/images/uploads/jobs/' . $item->image ?>" width="100px" alt="No Image">
                                </td>
                                <td><?php echo $item->created ?></td>
                                <td>
                                    <button class="btn btn-primary"
                                    id="<?php echo $item->id ?>"
                                    onclick="edit_item(this)"
                                    data-toggle="modal" data-target="#myModal">
                                        Edit
                                    </button>
                                    <br><br>
                                    <button class="btn btn-danger"
                                    id="<?php echo $item->id ?>"
                                    onclick="delete_item(this)"
                                    data-toggle="modal" data-target="#myModal">
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
    function edit_item (e)
    {
        var id = e.id;

        $('.modal-title').html('Edit Job Offer');
        $.post('<?php echo base_url('admin/jobs/edit_form') ?>', { id:id }).done(function( data ) {
            $(".modal-body").html(data).fadeIn();
        });
    }

    function delete_item (e)
    {
        var id = e.id;

        $('.modal-title').html('Delete Confirmation Job Offer');
        $.post('<?php echo base_url('admin/jobs/delete_confirm') ?>', { id:id }).done(function( data ) {
            $(".modal-body").html(data).fadeIn();
        });
    }

    $(document).ready(function(){
        function toggleSuccess()
        {
            $('.success').addClass('show');
            setTimeout(function(){
                $('.success').removeClass('show');
            }, 2000);
        }

        function toggleError(e)
        {
            $('.error').addClass('show');
            $('.error_msg').html(e);
            setTimeout(function(){
                $('.error').removeClass('show');
            }, 2000);
        }

        $('#new_job').click(function(){
            $('.modal-title').html('New Job Opportunity');
            $.post("<?php echo base_url('admin/jobs/new_job') ?>", function(data){
                $(".modal-body").html(data).fadeIn();
            });
        });

        // Message from php
        <?php if($this->session->flashdata('success')): ?>
        toggleSuccess()
        <?php elseif($this->session->flashdata('error')): ?>
        toggleError('<?php echo $this->session->flashdata('error') ?>')
        <?php endif; ?>
    });
</script>