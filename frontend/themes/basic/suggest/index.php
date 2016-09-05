<?php

/* @var $this \yii\web\View */

$this->title = '留言';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= \frontend\widgets\comment\CommentWidget::widget([
    'type' => 'suggest',
    'type_id' => 1,
    'listTitle' => '留言',
    'createTitle' => '留言'
]) ?>
