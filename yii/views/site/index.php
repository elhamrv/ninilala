<?php

use app\models\Tblimage;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
 
<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
     <?php
     $slide = 0;
     foreach ($models as $a) {
     
     ?>
      <li data-target="#carouselExampleCaptions" data-slide-to="$slide" class="active"></li>
     
      <?php $slide ++;}?>
    </ol>
    
   <div class="carousel-inner">
     
     <?php 
	
     $index = 0;
	foreach ($models as $a) {
	    $tblimage = $a->getOneImage();
	   // echo print_r($tblimage);exit;
	    $url=$tblimage->photopath;
	    $t=$a->title;
	    $c=$a->comment;
	    $li=$a->url;
	   	?>
	   	
      <div class="carousel-item <?= $index == 0? 'active' : ''; ?>">
        <img src="<?php echo Yii::getAlias("@web").$url;?>" class="d-block carousel" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5><?php echo $t;?></h5>
          <p><a class="a-carousel" href="<?php echo Yii::getAlias("@web").$li;?>"><?php echo $c;?></a></p>
        </div>
      </div>
     <?php $index ++;}?> 
            
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  
  
  <div class="row margintop50" >
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>
  
  <div style="background-color: #ffaaff; min-height: 95vh; margin: 40px;">
		</div>
</div> 
 
 