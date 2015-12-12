<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TopicId')->textInput() ?>

    <?= $form->field($model, 'DocumentTypeId')->textInput() ?>

    <?= $form->field($model, 'ParentDocumentId')->textInput() ?>

    <?= $form->field($model, 'Note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Year')->textInput() ?>

    <?= $form->field($model, 'Publication')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Date')->textInput() ?>

    <?= $form->field($model, 'Intro')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Summary')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EditionNumber')->textInput() ?>

    <?= $form->field($model, 'DocumentOrder')->textInput() ?>

    <?= $form->field($model, 'OldId')->textInput() ?>

    <?= $form->field($model, 'HTML')->textInput() ?>

    <?= $form->field($model, 'IndexId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
