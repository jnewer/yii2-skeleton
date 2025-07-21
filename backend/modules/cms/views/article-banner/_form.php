<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;


/** @var yii\web\View $this */
/** @var api\modules\cms\models\ArticleBanner $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="box-body">
    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal', 'enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-sm-10\">{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'col-sm-2 control-label'],
        ],
    ]); ?>
    <!-- <?= $form->field($model, 'banner_type')->textInput() ?> -->
    <?= $form->field($model, 'image')->widget(backend\widgets\FileInput::class)->hint('支持JPG、JPEG、PNG格式，不要超过500KB为宜'); ?>
    <?= $form->field($model, 'is_href')->radiolist(['1' => '是', '0' => '否'], ['itemOptions' => ['class' => 'minimal'],  'item' => function ($index, $label, $name, $checked, $value) {
        return '<label class="radio-inline">' .
            Html::radio($name, $checked, ['value' => $value]) . $label .
            '</label>';
    }]) ?>
    <?= $form->field($model, 'url')->textInput() ?>
    <?= $form->field($model, 'title')->textInput() ?>
    <?= $form->field($model, 'sort')->textInput(['type' => 'number', 'min' => 0, 'max' => 1000]) ?>
    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>
    <div class="box-footer">
        <a data-dismiss="modal" href="javascript:history.back();" class="btn btn-default">取消</a>
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>