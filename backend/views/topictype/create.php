<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Topictype */

$this->title = 'Create Topictype';
$this->params['breadcrumbs'][] = ['label' => 'Topictypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topictype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
