<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = 'Мои изображения';
?>
<div class="main-content">
	<div class="container">
			<p><?= Html::a('Добавить фотографию', ['site/create'], ['class' => 'btn btn-success']) ?></p>
		<div class="row">
			<div class="all-post col-lg-8">
				<?php foreach($posts as $post): ?>
					<?php if (Yii::$app->user->identity->id == $post->user_id): ?>
					<div class="post">
						<div class="post-thumb">
							<a href="<?= Url::toRoute(['site/view', 'id'=>$post->id]);?>"><h3><?= $post->title ?></h3></a>
							<a href="<?= Url::toRoute(['site/view', 'id'=>$post->id]);?>"><img src="<?= $post->getImage();?>" alt=""></a>
							<a href="<?= Url::toRoute(['site/view', 'id'=>$post->id]);?>" class="post-thumb-overlay">
								<div class="views-post"></div>
							</a>
							<div class="eye-count text-center pull-left">
								<i class="eye-viewed"><?= (int) $post->viewed ?></i>
							</div>
							<a href="<?= Url::toRoute(['site/view', 'id'=>$post->id]);?>" class="post-thumb-overlay">
								<div class="btn-view">Подробнее</div>
							</a>
						</div>
					</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
