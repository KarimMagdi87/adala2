<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Topictype */

$this->title = 'Update Topictype: ' . ' ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Topictypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->TopicTypeId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="topictype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
