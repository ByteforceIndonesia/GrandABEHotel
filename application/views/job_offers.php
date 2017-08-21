<?php
/**
 * Created by PhpStorm.
 * User: John Nate
 * Date: 8/11/2017
 * Time: 7:42 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="headerJobs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panelHeaderJobs">
                    <h1>Job Opportunities</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="newsList">
    <div class="container">
        <?php foreach($jobs as $item): ?>
            <div class="row jobItem">
                <?php if($item->image): ?>
                    <div class="col-lg-4">
                        <div class="imgContainer">
                            <img src="<?php echo base_url().'assets/images/uploads/jobs/' . $item->image?>">
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-lg-8">
                    <div class="jobTitle">
                        <h2><?php echo $item->title ?></h2>
                    </div>
                    <div class="postDate">
                        <strong><?php echo $item->created ?></strong>
                    </div>
                    <br>
                    <div class="jobDesc">
                        <p>
                            <?php echo $item->content ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>