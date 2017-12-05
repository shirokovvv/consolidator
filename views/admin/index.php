<?php

/* @var $this yii\web\View */
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = 'Административная часть';
?>

<div>
<?php if (!Yii::$app->user->IsGuest) { ?>
<?php echo Yii::$app->user->identity->username; ?>
<br>
<?php echo Yii::$app->user->identity->surname; ?>
<br>
<?php echo Yii::$app->user->identity->status; ?>
<?php } ?>
</div>

