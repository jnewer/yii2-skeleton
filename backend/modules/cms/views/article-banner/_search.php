<?php

use api\modules\cms\models\ArticleBanner;
use common\enums\Status;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var api\modules\cms\models\search\ArticleBannerSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-banner-search">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => [''],
        'options' => ['class' => 'form-inline', 'role' => 'form'],
        'fieldConfig' => [
            'template' => "{label}\n{input}\n",
            'labelOptions' => ['class' => 'sr-only'],
        ],
    ]); ?>
    <?= $form->field($model, 'id', ['labelOptions' => ['class' => 'sr-only'], 'inputOptions' => ['class' => 'form-control', 'placeholder' => '编号']]) ?>
    <?= $form->field($model, 'title', ['labelOptions' => ['class' => 'sr-only'], 'inputOptions' => ['class' => 'form-control', 'placeholder' => '标题']]) ?>
    <?= $form->field($model, 'banner_type')->dropdownList(ArticleBanner::$bannerTypeOptions, ['prompt' => '', 'data-placeholder' => '类型', 'class' => 'form-control select2', 'style' => 'width:120px']) ?>
    <?= $form->field($model, 'is_href')->dropdownList(['1' => '是', '0' => '否'], ['prompt' => '', 'data-placeholder' => '是否链接', 'class' => 'form-control select2', 'style' => 'width:120px']) ?>
    <?= $form->field($model, 'status')->dropdownList(Status::options(), ['prompt' => '', 'data-placeholder' => '状态', 'class' => 'form-control select2', 'style' => 'width:120px']) ?>
    <?php // echo $form->field($model, 'sort', ['labelOptions'=>['class'=>'sr-only'], 'inputOptions'=>['class'=>'form-control', 'placeholder'=>'排序']])
    ?>
    <?php // echo $form->field($model, 'created_by', ['labelOptions'=>['class'=>'sr-only'], 'inputOptions'=>['class'=>'form-control', 'placeholder'=>'创建者']])
    ?>
    <?php // echo $form->field($model, 'updated_by', ['labelOptions'=>['class'=>'sr-only'], 'inputOptions'=>['class'=>'form-control', 'placeholder'=>'更新者']])
    ?>
    <?php // echo $form->field($model, 'created_at', ['labelOptions'=>['class'=>'sr-only'], 'inputOptions'=>['class'=>'form-control', 'placeholder'=>'创建时间']])
    ?>
    <?php // echo $form->field($model, 'updated_at', ['labelOptions'=>['class'=>'sr-only'], 'inputOptions'=>['class'=>'form-control', 'placeholder'=>'修改时间']])
    ?>
    <?php // echo $form->field($model, 'deleted_at', ['labelOptions'=>['class'=>'sr-only'], 'inputOptions'=>['class'=>'form-control', 'placeholder'=>'删除时间']])
    ?>
    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>