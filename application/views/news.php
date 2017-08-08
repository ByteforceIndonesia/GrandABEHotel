<br><br>
<div class="container">
    <section id="headerNews">
        <div class="row">
            <div class="col-lg-5">
                <div class="panelHeaderNews">
                    <h1>News & Promotions</h1>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <center>
        <section id="newsList">
    <?php foreach($news as $item): ?>
            <div class="row newsItem">
            <?php if($item->image): ?>
                <div class="col-lg-3 newsImg">
                    <div class="imgContainer">
                        <img class="img-responsive"
                        src="<?php echo base_url().'assets/images/news/' . $item->image?>"
                        width="250px">
                    </div>
                </div>
            <?php else: ?>
                <div class="col-lg-3">
                    &nbsp
                </div>
            <?php endif; ?>
                <div class="col-lg-9" style="padding-left: 50px">
                    <div class="row newsTitle">
                        <h2><?php echo $item->title ?></h2>
                    </div>
                    <div class="row postDate">
                        <strong><?php echo $item->name ?></strong>
                    </div>
                    <br>
                    <div class="row newsDesc">
                        <p>
                            <?php echo $item->content ?>
                        </p>
                    </div>
                </div>
            </div>
            <br><br>
    <?php endforeach; ?>
            <button id="btnOlder" class="btn btn-primary">Older</button>
        </section>
    </center>
    <br>
</div>