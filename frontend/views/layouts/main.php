<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\FrontAsset;
use common\widgets\Alert;
use yii\helpers\Url;

FrontAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--div class="wrap"-->
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header col-md-2">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="#">الأقسام</a> </div>
        <!-- Top Menu Items -->
        <form id="custom-search-form" class="form-search form-horizontal pull-right col-md-6 col-xs-11">
            <div class="input-append mac-style col-md-12">
                <input type="text" class="search-query" placeholder="بحث">
                <button type="submit" class="btn"><i class="fa fa-search fa-lg"></i></button>
            </div>
        </form>
        <ul class="nav navbar-left top-nav">
            <?php
            if (Yii::$app->user->isGuest) {
                /*$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];*/
               // echo "login";
                return Yii::$app->getResponse()->redirect('site/login');

            } else {
               /* $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];*/

            }
            //echo $this->params['customParam'];

            ?>
            <!--li> <a href="" class="logout">خروج<img src="<//?= Yii::$app->request->baseUrl ?>/img/logout.png " ></a> </li-->
            <li><?= Html::a('خروج', ['/site/logout'], ['data-method'=>'post', 'class' => 'logout']) ?></li>
            <li> <a href="#" class="user"><span></span><?php echo \Yii::$app->user->identity->username; ?></a> </li>

        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <div class="side-nav">
                <div class="user"> <span></span>
                    <div><strong><?php echo \Yii::$app->user->identity->username; ?></strong> <?= Html::a('خروج', ['/site/logout'], ['data-method'=>'post', 'class' => 'logout']) ?> </div>
                </div>
                <ul class="nav navbar-nav">
                    <?php
                    if(isset($this->params['topicType'])){
                    foreach($this->params['topicType'] as $tp){  ?>
                     <!--li class="active"><a href="index.html">التشريعات</a></li-->
                    <li><a class="ttopictype" id="<?php echo $tp['TopicTypeId']; ?>" href="<?= Yii::$app->getUrlManager()->getBaseUrl()."/site/get/".$tp['TopicTypeId']; ?>"><?php echo $tp['Name']; ?></a></li>
                    <?php }}?>
                </ul>
            </div>
        </div>
        <!-- /.navbar-collapse -->


    </nav>
    <!--div class="container"-->
   <div id="page-wrapper">
        <div class="container-fluid">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>

<!--footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><//?= Yii::powered() ?></p>
    </div>
</footer-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<script type="text/javascript">
    $(function () {
        $(".topictype").click(function(e){
            e.preventDefault();
            var topicTypeId = $(this).attr('id');
            var result = "";
            $.ajax({
                type : "POST",
                url : 'site/get',
                data : 'topicTypeId='+topicTypeId,
                cache: false,
                dataType:'JSON',
                success : function(response) {
                    $(".documenttype").html('');
                    $.each(response, function (i, item) {
                        result += '<div class="col-lg-3 col-md-6"> <a href="site/components/'+item.documentTypeId+'" class="panel panel-primary main-panel"> <img src="img/polygon-icon.png">'+item.name+'</a> </div>';
                    });
                    $(".documenttype").append(result);
                }
            });
        });

        $(".primary").change(function(){
            var documentTypeId = $("#hidden").val();
            var table = "";
            var topicId = $(this).val();
            var result = '<option value="">اختر تصنيف فرعي</option>';
            $.ajax({
                type : "POST",
                url : '<?= Yii::$app->getUrlManager()->getBaseUrl()."/site/secondary" ?>',
                data : 'topicId='+topicId,
                cache: false,
                dataType:'JSON',
                success : function(response) {
                    $(".secondary").html('');
                    $.each(response, function (i, item) {
                        result += '<option value="'+item.topicId+'">'+item.name+'</option>';
                    });
                    $(".secondary").append(result);
                }
            });


            $.ajax({
                type : "POST",
                url : '<?= Yii::$app->getUrlManager()->getBaseUrl()."/site/primarydocument" ?>',
                data : 'topicId=' + topicId + '&documentTypeId='+documentTypeId,
                cache: false,
                dataType:'JSON',
                success : function(response) {
                    $(".resultdoc").html('');
                   // alert(response);
                    if(response == " "){
                        $(".sss").html('');
                        $(".sss").text('No Results found');
                    }
                    //$(".secondary").html('');
                    $.each(response, function (i, item) {

                       table += '<tr>'+
                        '<td data-title="إسم الوثيقة"><a href="<?= Yii::$app->getUrlManager()->getBaseUrl()."/site/document/" ?>'+item.documentId+'">'+ item.title +'</a></td>'+
                        '<td data-title="رقم الوثيقة">'+item.number+'</td>'+
                        '<td data-title="سنة الإصدار" class="numeric">'+item.year+'</td>'+
                        '<td data-title="تحميل" class="numeric"><a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/img/download.png"></a></td>'+
                        '</tr>';
                    });
                    $(".resultdoc").append(table);
                }
            });


            });


        $(".secondary").change(function(){
            var documentTypeId = $("#hidden").val();
            $(".resultdoc").html('');

            var table = "";
            var topicId = $(this).val();
            //ar result = '<option value="">اختر تصنيف فرعي</option>';
            $.ajax({
                type : "POST",
                url : '<?= Yii::$app->getUrlManager()->getBaseUrl()."/site/secondarydocument" ?>',
                data : 'topicId=' + topicId + '&documentTypeId='+documentTypeId,
                cache: false,
                dataType:'JSON',
                success : function(response) {
                   // $(".resultdoc").html('');
                    //var teaser = $(".resultdoc").clone();
                    //teaser.find(".secondtr").remove();
                    //$(".secondary").html('');
                    $.each(response, function (i, item) {
                        table += '<tr class="secondtr">'+
                            '<td data-title="إسم الوثيقة"><a href="<?= Yii::$app->getUrlManager()->getBaseUrl()."/site/document/" ?>'+item.documentId+'">'+ item.title +'</a></td>'+
                            '<td data-title="رقم الوثيقة">'+item.number+'</td>'+
                            '<td data-title="سنة الإصدار" class="numeric">'+item.year+'</td>'+
                            '<td data-title="تحميل" class="numeric"><a href="#"><img src="<?= Yii::$app->request->baseUrl ?>/img/download.png"></a></td>'+
                            '</tr>';
                    });
                    $(".resultdoc").append(table);
                }
            });
        });
    });
</script>
