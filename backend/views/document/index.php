<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DocumentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Document', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'DocumentId',
            'TopicId',
            'DocumentTypeId',
            'ParentDocumentId',
            'Note:ntext',
             'Year',
            // 'Publication:ntext',
             'Date',
             'Intro:ntext',
            // 'Summary:ntext',
            // 'Text:ntext',
             'Title:ntext',
            // 'Number',
            // 'EditionNumber',
            // 'DocumentOrder',
            // 'OldId',
            // 'HTML',
            // 'IndexId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
