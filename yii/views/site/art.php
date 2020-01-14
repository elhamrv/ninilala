
<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
//use Codeception\PHPUnit\ResultPrinter\HTML;

$this->title = 'Artwork';

?>

<div class="row">
	<div class=" description-contact description-view">
		 <?= Html::encode($this->title) ?>
	</div> 
<?php
foreach($models as $pr){
    $tblimage = $pr->getDefaultImage();
    
    if(isset($tblimage) == false || isset($tblimage->photopath) == false){
        continue;
    }
    $url = $tblimage->photopath;
    $name=$pr->productname;
    $quantity=$pr->quantity;
    $url=Yii::getAlias("@web").$url;
?>
<div class="col-md-3">
          <div  class="card mb-4 shadow-sm">
               <img id="myImg" onclick="imageclick('<?php echo $url;?>', '')" alt="<?php echo $name;?>" src="<?php echo $url;?>"   width="100%" height="225">                                   
            <div class="card-body">
              <p class="card-text"><?php echo $name;?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">kaufen</button>
                  
                </div>
                <small class="text-muted"><?php echo $quantity;?> Stück verfügbar</small>
              </div>
            </div>
          </div>
       </div>
     <?php }?> 
  </div>
	
			
                <div id="myModal" class="modal">
                  <span class="close">&times;</span>
                  <img class="modal-content" id="img01">
                  <div id="caption"></div>
                </div>
 
 <script>
                    // Get the modal
                    var modal = document.getElementById("myModal");
                    
                    // Get the image and insert it inside the modal - use its "alt" text as a caption
                    var img = document.getElementById("myImg");
                    var modalImg = document.getElementById("img01");
                    var captionText = document.getElementById("caption");
                    
                    
                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];
                    
                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() { 
                      modal.style.display = "none";
                    }

                    modal.onclick = function() { 
                        modal.style.display = "none";
                      }

                    function imageclick(src, title){
                        modal.style.display = "block";
                        modalImg.src = src;
                        captionText.innerHTML = title;
                      }                    
 </script>
  