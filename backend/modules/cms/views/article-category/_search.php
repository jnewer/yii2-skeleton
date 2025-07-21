<?php

use yii\helpers\Html;
use common\enums\Status;
use yii\widgets\ActiveForm;
use api\modules\cms\models\ArticleCategory;

/** @var yii\web\View $this */
/** @var api\modules\cms\models\search\ArticleCategorySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-category-search">

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
    <?= $form->field($model, 'parent_id')->dropdownList(ArticleCategory::instance()->getListData('id', 'category_name'), ['prompt' => '', 'data-placeholder' => '父级分类', 'class' => 'form-control select2', 'style' => 'width:120px']) ?>

    <?= $form->field($model, 'category_name', ['labelOptions' => ['class' => 'sr-only'], 'inputOptions' => ['class' => 'form-control', 'placeholder' => '分类标题']]) ?>
    <?= $form->field($model, 'status')->dropdownList(Status::options(), ['prompt' => '', 'data-placeholder' => '状态', 'class' => 'form-control select2', 'style' => 'width:120px']) ?>

    <?php // echo $form->field($model, 'created_at', ['labelOptions'=>['class'=>'sr-only'], 'inputOptions'=>['class'=>'form-control', 'placeholder'=>'创建时间']])
    ?>
    <?php // echo $form->field($model, 'updated_at', ['labelOptions'=>['class'=>'sr-only'], 'inputOptions'=>['class'=>'form-control', 'placeholder'=>'修改时间']])
    ?>
    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>