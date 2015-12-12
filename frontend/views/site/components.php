<?php

/* @var $this yii\web\View */

$this->title = $documentTypeName['Name'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <h4 class="page-title"><i class="fa fa-file-text-o fa-lg"></i>&nbsp;<?php echo $this->title; ?></h4>
    </div>
</div>
<input type="hidden" id="hidden" value="<?php echo $documentTypeName['DocumentTypeId']; ?>">
<!-- row -->
<div class="row">
    <div class="col-md-12">
        <section>
            <p> <i class="fa fa-asterisk"></i>&nbsp;قم بإختيار التصنيف الرئيسي ثم التصنيف الفرعي</p>
            <form class="form-inline clearfix">
                <div class="form-group col-md-6">
                    <select class="btn-group bootstrap-select selectpicker primary" maxlength="1000" required>
                       <option value="">اختر تصنيف رئيسي</option>
                        <?php foreach($topic as $t){ ?>
                        <option value="<?php echo $t['TopicId']; ?>"><?php echo $t['Name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <select class="btn-group bootstrap-select selectpicker secondary"  maxlength="1000" required>
                        <option value="">اختر تصنيف فرعي</option>
                    </select>
                </div>
            </form>
        </section>
        <section class="search-result">
            <div class="row">
                <form class="form-inline">
                    <div class="form-group">
                        <label for="">بحث :</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left">
                        <select class="selectpicker" style="display:none" maxlength="100" required>
                            <option>10</option>
                            <option>8</option>
                            <option>5</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="no-more-tables clearfix">
                    <table class="table-bordered table-striped table-condensed">
                        <thead class="cf">
                        <tr>
                            <th>إسم الوثيقة</th>
                            <th>رقم الوثيقة</th>
                            <th class="numeric">سنة الإصدار</th>
                            <th class="numeric">تحميل</th>
                        </tr>
                        </thead>
                        <tbody class="resultdoc">

                        </tbody>
                    </table>
                </div>
            </div>
            <!--div class="row">
                <p class="pull-right sss">تم العثور علي<span> 5</span> نتائج</p>
                <ul class="pagination pull-left">
                    <li class="disabled"><a href="#">«</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div-->
        </section>
        <!--search-result-->
    </div>
</div>
<!-- row -->
