<?php
/**
 * Created by PhpStorm.
 * User: JohnNate
 * Date: 8/15/17
 * Time: 1:55 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php echo form_open_multipart('admin/mainsettings/new_promo') ?>
<div class="row">
    <div class="col-lg-12">
        <h3>Upload Multiple</h3>

        <div class="input-group">
            <label class="input-group-btn">
                    <span class="btn btn-default">
                        Browse&hellip; <input type="file" style="display: none;" multiple id="uploaded" name="uploaded[]" accept=".png,.jpg,.jpeg">
                    </span>
            </label>
            <input type="text" class="form-control" name="txtbg" readonly
            >
        </div>

        <br><br>
        <input type="submit" value="Upload" class="btn btn-primary">
    </div>
</div>
<?php echo form_close() ?>
<script>
    document.getElementById('uploaded').onchange = function(e) {
        // Get the first file in the FileList object
        var imageFile = this.files[0];
        // get a local URL representation of the image blob
        var url = window.URL.createObjectURL(imageFile);
        // Now use your newly created URL!
        img_bg.src = url;
    }
</script>
