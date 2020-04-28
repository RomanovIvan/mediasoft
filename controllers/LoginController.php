<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;

class LoginController extends Controller {
    public function actionIndex() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model_login = new LoginForm();
        if (Yii::$app->request->post('LoginForm')) {
            $model_login->attributes = Yii::$app->request->post('LoginForm');
            if ($model_login->validate()) {
                yii::$app->user->login($model_login->getUser());
                return $this->goHome();
            }
        }

        return $this->render('index', compact('model_login'));
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
