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
        		<button id="btnselect" Type="button"  class="btn btn-success" ng-click="showDailog()" >select</button>
            </p>
            <!-- Modal -->
        
            <?php $form = ActiveForm::begin(); ?>
        
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        
            <?= $form->field($model, 'price')->textInput() ?>
        
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        
        <input ng-repeat="imgid in selectedImages" type="hidden" value="{{imgid}}" name="selectedImages[]"  >
        
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        
            <?php ActiveForm::end(); ?>
        
        </div>
    </div>


    <div class="modal " id="selectModalCenter" tabindex="-1" role="dialog" aria-labelledby="selectModalCenterTitle" ng-if="showModal" style="display: block;">
      <div class="modal-dialog modal-dialog-centered"  role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="selectModalLongTitle">Select Image</h5>
            <button   type="button" ng-click="hideDailog()" class="close"  data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    <div class="modal-body">
    <div class="main-body">
     <div class="row" style="margin: 0;">
      
         <div class="col-md-2" ng-repeat="img in images">
              <div  class="card mb-2 shadow-sm image-card">
                   <img id="myImg"  alt="{{img.code}}" src="{{img.url}}"   width="60px" height="60px">                                   
                <div class="image-card-body">
                  <p class="image-card-text">
                  	<input id="img{{img.id}}" type="checkbox" ng-checked="checkedlist[img.id]" ng-click="togglechecked(img.id)" value="{{img.id}}" />
                  	&nbsp;<label for="img{{img.id}}">{{img.code}}</label></p>
                </div>
              </div>
           </div>
   
     	
      </div>
     </div>
    
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  ng-click="hideDailog()">Close</button>
            <button type="button" class="btn btn-primary" ng-click="selectImages()">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    </div>

</div>
	