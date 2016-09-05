<?php

/* @var $this yii\web\View */
/* @var $model frontend\models\Article */
/* @var $dataModel common\models\ArticleData */

$this->title = '投稿';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-create">

    <?= $this->render('_form', [
        'model' => $model,
        'dataModel' => $dataModel
    ]) ?>

</div>
