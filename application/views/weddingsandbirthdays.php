<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/justifiedGallery.min.css'?>">
<script src="<?php echo base_url() . JS_DIR . '/jquery.justifiedGallery.min.js' ?>"></script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-container-center">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row wrapper">
                            <div class="col-md-12 first-image"></div>
                            <div class="col-md-12 second-image"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="wedding-header">
    <div class="container">
        <div class="row header-wrapper">
            <div class="col-lg-12">
                <h1>Weddings</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php echo $header->ta_wedding?>
            </div>
        </div>
    </div>
</div>

<section id="weddings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 image-container">
                <?php if(!empty($weddings)){
                    foreach ($weddings as $wedding): ?>
                        <a href="<?php echo base_url('assets/images/uploads/weddingImages/') . $wedding->image ?>">
                            <img src="<?php echo base_url('assets/images/uploads/weddingImages/') . $wedding->image ?>" alt="">
                        </a>
                <?php endforeach; } ?>
            </div>
            <script>
                $(document).ready(function(){
                    $(".image-container").justifiedGallery({
                        rowHeight : 180,
                        margins : 2
                    });
                });
            </script>
        </div>
    </div>
</section>

<section id="page-break-wedbday">
    <div class="background-img">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Plan Your Events With Us</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 offset-sm-2">
                    <button class="more-btn" onclick="wedding_packages()">
                        Wedding Packages
                    </button>
                </div>
                <div class="col-sm-4">
                    <button class="more-btn" onclick="birthday_packages()">
                        Birthday Packages
                    </button>
                </div>
            </div>
            <script>
                function wedding_packages() {
                    var content = './assets/images/uploads/weddingImages/';

                    $('#myModal').modal('toggle')

                    $('.first-image').html(
                        '<img src="' + content + 'package_one.jpg">');
                    $('.second-image').html(
                        '<img src="' + content + 'package_two.jpg">');
                }

                function birthday_packages () {
                    var content = './assets/images/uploads/birthdayImages/';

                    $('#myModal').modal('toggle')

                    $('.first-image').html(
                        '<img src="' + content + 'package_one.jpg">');
                    $('.second-image').html(
                        '<img src="' + content + 'package_two.jpg">');
                }
            </script>
        </div>
    </div>
</section>

<div id="birthday-header">
    <div class="container">
        <div class="row header-wrapper">
            <div class="col-lg-12">
                <h1>Birthdays</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php echo $header->ta_birthday?>
            </div>
        </div>
    </div>
</div>

<section id="weddings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 image-container-bday">
                <?php if(!empty($birthdays)){
                    foreach ($birthdays as $birthday): ?>
                        <a href="<?php echo base_url('assets/images/uploads/birthdayImages/') . $birthday->image ?>">
                            <img src="<?php echo base_url('assets/images/uploads/birthdayImages/') . $birthday->image ?>" alt="">
                        </a>
                    <?php endforeach; } ?>
            </div>
            <script>
                $(document).ready(function(){
                    $(".image-container-bday").justifiedGallery({
                        rowHeight : 180,
                        margins : 2
                    });
                });
            </script>
        </div>
    </div>
</section>