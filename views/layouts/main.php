<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use app\assets\AppAsset;
use yii\web\User;
use yii\web\YiiAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css?family=Kurale|Open+Sans|Raleway" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Exo+2|Jura|Open+Sans+Condensed:300|Poiret+One" rel="stylesheet"> 
<script src="https://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
<?= Html::csrfMetaTags() ?> 
<title>Система "Консолидатор"</title>
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
   <h1>Система "Консолидатор"</h1>
   <h3>Российская торговая система управления перевозками</h3>
    <?php 
///   $isGuest = Yii::$app->user->isGuest;
///   if (!$isGuest){echo Yii::$app->user->identity->surname;} 
   ?>   
   <div class='divmenuleft'>
<?php
//-----------Левое меню
$itemsl[0]=['label' => 'Главная', 'url' => ['/site/index']];
$itemsl[1]=['label' => 'О компании', 'url' => ['/site/about']];
$itemsl[2]=['label' => 'Услуги', 'url' => ['/site/services']];
$itemsl[3]=['label' => 'Обратная связь', 'url' => ['/site/contact']];
$pars=['items' => $itemsl,'options'=> ['id'=>'mainmenuidleft','class'=>'mainmenubarleft','data'=>'menuleft',],];
echo Menu::widget($pars);
?>
</div>
   <div class='divmenuright'>
<?php
//-----------Правое меню
$isGuest = Yii::$app->user->isGuest;
if ($isGuest) // Если никто и звать никак
      {
	  $itemsr[0]=['label' => 'Вход', 'url' => ['/site/login']];
	  $itemsr[1]=['label' => 'Регистрация', 'url' => ['/site/regnewuser']];
	  $pars=['items' => $itemsr,'options'=>['id'=>'mainmenuidright','class'=>'mainmenubarright','data'=>'menuright',],];
      echo Menu::widget($pars);
      }
else  {    // Если это пользователь
	  $UName = Yii::$app->user->identity->username;
	  if (Yii::$app->user->identity->status<4)         // Если суперадмин, админ, пользователь (1,2,3)
	     {
	     $itemsr[0]=['label' => 'Выйти', 'url' => ['/site/logout']];
         $itemsr[1]=['label' => 'Администрирование', 'url' => ['/admin/index']];
         $itemsr[2]=['label' => $UName];
		 }
	  else
	     {
	     $itemsr[0]=['label' => 'Выйти', 'url' => ['/site/logout']];
	     $itemsr[1]=['label' => 'Личный кабинет', 'url' => ['/site/cabinet']];
         $itemsr[2]=['label' => $UName];
	     } 		  
      $pars=['items' => $itemsr,'options'=>['id'=>'mainmenuidright','class'=>'mainmenubarright','data'=>'menuright',],];
      echo Menu::widget($pars);
      }
?>
</div>       
</header>

<?= $content ?>  
    
<?php $this->endBody() ?>
</body> 
</html>
<?php $this->endPage() ?>
