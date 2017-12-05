<?php

/* @var $this yii\web\View */  
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\RegistrModel */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\assets\AppAsset;

//  $model->error          текст ошибки или пустая строка
//  $model->postonly       1-форма для логина, 0-вывод сообщения об активации, 2-поздравление с активацией
//  $model->mess           текст сообщения

AppAsset::register($this);
$this->title = 'Регистрация нового пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if ($model->postonly==1) { ?> 
<div class="registrdiv">
    <p>&nbsp</p> 
    <p>&nbsp</p> 
    <p>Заполните поля для регистрации:</p>
    <p>&nbsp</p> 
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],]); ?>
		
        <?= $form->field($model, 'username')->label('Логин:')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'surname')->label('Как в Вам обращаться (имя):')->textInput() ?>
        <?= $form->field($model, 'email')->label('Почта:')->textInput() ?>
        <?= $form->field($model, 'password_repeat')->label('Пароль:')->passwordInput() ?>
        <?= $form->field($model, 'password')->label('Ещё раз этот же пароль:')->passwordInput() ?>    
        <?= $form->field($model, 'verifyCode')->label('Проверочный код')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'reg-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
<?php } 
if ($model->postonly==0)
    {
	echo "<p>&nbsp</p>";	
    $err=$model->error;
	if($err!=''){echo $err;}
	else {echo 'На почтовый адрес, который Вы указали, выслано письмо со ссылкой, перейдя по которой, Вы подтвердите Вашу регистрацию.';}
	}
if ($model->postonly==2)
    {
    echo $model->mess;
	}	
?>
