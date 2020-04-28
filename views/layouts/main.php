<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <nav class="navbar main-menu navbar-default">
        <div class="container">
            <div class="menu-content">
                <ul class="nav navbar-nav">
                        <li>
                            <a data-toggle="dropdown" class="logo-link dropdown-toggle" href="/">MediaSoft</a>
                        </li>
                    </ul>
                <div class="navbar-collapse menu-main">
                    <ul class="nav navbar-nav">
                        <li>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="/">Главная</a>
                        </li>
                    </ul>
                    <div class="i_con">
                        <ul class="nav navbar-nav">
                            <?php if(Yii::$app->user->isGuest):?>
                                <li><a href="<?= Url::toRoute(['login/'])?>">Авторизация</a></li>
                                <li><a href="<?= Url::toRoute(['register/'])?>">Регистрация</a></li>
                            <?php else: ?>
                                <li><a href="<?= Url::toRoute(['myimage/'])?>">Мои изображения</a></li>
                                <li>
                                    <?= Html::beginForm(['/login/logout'], 'post')
                                    . Html::submitButton(Yii::$app->user->identity->fio,
                                    ['class' => 'btn btn-link logout logout-link']
                                    )
                                    . Html::endForm() ?>
                                </li>
                            <?php endif;?>
                        </ul>
                    </div>

                </div>
        </div>
        </div>
    </nav>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; MediaSoft <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
