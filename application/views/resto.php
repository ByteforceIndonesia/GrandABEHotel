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
    <div class="row" id="freatured">
        <div class="col-lg-12" id="headSlider">
            <div class="imageSliderResto imageSlider"
            style="background: url('assets/<?php echo $headers[0]->value_2 ?>')">&nbsp</div>
        </div>
        <?php foreach($resto as $item): ?>
            <div class="col-lg-4">
                <div class="imageFreatured"
                style="background: url('assets/<?php echo $item->link ?>')"></div>
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
            <div class="imageSliderCake imageSlider"
            style="background: url('assets/<?php echo $headers[1]->value_2 ?>')">&nbsp</div>
        </div>
        <?php foreach($cafe_catagory as $catagory): ?>
            <div class="col-lg-12">
                <h1><?php echo $catagory->catagory ?></h1>
            </div>

            <?php foreach($cafe as $item): ?>
                <?php if($item->value_2 != $catagory->id) continue; ?>
              <div class="col-lg-4">
                 <div class="imageFreatured"
                 style="background: url('assets/<?php echo $item->images ?>')"></div>
                 <div class="textFreatured">
                     <h5><?php echo $item->name ?></h5>
                 </div>
                </div>  
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>