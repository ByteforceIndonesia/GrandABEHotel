<?php
/**
 * Created by PhpStorm.
 * User: John Nate
 * Date: 8/11/2017
 * Time: 7:42 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    #body {
        background: #1B2021;
        color:#f4f3f2;
    }
</style>
<div class="container">
    <div class="row">
        <section id="headerJobs">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panelHeaderJobs">
                        <h1>Job Opportunities</h1>
                    </div>
                </div>
            </div>
        </section>
    </div>
        <section id="newsList">
            <?php foreach($jobs as $item): ?>
                <div class="row jobItem">
                    <?php if($item->image): ?>
                        <div class="col-lg-3 jobImage">
                            <div class="imgContainer">
                                <img class="img-responsive"
                                     src="<?php echo base_url().'assets/images/uploads/jobs/' . $item->image?>"
                                     width="250px">
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-9" style="padding-left: 50px">
                        <div class="row jobTitle">
                            <h2><?php echo $item->title ?></h2>
                        </div>
                        <div class="row postDate">
                            <strong><?php echo $item->created ?></strong>
                        </div>
                        <br>
                        <div class="row jobDesc">
                            <p>
                                <?php echo $item->content ?>
                            </p>
                        </div>
                    </div>
                </div>
                <br><br>
            <?php endforeach; ?>
        </section>
    </div>
</div>