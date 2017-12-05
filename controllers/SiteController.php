<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginModel;
use app\models\ContactModel;
use app\models\RegNewUserModel;
use app\models\UserTable;
use yii\helpers\Url;

class SiteController extends Controller
{
//-----------Поведение контроллера
public function behaviors()
{
return ['access' => ['class' => AccessControl::className(),
                     'only' => ['logout'],
                     'rules' => [['actions' => ['logout'],
                                  'allow' => true,
                                  'roles' => ['@'],],],],
/*                   'verbs' => ['class' => VerbFilter::className(),
                                 'actions' => [
                                 'logout' => ['post'],],],*/
       ];
}

//----------Действия
public function actions()
{
return ['error' => ['class' => 'yii\web\ErrorAction',],
        'captcha' => ['class' => 'yii\captcha\CaptchaAction',
                      'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,],];
}

//----------Главная страница
public function actionIndex()
{
return $this->render('index');
}

//----------Вход пользователя
public function actionLogin()
{
if (!Yii::$app->user->isGuest) {return $this->goHome();}

$model = new LoginModel();
if ($model->load(Yii::$app->request->post()) && $model->login()) {return $this->goBack();}
return $this->render('login', ['model' => $model,]);
}

//----------Выход пользователя
public function actionLogout()
{
Yii::$app->user->logout();
return $this->goHome();
}

//----------Обратная связь
public function actionContact()
{
$model = new ContactModel();
if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) 
   {Yii::$app->session->setFlash('contactFormSubmitted');return $this->refresh();}
return $this->render('contact', ['model' => $model,]);
}
//
//-------------О фирме
//
public function actionAbout()
{
return $this->render('about');
}
//-------------Регистрация нового пользователя
public function actionRegnewuser()
{
if (!Yii::$app->user->isGuest) {return $this->goHome();} // Вход под пользователем - не надо
$model = new RegNewUserModel();
$model->postonly=1;
if (!$model->load(Yii::$app->request->post())) // Если не post-запрос, то выводим форму для заполнения
   {return $this->render('regnewuser', ['model' => $model,]);}
$model->postonly=0;
$model->doregistration(); // Передаем управление в модель на регистрацию
return $this->render('regnewuser', ['model' => $model,]);
}
//
//--------------Активация нового пользователя
//    
public function actionActivation()
{
$code = Yii::$app->request->get('code');
//$code = Html::encode($code);
//ищем код подтверждения в БД
$find = UserTable::find()->where(['activation_key'=>$code])->one();
$model = new RegNewUserModel();
$model->postonly=2;
if($find)
   {
   if($find->confirm!=0)
      {
      $model->mess='<p>Активания уже была произведена ранее.</p>';
	  return $this->render('regnewuser',['model' => $model,]);
      } 
   $find->confirm = 1;
   $find->status = 4;
   if ($find->save())
      {
      $model->mess = '<p>Поздравляю!</p><p>Ваш e-mail подтвержден и Вы зарегистрированы в системе в качестве наблюдателя.</p><p>Теперь, используя Ваш логин и пароль, Вы можете осуществить вход в систему</p>';
      return $this->render('regnewuser',['model' => $model,]);
      }
   }
$model->mess='<p>Произошла ошибка. Такого кода активации не найдено в системе.</p>';
return $this->render('regnewuser',['model' => $model,]);
//$absoluteHomeUrl = Url::home(true);
//return $this->redirect($absoluteHomeUrl, 303); //на главную
}

//
//-------------Услуги
//
public function actionServices()
{
return $this->render('services');
}	
	
}