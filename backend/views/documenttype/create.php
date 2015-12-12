<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Documenttype */

$this->title = 'Create Documenttype';
$this->params['breadcrumbs'][] = ['label' => 'Documenttypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documenttype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
