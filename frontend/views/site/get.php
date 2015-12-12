<?php

/* @var $this yii\web\View */

$this->title = $topictype['Name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row main-view documenttype">

    <?php
      foreach($documenttype as $dt){ ?>

    <div class="col-lg-3 col-md-6">
        <a href="<?= Yii::$app->getUrlManager()->getBaseUrl()."/site/components/".$dt['DocumentTypeId']; ?>" class="panel panel-primary main-panel">
            <img src="<?= Yii::$app->request->baseUrl ?>/img/polygon-icon.png"><?php echo $dt['Name']; ?>
        </a>
    </div>
     <?php } ?>

    <!--div class="col-lg-3 col-md-6"> <a href="#" class="panel panel-primary main-panel"> <img src="img/polygon-icon.png">قانون </a> </div>
    <div class="col-lg-3 col-md-6"> <a href="#" class="panel panel-primary main-panel"> <img src="img/polygon-icon.png">مرسوم</a> </div>
    <div class="col-lg-3 col-md-6"> <a href="#" class="panel panel-primary main-panel"> <img src="img/polygon-icon.png">مرسوم بقانون</a> </div>
    <div class="col-lg-3 col-md-6"> <a href="#" class="panel panel-primary main-panel"> <img src="img/polygon-icon.png">قرار</a> </div>
    <div class="col-lg-3 col-md-6"> <a href="#" class="panel panel-primary main-panel"> <img src="img/polygon-icon.png">لائحة</a> </div>
    <div class="col-lg-3 col-md-6"> <a href="#" class="panel panel-primary main-panel"> <img src="img/polygon-icon.png">مذكرة إيضاحية</a> </div>
    <div class="col-lg-3 col-md-6"> <a href="#" class="panel panel-primary main-panel"> <img src="img/polygon-icon.png">قرار بلائحة</a> </div>
    <div class="col-lg-3 col-md-6"> <a href="#" class="panel panel-primary main-panel"> <img src="img/polygon-icon.png">تعميم</a> </div-->
</div>
<!-- row -->