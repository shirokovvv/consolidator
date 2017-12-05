<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;

/**
 * MailModel is the model behind the login form.
 *
 * @property User|null $user This property is read-only. 
 *
 */
class MailModel extends Model
{ 
public static function mail_activation ($email, $cod)
    {
    $absoluteHomeUrl = Url::home(true); //http://ваш сайт
    $serverName = Yii::$app->request->serverName; //ваш сайт без http
    $url = $absoluteHomeUrl.'?r=site/activation&code='.$cod;

    $msg = "Здравствуйте! Спасибо за присоединение к системе 'Консолидатор'! Пожалуйста, подтвердите Ваш e-mail, перейдя по ссылке\n $url";

    $msg_html  = "<html><head><meta charset='utf-8'></head><body style='font-family:Arial,sans-serif;'>";
    $msg_html .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Здравствуйте! Спасибо за присоединение к системе 'Консолидатор'</h2>\r\n";
    $msg_html .= "<p><strong>Пожалуйста, подтвердите Ваш e-mail, перейдя по ссылке </strong></br><a href='". $url."'>$url</a></p>\r\n";
    $msg_html .= "</body></html>";

    Yii::$app->mailer->compose()
        //->setFrom('shirokovvv@mail.ru') //не надо указывать если указано в common\config\main-local.php
        ->setTo($email) // кому отправляем - реальный адрес куда придёт письмо формата asdf @asdf.com
        ->setSubject('Подтверждение регистрации.') // тема письма
        ->setTextBody($msg) // текст письма без HTML
        ->setHtmlBody($msg_html) // текст письма с HTML
        ->setCharset('utf-8')
        ->send();
    return 0;
    }
}
?>