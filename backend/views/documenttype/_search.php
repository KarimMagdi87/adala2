<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DocumenttypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documenttype-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'DocumentTypeId') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'TopicTypeId') ?>

    <?= $form->field($model, 'Color') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
