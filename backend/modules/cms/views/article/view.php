<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\enums\Status;
use yii\widgets\DetailView;
use api\modules\cms\models\Article;

/** @var yii\web\View $this */
/** @var api\modules\cms\models\Article  $model */

$this->title = Article::$modelName.'详情 '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'id', 'url' => ['index']];
$this->params['breadcrumbs'][] = Article::$modelName.'详情';
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
            'category_id',
            'title',
            'author',
            ['attribute'=>'image', 'format'=>'raw', 'value'=>Yii::$app->formatter->asImage($model->image, ['height'=>200])],
            'describe',
            'content:html',
            'views',
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
            [
                'attribute' => 'is_link',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::tag('span', $model->is_link ? '是' : '否', [
                        'class' => 'label ' . ($model->is_link ? 'label-success' : 'label-danger'),
                    ]);
                }
            ],
            [
                'attribute' => 'is_hot',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::tag('span', $model->is_hot ? '是' : '否', [
                        'class' => 'label ' . ($model->is_hot ? 'label-success' : 'label-danger'),
                    ]);
                }
            ],
            'creator.username',
            'updater.username',
            'created_at',
            'updated_at',
        ],
    ]) ?>

    </div>
    <!-- /.box-body -->
</div>
