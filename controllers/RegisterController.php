<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Users;

class RegisterController extends Controller
{
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Users();

        if ($model -> load(yii::$app->request->post())) {
            $model->password = md5($model->password);
            $model->chg_password = $model->password;
            if ($model->save()) {
                Yii::$app->session->setFlash('success',"Вы успешно зарегистрировались");
                return $this->refresh();
            }
        }
        $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
        
        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
