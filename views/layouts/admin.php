<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
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
<?= Html::csrfMetaTags() ?> 
<title>Система "Консолидатор"</title>
<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header>
   <h1>Административная часть</h1>
<div class='divmenuleft'>
<?php
if ((!Yii::$app->user->IsGuest) && (Yii::$app->user->identity->status<4))
   { 
//-----------Левое меню
   $itemss[0]=['label'=>'Пункт1','url'=> ['/admin/tables']];
   $itemss[1]=['label'=>'Пункт2','url'=> ['/admin/tables']];

   $itemsl[0]=['label' => 'Справочники', 'url' => ['/admin/tables'], 'items'=>$itemss, 'submenuTemplate'=>'<ul class="ulr">{items}</ul>']; // 'items'=>$itemss
   $itemsl[1]=['label' => 'Сделки', 'url' => ['/admin/trades']];
   $itemsl[2]=['label' => 'Заявки', 'url' => ['/admin/requests']];
   $itemsl[3]=['label' => 'Аукционы', 'url' => ['/admin/auctions']];
   $itemsl[4]=['label' => 'Перевозчики', 'url' => ['/admin/contact']];
   $itemsl[5]=['label' => 'Клиенты', 'url' => ['/admin/carriers']];
   $itemsl[6]=['label' => 'Экспедиторы', 'url' => ['/admin/forwarders']];
   if (Yii::$app->user->identity->status==1) $itemsl[7]=['label' => 'Пользователи', 'url' => ['/admin/users']]; //---Суперадминистратор
   $pars=['items' => $itemsl,'options'=> ['id'=>'mainmenuidleft','class'=>'mainmenubarleft','data'=>'menuleft',]];
   echo Menu::widget($pars);
   }
?>   
</div>
<div class='divmenuright'> 
<?php
if ((!Yii::$app->user->IsGuest) && (Yii::$app->user->identity->status<4))
   { 
//-----------Правое меню
   $UName = Yii::$app->user->identity->username;
   $itemsr[0]=['label' => 'Возврат на главную страницу', 'url' => ['/site/index']];
   $itemsr[1]=['label' => $UName];
   $pars=['items' => $itemsr,'options'=> ['id'=>'mainmenuidright','class'=>'mainmenubarright','data'=>'menuright',]];
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
 