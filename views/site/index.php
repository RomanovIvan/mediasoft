<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\grid\GridView;
?>

<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="all-post col-lg-6">
				<?php foreach($posts as $post): ?>
					<div class="post">
						<div class="post-thumb">
							<a href="<?= Url::toRoute(['site/view', 'id'=>$post->id]);?>"><h3 class="title-post"><?= $post->title ?></h3></a>
							<a href="<?= Url::toRoute(['site/view', 'id'=>$post->id]);?>"><img src="<?= $post->getImage();?>" alt=""></a>
							<a href="<?= Url::toRoute(['site/view', 'id'=>$post->id]);?>" class="post-thumb-overlay">
								<div class="views-post"></div>
							</a>
							<div class="eye-count text-center pull-left">
								<i class="eye-viewed"><?= (int) $post->viewed ?></i> 
								<i class="index-tag">#<?= $post->tag ?></i>
							</div>
							<a href="<?= Url::toRoute(['site/view', 'id'=>$post->id]);?>" class="post-thumb-overlay">
								<div class="btn-view">Подробнее</div>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>