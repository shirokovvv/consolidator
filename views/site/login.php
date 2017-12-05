<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginModel */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="logindiv">
    <p>&nbsp</p> 
    <p>&nbsp</p> 
    <p>Заполните поля для входа в систему:</p>
    <p>&nbsp</p> 
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"input-fields\">{input}</div>\n<div class=\"input-fields\">{error}</div>",
            'labelOptions' => ['class' => 'input-fields'],
        ],
    ]); ?>
        <?= $form->field($model, 'username')->label('Логин:')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->label('Пароль:')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->label('Запомнить:')->checkbox([
            'template' => "<div >{input}{label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
