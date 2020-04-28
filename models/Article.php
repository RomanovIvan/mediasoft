<?php

namespace app\models;

use Yii;
use yii\yii\helpers\ArrayHelper;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $descriprion
 * @property int $user_id
 * @property int $tag
 * @property string $image
 * @property string $viewed
 *
 * @property Users $user
 * @property Tag $tag0
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'descriprion', 'user_id', 'tag'], 'required'],
            [['user_id'], 'integer'],
            [['title'], 'string', 'max' => 100],
            [['descriprion'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'descriprion' => 'Описание',
            'user_id' => 'User ID',
            'tag' => 'Тэг',
            'image' => 'Изображение',
            'viewed' => 'Viewed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public function saveImage($filename) {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage() {
        return ($this->image) ? '/uploads/' . $this->image : 'ab-tom.jpg';
    }

    public function deleteImage() {
        $imageUploadModel = new ImageLoad();
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete() {
        $this->deleteImage();
        return parent::beforeDelete();
    }

    public function viewedCounter() {
        $this->viewed += 1;
        return $this->save();
    }
}
