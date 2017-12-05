<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class UserTable extends ActiveRecord
{
    public static function tableName()
    {
        return 'xdb_users';
    }

}
