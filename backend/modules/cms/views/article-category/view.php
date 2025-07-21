<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\enums\Status;
use yii\widgets\DetailView;
use api\modules\cms\models\ArticleCategory;

/** @var yii\web\View $this */
/** @var api\modules\cms\models\ArticleCategory  $model */

$this->title = ArticleCategory::$modelName.'详情 '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'id', 'url' => ['index']];
$this->params['breadcrumbs'][] = ArticleCategory::$modelName.'详情';
?>

<div class="box">
    <div class="box-header">
        <div class="btn-group">
            <?=  Html::a('<i class="fa fa-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <!-- /.btn-group -->
        </div>
        <?=  Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要删除该项目吗？',
                'method' => 'post',
            ],
        ]) ?>
        <div class="pull-right">
            <?=  Html::a('<i class="fa fa-reply"></i>', ['index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <?= DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="20%">{label}</th><td>{value}</td></tr>',
        'attributes' => [
            'id',
            'parent.category_name',
            'category_name',
            'describe',
            ['attribute'=>'image', 'format'=>'raw', 'value'=>Yii::$app->formatter->asImage($model->image, ['height'=>200])],
            'sort',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::tag('span', Status::from($model->status)->label(), [
                        'class' => 'label ' . Status::from($model->status)->labelClass(),
                    ]);
                },
            ],
            'creator.username',
            'updater.username',
            'created_at',
            'updated_at',
            // 'deleted_at',
        ],
    ]) ?>

    </div>
    <!-- /.box-body -->
</div>
