<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick.css'?>">
<link rel="stylesheet" href="<?php echo base_url() . CSS_DIR . '/slick-theme.css'?>">
<script src="<?php echo base_url() . JS_DIR . '/slick.min.js' ?>"></script>

<div id="tabswitcher">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-2 tab" onclick="open_resto()">
                <div class="restoTab tabber active">Restaurant</div>
                <div class="tab-tri">
                    <div id="triangle-down" class="resto-tri"></div>
                </div>
            </div>
            <div class="col-md-4 tab" onclick="open_cafe()">
                <div class="cafeTab tabber">Cafe</div>
                <div class="tab-tri">
                    <div id="triangle-down" class="hidden cafe-tri"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="restaurant" class="">
    <div id="headResto">
        <div class="container">
            <div class="col-lg-12">
                <h1>GRACIA CAFE & RESTO BY GRAND ABE HOTEL</h1>
                <p><?php echo $headers[0]->value_1 ?></p>
            </div>
        </div>
    </div>

    <?php $thumbs = glob( './assets/images/uploads/resto/promo/*.{jpg,png,gif,jpeg}', GLOB_BRACE); ?>
    <div class="slider" id="headSlider">
        <?php foreach($thumbs as $thumb): ?>
            <div>
                <img src="<?php echo base_url() . $thumb ?>" alt="">
            </div>
        <?php endforeach; ?>
    </div>

    <div class="container">
        <div class="row" id="freatured">
            <?php foreach($resto as $item): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card-material">
                        <div class="imageFreatured">
                            <img src="<?php echo base_url('assets/') . $item->link ?>" alt="">
                        </div>
                        <div class="textFreatured">
                            <h5><?php echo $item->name ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div id="cafe" class="hidden">
    <div id="headResto">
        <div class="container">
            <div class="col-lg-12">
                <h1>GRACIA CAFE & RESTO BY GRAND ABE HOTEL</h1>
                <p><?php echo $headers[1]->value_1 ?></p>
            </div>
        </div>
    </div>

    <div id="headSlider">
        <img src="<?php echo base_url('assets/') . $headers[1]->value_2 ?>" alt="">
    </div>

    <div class="container">
        <div class="row" id="freaturedCake">
            <?php foreach($cafe_catagory as $catagory): ?>
                <div class="col-lg-12">
                    <h1><?php echo $catagory->catagory ?></h1>
                </div>

                <?php foreach($cafe as $item): ?>
                    <?php if($item->value_2 != $catagory->id) continue; ?>
                  <div class="col-lg-4 col-md-6">
                      <div class="card-material">
                         <div class="imageFreatured">
                             <img src="<?php echo base_url('assets/') . $item->link ?>" alt="">
                         </div>
                         <div class="textFreatured">
                             <h5><?php echo $item->name ?></h5>
                         </div>
                      </div>
                  </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.slider').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            arrows:false
        });
    });

    function open_resto(){
        $('.restoTab').addClass('active');
        $('.resto-tri').removeClass('hidden');
        $('.cafeTab').removeClass('active');
        $('.cafe-tri').addClass('hidden');
        $('#restaurant').removeClass('hidden');
        $('#cafe').addClass('hidden');
    }

    function open_cafe(){
        $('.cafeTab').addClass('active');
        $('.cafe-tri').removeClass('hidden');
        $('.restoTab').removeClass('active');
        $('.resto-tri').addClass('hidden');
        $('#restaurant').addClass('hidden');
        $('#cafe').removeClass('hidden');
    }
</script>