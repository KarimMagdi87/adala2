<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DocumenttypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documenttypes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documenttype-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Documenttype', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'DocumentTypeId',
            'Name',
            'TopicTypeId',
           //'topicType.Name',
            'Color',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
