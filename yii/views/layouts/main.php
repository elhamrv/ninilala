
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body ng-app="myApp" ng-controller="BodyController" >
<?php $this->beginBody() ?>

<div class="wrap" >
    
    <header class="page-header" id="navbar">
    	
        <ul  class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo Yii::getAlias("@web")?>"><img src="<?php echo Yii::getAlias("@web")?>/web/images/logo.jpg"  ></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo Yii::getAlias("@web")?>/site/photogallery">PhotoGallery</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="<?php echo Yii::getAlias("@web")?>/site/art">Art</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo Yii::getAlias("@web")?>/site/about">About</a>
          </li>
          <li class="nav-item">
          	 <a class="nav-link " href="<?php echo Yii::getAlias("@web")?>/site/contact" tabindex="-1">Contact</a>
          </li>
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Manegment</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo Yii::getAlias("@web")?>/tblimage/index">Image Manegment</a>
              <a class="dropdown-item" href="<?php echo Yii::getAlias("@web")?>/tblgallery/index">Gallery Manegment</a>
              <a class="dropdown-item" href="<?php echo Yii::getAlias("@web")?>/tblproduct/index">Product Manegment</a>
              <a class="dropdown-item" href="<?php echo Yii::getAlias("@web")?>/ninicarousel/index">Carousel Manegment</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </li>
        </ul>
    </header>
   

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer clearfix page-footer">
	<div class="footer-child box">
		<a href="<?php echo Yii::getAlias("@web")?>"><img src="<?php echo Yii::getAlias("@web")?>/web/images/logo.jpg"  width="60" height="20" ></a>
		<br>
		<a href=""  class="">Impressum</a>
    </div>     
	<div class="footer-child box">
            <a  href="#" class=""><img src="<?php echo Yii::getAlias("@web")?>/web/images/icons/facebook.png" width="30" height="30" ></a>
           
        	<a href="https://www.instagram.com/ninilala__/" class="">
        		<img src="<?php echo Yii::getAlias("@web")?>/web/images/icons/instagram.png" width="30" height="30" >
        	</a>
		</div> 
	
	<div class="footer-child box">
       <a href="<?php echo Yii::getAlias("@web")?>/site/contact" class="">Cantact</a>
    </div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
