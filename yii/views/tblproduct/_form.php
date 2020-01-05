<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Tblproduct */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="form-image">
<div class="tblproduct-form">
	<p>
		<button id="btnselect" Type="button"  class="btn btn-success" data-toggle="modal" data-target="#selectModalCenter">select</button>
    </p>
    
    <?php $form = ActiveForm::begin([
         'options' => ['enctype' => 'multipart/form-data'],
     ]); ?>

    <?= $form->field($model, 'type')->textInput() ?>
    
     <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'productcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['0' => ' ', '1' => 'verfügbar', '2' => 'ausverkauft']) ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>



<div class="modal fade " id="selectModalCenter" tabindex="-1" role="dialog" aria-labelledby="selectModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="selectModalLongTitle">Select Image</h5>
        <button   type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">
<div class="main-body">
<div class="row" style="margin: 0;">
 
 <?php
  foreach($images as $img){
      $cod=$img->photocod;
      $url=$img->thumbnailpath;
       $url=Yii::getAlias("@web").$url
      ?>
  
     <div class="col-md-2">
          <div  class="card mb-2 shadow-sm image-card">
               <img id="myImg" onclick="imageclick('<?php echo $url;?>', '')" alt="<?php echo $cod;?>" src="<?php echo $url;?>"   width="60px" height="60px">                                   
            <div class="image-card-body">
              <p class="image-card-text">
              	<input id="img<?php echo $img->id;?>" type="checkbox" value="<?php echo $img->id;?>" />
              	&nbsp;<label for="img<?php echo $img->id;?>"><?php echo $cod;?></label></p>
            </div>
          </div>
       </div>
     <?php }?> 
 	
  </div>
 </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div id="myModal" class="modal">
                  <span class="close">&times;</span>
                  <img class="modal-content" id="img01">
                  <div id="caption"></div>
 </div>
<script>
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



$('#selectModal').on('show.bs.modal', function (event) {
	  
	})


</script>