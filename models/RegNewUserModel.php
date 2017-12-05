<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\MailModel;
use app\models\UserTable;

class RegNewUserModel extends Model
{
    public $username;
    public $password;
    public $password_repeat;
    public $surname;
    public $email;
    public $verifyCode;
	public $error;
	public $postonly;
	public $mess;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
    return [[['username', 'password', 'password_repeat', 'email','surname'], 'required'],  //--Обязательные поля
            ['email','email'],        //---E-mail корректный
            ['verifyCode', 'captcha'], //---Captcha введена правильно
            ['password','compare'],];  //---Пароли равны
    }

    public function doregistration() 
    {
    if (!$this->validate()) {$this->error='Не прошла валидация введённых данных';return true;}
    $code=Yii::$app->security->generateRandomString();
    $xmail=$this->email;
    MailModel::mail_activation($xmail,$code);
	$tbl=new UserTable;
	$n=$tbl::find()->where(['username' => $this->username])->count();
	if ($n!=0){$this->error='Пользователь с таким логином уже есть';return true;}
	$n=$tbl::find()->where(['email' => $this->email])->count();
	if ($n!=0){$this->error='Пользователь с такой почтой уже есть';return true;}
	$tbl->username=$this->username;
	$tbl->surname=$this->surname;
	$tbl->password=sha1($this->password);
	$tbl->auth_key="";
	$tbl->activation_key=$code;
	$tbl->confirm=0;
	$tbl->status=0;
	$tbl->email=$xmail;
	$tbl->firmid=0;
	$tbl->createdt=date("Y-m-d");
	$tbl->deleted=0;
	$tbl->save();
	$this->error='';
    return true;
    }

}
