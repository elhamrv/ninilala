
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

    <div class="main-container">
    
        <div id="mobileNav" class="">
          <div class="wrapper">
            <nav class="main-nav mobileNav">
            <ul>
              <li class="page-collection active-link">
                  <a href="/">HOME</a>
             </li>
             <li class="page-collection">
                  <a href="/about">About</a>
             </li>
             <li class="page-collection">   
                  <a href="/new-page-1">Artwork</a>
            </li>
            <li class="page-collection">
                  <a href="/new-page">Instagram</a>
            </li>
            <li class="page-collection">
                  <a href="/contact">Contact</a>            
            </li>
            <li class="products-collection">
                  <a href="/shop">Shop</a>           
            </li>
          </ul>
          </nav>
         </div>
        </div>
    
    	<header id="header" class="header clear">
    
          <div id="upper-logo" class="upper-logo">
            <div id="mobileMenuLink" class="mobileMenuLink">
            <a class="no-display">Menu</a>
            </div>
            <h1 class="logo" >
              <a href="/" id="">Ninilala</a>
            </h1>
          </div>
          
          <div class="topNav" id="topNav">
      		<nav class="main-nav">
           		<ul class="">
            
                    <li class="page-collection active-link" id="">
            			  <a href="<?php echo Yii::getAlias("@web")?>" id="">HOME</a>
                    </li>
            		<li class="page-collection">
            			  <a href="<?php echo Yii::getAlias("@web")?>/site/about">About</a>
            		</li>
            		<li class="page-collection">
            			  <a href="<?php echo Yii::getAlias("@web")?>/site/photogallery">Photogallery</a>
                    </li>
                    <li class="page-collection">
            			  <a href="<?php echo Yii::getAlias("@web")?>/site/art">Artwork</a>
                    </li>
                    <li class="page-collection">
            			  <a href="https://www.instagram.com/ninilala__/">Instagram</a>
                    </li>
            		<li class="page-collection">
            			 <a href="<?php echo Yii::getAlias("@web")?>/site/contact">Contact</a>
                    </li>
            		<li class="products-collection">
            			 <a href="<?php echo Yii::getAlias("@web")?>/site/shop">Shop</a>
                    </li>
                    <?php if (!Yii::$app->user->isGuest) {?>
                     <li class=" products-collection">
                        <a class=" dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Manegment</a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="<?php echo Yii::getAlias("@web")?>/tblimage/index">Image Manegment</a>
                          <a class="dropdown-item" href="<?php echo Yii::getAlias("@web")?>/tblgallery/index">Gallery Manegment</a>
                          <a class="dropdown-item" href="<?php echo Yii::getAlias("@web")?>/tblproduct/index">Product Manegment</a>
                          <a class="dropdown-item" href="<?php echo Yii::getAlias("@web")?>/ninicarousel/index">Carousel Manegment</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Separated link</a>
                       </div>
                   </li>
                   <?php } ?>
          		</ul>
          		<div class="navbar-line"></div>
          	
    		</nav>
    	</div>
    
        </header>
        
        <div class="container">
            <?= $content ?>
        </div>
        
       	<div class="footerline"></div>
    
        <footer class="footer clearfix page-footer">
        	<div class="footer-child box">
        		<a href="<?php echo Yii::getAlias("@web")?>/site/impressum"  class="">
        		<img src="<?php echo Yii::getAlias("@web")?>/web/images/icons/impressum1.png" width="50" height="50" >
        		</a>
            </div>     
        	<div class="footer-child box">
                    <a  href="#" class="">
                    <img src="<?php echo Yii::getAlias("@web")?>/web/images/icons/face.png" width="40" height="40" >
                    </a>                  
                	<a href="https://www.instagram.com/ninilala__/" class="">
                		<img src="<?php echo Yii::getAlias("@web")?>/web/images/icons/insta.png" width="40" height="40" >
                	</a>
                	<a href="<?php echo Yii::getAlias("@web")?>/site/contact" class="">
               			<img src="<?php echo Yii::getAlias("@web")?>/web/images/icons/mail.png" width="40" height="40" >
              		 </a>
        		</div> 
        	
        	<div class="footer-child box">
               
            <?php if (Yii::$app->user->isGuest) {?>
				<a href="<?php echo Yii::getAlias("@web")?>/site/login" class="">
                	<img src="<?php echo Yii::getAlias("@web")?>/web/images/icons/login.png" width="50" height="50" >
                </a>
             <?php } else { ?>
             	<a href="<?php echo Yii::getAlias("@web")?>/site/logout" class="">
                	<img src="<?php echo Yii::getAlias("@web")?>/web/images/icons/logout.png" width="40" height="40" >
                </a>
             <?php }  ?>
             
            </div>
    	</footer>
    
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
