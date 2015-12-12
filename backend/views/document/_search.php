<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DocumentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'DocumentId') ?>

    <?= $form->field($model, 'TopicId') ?>

    <?= $form->field($model, 'DocumentTypeId') ?>

    <?= $form->field($model, 'ParentDocumentId') ?>

    <?= $form->field($model, 'Note') ?>

    <?php // echo $form->field($model, 'Year') ?>

    <?php // echo $form->field($model, 'Publication') ?>

    <?php // echo $form->field($model, 'Date') ?>

    <?php // echo $form->field($model, 'Intro') ?>

    <?php // echo $form->field($model, 'Summary') ?>

    <?php // echo $form->field($model, 'Text') ?>

    <?php // echo $form->field($model, 'Title') ?>

    <?php // echo $form->field($model, 'Number') ?>

    <?php // echo $form->field($model, 'EditionNumber') ?>

    <?php // echo $form->field($model, 'DocumentOrder') ?>

    <?php // echo $form->field($model, 'OldId') ?>

    <?php // echo $form->field($model, 'HTML') ?>

    <?php // echo $form->field($model, 'IndexId') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
