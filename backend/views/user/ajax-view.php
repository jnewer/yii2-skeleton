<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\User $model */

?>

<div class="box">
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'username',
                'nickname',
                'email',
                'roleNames:text:角色',
                [
                    'label' => '状态',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::tag('span', $model->getStatusText(), [
                            'class' => 'label ' . $model->getStatusLabelClass(),
                        ]);
                    }
                ],
                'created_at',
                'updated_at',
            ],
        ]) ?>

    </div>
    <!-- /.box-body -->
</div>
