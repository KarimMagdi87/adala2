<?php

/* @var $this yii\web\View */



foreach($documentTypeName as $d){
$name =  $d['name'];
}

$this->title = $document['Title'];
$this->params['breadcrumbs'][] = ['label' => $name, 'url' => ['site/components/'.$document['DocumentTypeId']]];
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="row">
    <div class="col-md-12">
        <h4 class="page-title"><i class="fa fa-file-text-o fa-lg"></i>&nbsp;<?php echo $this->title; ?></h4>
    </div>
</div>
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="text-box">
            <?php foreach($documentitem as $di) { ?>
                <p><?php echo $di['Title']; ?></p>
                <p><?php echo $di['Text']; ?></p>
            <?php } ?>
        </div><!--text-box-->
    </div>
</div> <!-- row -->