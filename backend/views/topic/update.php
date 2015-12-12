<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Topic */

$this->title = 'Update Topic: ' . ' ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->TopicId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="topic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
