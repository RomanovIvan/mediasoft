<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<?php if (Yii::$app->user->identity->id != $article->user_id): ?>
<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="post">
					<div class="post-thumb">
						<h1 class="entry-title"><?= $article->title?></h1>
						<img src="<?= $article->getImage();?>" alt="">
					</div>
					<div class="post-content">
						<p class="desc"><?= $article->descriprion?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<? else: ?>
<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="post">
					<div class="post-thumb">
						<h1 class="entry-title"><?= $article->title ?></h1>
						<img src="<?= $article->getImage();?>" alt="">
					</div>
					<div class="post-content">
						<i class="desc"><?= $article->descriprion ?></i>
					</div>
					<div class="delete-image">
						<p class="tag">#<?= $article->tag ?></p>
						<?= Html::a('Удалить', ['delete', 'id' => $article->id], [
				            'class' => 'btn btn-danger',
				            'data' => [
				                'confirm' => 'Вы действительно хотите удалить пост?',
				                'method' => 'post',
				            ],
				        ]) ?>
		        	</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>