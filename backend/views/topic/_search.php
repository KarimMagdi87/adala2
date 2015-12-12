<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TopicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="topic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TopicId') ?>

    <?= $form->field($model, 'TopicTypeId') ?>

    <?= $form->field($model, 'Name') ?>

    <?= $form->field($model, 'ParentTopicId') ?>

    <?= $form->field($model, 'TopicOrder') ?>

    <?php // echo $form->field($model, 'OldId') ?>

    <?php // echo $form->field($model, 'DocumentCount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
