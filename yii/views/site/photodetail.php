<?php
use app\models\Tblimage;
use yii\base\Model;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="row-photodetail:after">
<?php 

    $tblimage = $model->getDefaultImage();
    //echo print_r($tblimage);exit;
    
    $url= $tblimage->photopath;
    //echo print_r($url);exit;
    
    $url=Yii::getAlias("@web").$url;
    $url=str_replace('\\', '/', $url);
     ?>

	<div class="container-photodetail ">
		<span onclick="this.parentElement.style.display='none'" class="closebtn"></span>
		<img  class="img-photodetail-large" id="expandedImg"  src="<?php echo $url;?>">
		<div id="imgtext" class="imgtext-photodetail"></div>
	</div>
	<div class="row-photodetail">
<?php 
       $tblimages = $model->getImagesModel();
       foreach ($tblimages as $thumbnail){
       //echo print_r($tblimages);exit;
        $url= $thumbnail->thumbnailpath;
        $url=Yii::getAlias("@web").$url;
        $url=str_replace('\\', '/', $url);
	?> 
	
	
    <div class="column-photodetail ">
        <img  class="img-photodetail-thumbnail " src="<?php echo $url;?>" alt=" "  onclick="myFunction(this);">
    </div>
	<?php } ?>  </div>
</div>


<script>
function myFunction(imgs) {
    var expandImg = document.getElementById("expandedImg");
    var imgText = document.getElementById("imgtext");
    expandImg.src = imgs.src;
    imgText.innerHTML = imgs.alt;
    expandImg.parentElement.style.display = "block";
}
</script>
