<?php

namespace app\models;

use Yii;
use yii\base\Model;


/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $fio
 * @property string $login
 * @property string $email
 * @property string $password
 *
 * @property Article[] $articles
 */
class Users extends \yii\db\ActiveRecord
{
    public $chg_password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'login', 'email', 'password'], 'required'],
            [['fio', 'email'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            ['chg_password', 'required', 'message' => 'Необходимо заполнить «Повторите пароль».'],
            [['fio'], 'string', 'max' => 70],
            ['password', 'string', 'max' => 34, 'min' => 6],
            ['email', 'email', 'message' => 'Неправильно заполненое поле, пример: ваша_почта@mail.ru'],
            ['chg_password', 'compare', 'compareAttribute'=>'password', 'message' => 'Пароли не совпадают.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'login' => 'Логин',
            'email' => 'Почта',
            'password' => 'Пароль',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['user_id' => 'id']);
    }
}
