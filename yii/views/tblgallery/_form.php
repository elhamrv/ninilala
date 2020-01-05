<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\TblGallery */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile(Yii::getAlias("@web")."/web/js/gallery.js");
?>

<div ng-controller="GalleryCtrl">

    <div class="form-image">
        <div class="tbl-gallery-form">
        	<p>
        		<button id="btnselect" Type="button"  class="btn btn-success" data-toggle="modal" data-target="#selectModalCenter">select</button>
            </p>
            <!-- Modal -->
        
            <?php $form = ActiveForm::begin(); ?>
        
            <?= $form->field($model, 'id')->textInput() ?>
        
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        
            <?= $form->field($model, 'price')->textInput() ?>
        
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        
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
         // echo print_r($url); exit;
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
    
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    </div>

</div>
	