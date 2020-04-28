<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageLoad extends Model
{
    public $image;
    
    public function rules()
    {
        return [
            ['image', 'required'],
            ['image', 'file', 'extensions' => 'jpg, png'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'image' => 'Изображение',
        ];
    }

    public function uploadFile(UploadedFile $file, $currentImage) {
		$this->image = $file;

			$this->deleteCurrentImage($currentImage);
			$filename = md5(uniqid($file->baseName)) . "." . $file->extension;
			$file->saveAs(yii::getAlias('@web') . 'uploads/' . $filename);

			return $filename;

	}

	public function deleteCurrentImage($currentImage) {
		if ($this->fileExists($currentImage)) {
			unlink(yii::getAlias('@web') . 'uploads/' . $currentImage);
		}
	}

	public function fileExists($currentImage) {
		if (!empty($currentImage) && $currentImage != null) {
			return file_exists(yii::getAlias('@web') . 'uploads/' . $currentImage);
		}
	}
}
