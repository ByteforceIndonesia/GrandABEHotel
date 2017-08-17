<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick-theme.css'?>">
<script src="<?php echo base_url() . JS_DIR . '/slick.min.js' ?>"></script>

<div class="container">
    <div class="col-lg-12" id="headResto">
        <h1>GRACIA CAFE & RESTO BY GRAND ABE HOTEL</h1>
    </div>
    <div class="row" id="headingResto">
        <div class="col-lg-4">&nbsp</div>
        <div class="heading col-lg-7">
            <h4>
                <?php echo $headers[0]->value_1 ?>
            </h4>
        </div> 
        <div class="col-lg-1">&nbsp</div>
    </div>

    <?php $thumbs = glob( './assets/images/uploads/resto/promo/*.{jpg,png,gif,jpeg}', GLOB_BRACE); ?>

    <div class="row" id="freatured">
        <div class="col-lg-12 slider" id="headSlider">
            <?php foreach($thumbs as $thumb): ?>
                <div>
                    <img src="<?php echo base_url() . $thumb ?>" alt="">
                </div>
            <?php endforeach; ?>
        </div>
        <?php foreach($resto as $item): ?>
            <div class="col-lg-4 col-md-6">
                <div class="imageFreatured">
                    <img src="<?php echo base_url('assets/') . $item->link ?>" alt="">
                </div>
                <div class="textFreatured">
                    <h5><?php echo $item->name ?></h5>
                </div>
            </div> 
        <?php endforeach; ?>
    </div>
    <div class="col-lg-12" id="headCake">
        <h1>GRAND ABE CAKE AND BAKERY SHOP</h1>
    </div>
    <div class="row" id="headingCake">
        <div class="col-lg-1">&nbsp</div>
        <div class="heading col-lg-7">
            <h4>
                <?php echo $headers[1]->value_1 ?>
            </h4>
        </div> 
        <div class="col-lg-4">&nbsp</div>
    </div>
    <div class="row" id="freaturedCake">
        <div class="col-lg-12" id="headSlider">
            <img src="<?php echo base_url('assets/') . $headers[1]->value_2 ?>" alt="">
        </div>
        <?php foreach($cafe_catagory as $catagory): ?>
            <div class="col-lg-12">
                <h1><?php echo $catagory->catagory ?></h1>
            </div>

            <?php foreach($cafe as $item): ?>
                <?php if($item->value_2 != $catagory->id) continue; ?>
              <div class="col-lg-4 col-md-6">
                 <div class="imageFreatured">
                     <img src="<?php echo base_url('assets/') . $item->link ?>" alt="">
                 </div>
                 <div class="textFreatured">
                     <h5><?php echo $item->name ?></h5>
                 </div>
                </div>  
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.slider').slick({
            autoplay: true,
            autoplaySpeed: 5000,
        });
    });
</script>