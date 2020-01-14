<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Photogallery';
?>


 <div class="row">
 	
    <div class=" description-contact description-view">
		 <?= Html::encode($this->title) ?>
		</div>   
<?php 
	

	foreach ($models as $a) {
	    $tblimage = $a->getDefaultImage();
	    
	    if(isset($tblimage) == false || isset($tblimage->photopath) == false){
	        continue; 
	    }
	   
	    $url= $tblimage->photopath;
	    $name=$a->name;
	    
	    $url=Yii::getAlias("@web").$url;
	    $url=str_replace('\\', '/', $url);
	   	?>
        <div class="col-md-4">
          <div  class="card mb-4 shadow-sm">
           <a href="<?php echo Yii::getAlias("@web")?>/site/photodetail?id=<?php echo $a->id;?>">
             <img id="myImg" onclick="imageclick('<?php echo $url;?>', '')" alt="<?php echo $name;?>" src="<?php echo $url;?>"   width="100%" height="225">                                   
            </a>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
       <?php } ?> 
 </div>
 
 