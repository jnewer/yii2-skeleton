<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var $dataProvider array
 * @var $this         yii\web\View
 * @var $filterModel  dektrium\rbac\models\Search
 */

use yii\helpers\Url;
use yii\grid\GridView;
use backend\widgets\ActionColumn;

$this->title = '权限';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $this->beginContent('@dektrium/rbac/views/layout.php') ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $filterModel,
    'layout'       => "{items}\n{pager}",
    'columns'      => [
        [
            'attribute' => 'name',
            'header'    => '名称',
            'options'   => [
                'style' => 'width: 20%'
            ],
            'format'    => 'raw',
            'value' => function ($model) {
                return (strpos($model['name'], '*') === false ? '&nbsp;|-- ' : '') . $model['name'];
            },
        ],
        [
            'attribute' => 'description',
            'header'    => '描述',
            'options'   => [
                'style' => 'width: 55%'
            ],
            'format'    => 'raw',
            'value' => function ($model) {
                return (strpos($model['name'], '*') === false ? '&nbsp;|-- ' : '') . $model['description'];
            },
        ],
        [
            'attribute' => 'rule_name',
            'header'    => '规则名称',
            'options'   => [
                'style' => 'width: 20%'
            ],
        ],
        [
            'class'      => ActionColumn::class,
            'template'   => '{update} {delete}',
            'urlCreator' => function ($action, $model) {
                return Url::to(['/rbac/permission/' . $action, 'name' => $model['name']]);
            },
            'options'   => [
                'style' => 'width: 5%'
            ],
        ]
    ],
]) ?>

<?php $this->endContent();
