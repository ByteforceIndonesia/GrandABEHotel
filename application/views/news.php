<section id="headerNews">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panelHeaderNews">
                    <h1>News & Promotions</h1>
                </div>
            </div>
        </div>
</section>
<section id="newsList">
    <div class="container">
    <?php foreach($news as $item): ?>
            <div class="row newsItem">
            <?php if($item->image): ?>
                <div class="col-lg-5">
                    <div class="imgContainer">
                        <img src="<?php echo base_url().'assets/images/uploads/news/' . $item->image?>">
                    </div>
                </div>
            <?php endif; ?>
                <div class="col-lg-7">
                    <div class="newsTitle">
                        <h2><?php echo $item->title ?></h2>
                    </div>
                    <div class="postDate">
                        <strong><?php echo $item->name ?></strong>
                    </div>
                    <br>
                    <div class="newsDesc">
                        <p>
                            <?php echo $item->content ?>
                        </p>
                    </div>
                </div>
            </div>
            <br><br>
    <?php endforeach; ?>
    </div>
</section>