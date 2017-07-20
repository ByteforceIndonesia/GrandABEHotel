<br><br>
<section id="headerNews">
	<div class="row">
		<div class="col-lg-2">&nbsp</div>
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
			<div class="col-lg-3 newsImg">
				<div class="imgContainer">
					<img class="img-responsive" src="
					<?php echo base_url().'assets/images/uploads/news/testNews.jpg'?>" 
					width="100px" height="100px">
				</div>
			</div>
			<div class="col-lg-9">
				<div class="row newsTitle">
					<?php echo $item->title ?>
				</div>
				<div class="row postDate">
					
				</div>
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