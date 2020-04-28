<?php

namespace app\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\web\Controller;
use app\models\ImageLoad;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Users;

class MyimageController extends Controller {

    public function actionIndex()
    {
        $posts = Article::find()->all();

        return $this->render('index', [
            'posts' => $posts,
        ]);
    }
}
