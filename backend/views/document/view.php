<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Document */

$this->title = $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->DocumentId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->DocumentId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'DocumentId',
            'TopicId',
            'DocumentTypeId',
            'ParentDocumentId',
            'Note:ntext',
            'Year',
            'Publication:ntext',
            'Date',
            'Intro:ntext',
            'Summary:ntext',
            'Text:ntext',
            'Title:ntext',
            'Number',
            'EditionNumber',
            'DocumentOrder',
            'OldId',
            'HTML',
            'IndexId',
        ],
    ]) ?>

</div>
