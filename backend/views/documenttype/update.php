<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Documenttype */

$this->title = 'Update Documenttype: ' . ' ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Documenttypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->DocumentTypeId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="documenttype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
