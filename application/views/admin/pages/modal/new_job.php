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
<?php echo form_open_multipart('admin/jobs/new_job') ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <input required type="text" name="title" id="title" class="form-control" placeholder="Title">
        </div>
        <br>
        <div class="form-group">
            Image
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
            <textarea name="content" required id="content" placeholder="Content" cols="30" rows="10" class="form-control"></textarea>
        </div>
    </div>
</div>
<?php echo form_close() ?>