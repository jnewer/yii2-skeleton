<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ArrayDataProvider $dataProvider */

$this->title = '定时任务管理';
$this->params['breadcrumbs'][] = $this->title;

$dataProvider->pagination->pageSize = Yii::$app->config->get('backend_pagesize', 20);
?>


<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'layout' => "<div class=\"box-body table-responsive\">{items}</div>\n<div class=\"box-footer clearfix\"><div class=\"row\"><div class=\"col-xs-12 col-sm-7\">{pager}</div><div class=\"col-xs-12 col-sm-5 text-right\">{summary}</div></div></div>",
                'tableOptions' => ['class' => 'table table-bordered table-hover'],
                'summary' => '第{page}页，共{pageCount}页，当前第{begin}-{end}项，共{totalCount}项',
                'filterModel' => null,
                'pager' => [
                    'class' => 'backend\widgets\LinkPager',
                    'options' => [
                        'class' => 'pagination pagination-sm no-margin',
                    ],
                ],
                'columns' => [
                    'command:text:命令',
                    'cron:text:cron表达式',
                    'desc:text:描述',
                    'frequency:text:频率',
                    [
                        'label' => '状态',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::tag('span', $model['enabled'] ? '启用' : '禁用', [
                                'class' => 'label ' . ($model['enabled'] ? 'label-success' : 'label-danger'),
                            ]);
                        },
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => '操作',
                        'headerOptions' => ['style' => 'width:150px'],
                        'buttonOptions' => ['class' => 'btn btn-default btn-sm'],
                        'template' => '{run}',
                        'buttons' => [
                            'run' => function ($url, $model, $key) {
                                return Html::a('执行一次', ['run', 'command' => $model['command']], [
                                    'class' => 'btn btn-sm btn-primary',
                                    'data-method' => 'post',
                                    'data-confirm' => '您确定要执行该定时任务吗？',
                                ]);
                            },
                        ]
                    ],
                ],
            ]); ?>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
