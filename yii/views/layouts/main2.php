
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
            			  <a href="/" id="">HOME</a>
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
    
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
