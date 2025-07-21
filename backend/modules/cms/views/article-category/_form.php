<?php

use api\modules\cms\models\ArticleCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


/** @var yii\web\View $this */
/** @var api\modules\cms\models\ArticleCategory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="box-body">
    <?php  $form = ActiveForm::begin([
        'options'=>['class'=>'form-horizontal', 'enctype'=>'multipart/form-data'],
        'fieldConfig'=>[
            'template'=>"{label}\n<div class=\"col-sm-10\">{input}\n{hint}\n{error}</div>",
            'labelOptions'=>['class'=>'col-sm-2 control-label'],
        ],
    ]); ?>
    <?= $form->field($model, 'parent_id')->dropdownList(ArticleCategory::instance()->getListData('id','category_name'), ['prompt' => '', 'data-placeholder' => '请选择父级标题', 'class' => 'form-control select2', 'style' => 'width:100%'])->label('父级标题') ?>
    <?= $form->field($model, 'category_name')->textInput() ?>
    <?= $form->field($model, 'describe')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'image')->widget(backend\widgets\FileInput::class)->hint('支持JPG、JPEG、PNG格式，不要超过500KB为宜'); ?>
    <?= $form->field($model, 'sort')->textInput(['type' => 'number', 'min' => 0, 'max' => 1000]) ?>
    <div class="box-footer">
        <a data-dismiss="modal" href="javascript:history.back();" class="btn btn-default">取消</a>
        <?=  Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
    </div>
    <?php  ActiveForm::end(); ?>
</div>
