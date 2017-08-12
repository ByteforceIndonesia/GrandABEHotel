<?php
/**
 * Created by PhpStorm.
 * User: JohnNate
 * Date: 8/12/17
 * Time: 2:51 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <style>
        [hidden] {
            display: none !important;
        }
    </style>
<?php echo form_open_multipart('admin/jobs/edit') ?>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <input required type="text" value="<?php echo $job->title ?>" name="title" id="title" class="form-control" placeholder="Title">
            </div>
            <br>
            <div class="form-group">
                Image
                <img src="<?php echo base_url() . 'assets/images/uploads/jobs/' . $job->image ?>" alt="No Image" width="200px">
                <label class="btn btn-default">
                    Browse <input type="file" name="image" hidden>
                </label>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <textarea name="content" required id="content" placeholder="Content" cols="30" rows="10" class="form-control"><?php echo $job->content ?></textarea>
            </div>
        </div>
    </div>
<?php echo form_close() ?>