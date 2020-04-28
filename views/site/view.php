<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Фотографии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Загрузить картинку', ['load-image', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title' => [
                'attribute'=>'title',
                'label' => 'Название изображения',
            ],
            'descriprion' => [
                'attribute'=>'descriprion',
                'label' => 'Описание изображения',
            ],
            'user_id' => [
                'attribute'=>'user_id',
                'label' => 'Автор',
                'value'=> Yii::$app->user->identity->fio,
            ],
            'tag' => [
                'attribute'=>'tag',
                'label' => 'Тэг',
            ],
            'image' => [
                'attribute'=>'image',
                'label' => 'Фотография',
                'format' => 'html',
                'value' => function($data) {
                    return Html::img($data->getImage(), ['width' => 200]);
                }
            ],
        ],
    ]) ?>

</div>
