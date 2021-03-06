<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Document */

$this->title = 'Update Document: ' . ' ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'id' => $model->DocumentId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="document-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
