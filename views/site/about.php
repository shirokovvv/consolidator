<?php

/* @var $this yii\web\View */

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\Column;
use yii\grid\DataColumn;
use yii\data\ActiveDataProvider;
use app\assets\AppAsset;
use app\models\UserTable;
use app\models\CountryTable;

$dataprovider = new ActiveDataProvider(
                    ['query'=>UserTable::find(),'pagination'=>['pageSize'=>20],]);

AppAsset::register($this);
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aboutus">
    <h1><?= $this->title ?></h1>
    <p>
<?php	
/*echo GridView::widget(
    [
    'dataProvider' => $dataprovider,
	
	'columns'=>[
               ['attribute' => 'username','format' => 'text','label' => 'Имя', 'headerOptions' => ['style' => 'color:red'],],
               ['attribute' => 'password','format' => 'text','label' => 'Пароль',],
               ['attribute' => 'countryid','format' => 'text','label' => 'Страна',
                               'content'=>function ($model, $key, $index, $column)
							              {$rc=CountryTable::find()->where(['id'=>$model->countryid])->one();if($rc)return $rc->name;else return "";}],
               ]

	
    ]
);*/	
?>
        This is the About page. You may modify the following file to customize its content:
        Это информационная страница
    </p>
<script type="text/javascript">
    var home_map,myGeoObject;
        
    ymaps.ready(function(){
        home_map = new ymaps.Map("first_map", {
            center: [51.6984, 39.223],
            zoom: 18
        }),
    myGeoObject = new ymaps.Placemark(home_map.getCenter(),{},{});
    home_map.geoObjects.add(myGeoObject); // Размещение геообъекта на карте
    });
</script>	
<div id="first_map" style="width:500px; height:400px"></div>
<?php	
/*
//-----------Test SqlQuery
$db = new yii\db\Connection(['dsn' => 'mysql:host=localhost;dbname=xdb','username' => 'root','password' => 'root','charset' => 'utf8',]);
$ps=Yii::$app->db->createCommand('SELECT u.username as u1,u.surname as u2,c.name as u3 FROM xdb_users as u,xdb_countries as c WHERE u.countryid=c.id') ->queryAll();
foreach($ps as $p)
   {
   foreach ($p as $i) 
      { 
      echo $i;echo " ";
      }
   echo "<br>";	  
   echo $p['u1'].' '.$p['u2'].' '.$p['u3'];
   echo "<br>";
   }*/
?>
<?php
/*CKEditor::widget([
    'editorOptions' => [
        'name' =>'',  
        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ]
]);*/
?>

</div>
