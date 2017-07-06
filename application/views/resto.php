<pre>
    <?php print_r($resto) ?>
</pre>

<div class="container">   
    <div class="col-lg-12" id="headResto">
        <h1>GRACIA CAFE & RESTO BY GRAND ABE HOTEL</h1>
    </div>
    <div class="row" id="headingResto">
        <div class="col-lg-4">&nbsp</div>
        <div class="heading col-lg-7">
            <h4>
                <?php echo $resto[0]->value_1 ?>
            </h4>
        </div> 
        <div class="col-lg-1">&nbsp</div>
    </div>
    <div class="row" id="freatured">
        <div class="col-lg-12" id="headSlider">
            <div class="imageSliderResto imageSlider"
            style="background: '../<?php echo $resto_img[0]->link ?>'">&nbsp</div>
        </div>
        <?php foreach($resto as $count => $item): ?>
            <?php if($count == 0) continue; ?>
            <div class="col-lg-4">
                <div class="imageFreatured"
                style="background: '../<?php echo $resto_img[$item->value_1]->link ?>'"></div>
                <div class="textFreatured">
                    <h5><?php echo $item->name ?></h5>
                </div>
            </div> 
        <?php endforeach; ?>

        <div class="col-lg-4">
             <div class="imageFreatured"></div>
             <div class="textFreatured">
                 <h5>FREE WI-FI – Akses internet tercepat di Jayapura</h5>
             </div>
        </div>
        <div class="col-lg-4">
             <div class="imageFreatured"></div>
             <div class="textFreatured">
                 <h5>GRACIA VIP ROOM - kapasitas hingga 20 orang</h5>
             </div>
        </div>
        <div class="col-lg-4">
             <div class="imageFreatured"></div>
             <div class="textFreatured">
                 <h5>LIVE MUSIC - setiap Rabu pukul | 19.00 – end</h5>
             </div>
        </div>
    </div>
    <div class="col-lg-12" id="headCake">
        <h1>GRAND ABE CAKE AND BAKERY SHOP</h1>
    </div>
    <div class="row" id="headingCake">
        <div class="col-lg-1">&nbsp</div>
        <div class="heading col-lg-7">
            <h4>
                &nbsp Grand ABE Hotel juga membuat berbagai jenis kue ulang tahun, black forest, chesse cake dan berbagai jenis kue lainnya dengan rasa yang nikmat dan dekorasi yang cantik. Tersedia juga aneka produk bakery, seperti roti tawar, roti sisir dan roti manis.
            </h4>
        </div> 
        <div class="col-lg-4">&nbsp</div>
    </div>
    <div class="row" id="freaturedCake">
        <div class="col-lg-12" id="headSlider">
            <div class="imageSliderCake imageSlider">&nbsp</div>
        </div>
        <div class="col-lg-12">
            <h1>Whole Cake</h1>
        </div>
        <div class="col-lg-4">
             <div class="imageFreatured"></div>
             <div class="textFreatured">
                 <h5>Chocolate Corn Flakes</h5>
             </div>
        </div>
        <div class="col-lg-4">
             <div class="imageFreatured"></div>
             <div class="textFreatured">
                 <h5>Putri Salju</h5>
             </div>
        </div>
        <div class="col-lg-4">
             <div class="imageFreatured"></div>
             <div class="textFreatured">
                 <h5>White Christmas Cake</h5>
             </div>
        </div>
        <div class="col-lg-4">
             <div class="imageFreatured"></div>
             <div class="textFreatured">
                 <h5>Nastar</h5>
             </div>
        </div>
        <div class="col-lg-4">
             <div class="imageFreatured"></div>
             <div class="textFreatured">
                 <h5>Kastengel</h5>
             </div>
        </div>
        <div class="col-lg-4">
             <div class="imageFreatured"></div>
             <div class="textFreatured">
                 <h5>Christmas Tree Cake</h5>
             </div>
        </div>
    </div>
     <div class="row" id="freaturedSliced">
        <div class="col-lg-12">
            <h1>Sliced Cake</h1>
        </div>
        <div class="col-lg-3">
             <div class="imageFreatured"></div>
             <div class="textFreatured">
                 <h5>Sacher Base</h5>
             </div>
        </div>
        <div class="col-lg-3">
             <div class="imageFreatured"></div>
             <div class="textFreatured">
                 <h5>Mocca Cake</h5>
             </div>
        </div>
        <div class="col-lg-3">
             <div class="imageFreatured"></div>
             <div class="textFreatured">
                 <h5>Domino Cake</h5>
             </div>
        </div>
        <div class="col-lg-3">
             <div class="imageFreatured"></div>
             <div class="textFreatured">
                 <h5>Purple Cake</h5>
             </div>
        </div>
    </div>
</div>