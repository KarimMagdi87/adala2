<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Topictype;

/* @var $this yii\web\View */
/* @var $model backend\models\Documenttype */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documenttype-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DocumentTypeId')->textInput() ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'TopicTypeId')->textInput() ?-->
    <?= $form->field($model, 'TopicTypeId')->dropDownList(
        ArrayHelper::map(Topictype::find()->all(), 'TopicTypeId', 'Name'),
        ['prompt'=>'Select topic Type']

    ) ?>

    <?= $form->field($model, 'Color')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
