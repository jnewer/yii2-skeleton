<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/** @var yii\web\View $this */
/** @var backend\modules\bsgii\crud\Generator $generator  */

$urlParams = $generator->generateUrlParams();
$model = new $generator->modelClass;
$modelClassName = substr($generator->modelClass, strrpos($generator->modelClass, '\\')+1);

echo "<?php\n";
?>

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var <?= ltrim($generator->modelClass, '\\') ?>  $model */
use <?php echo $generator->modelClass ?>;

$this->title = '修改' .<?= $modelClassName ?>::$modelName. ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '管理'.<?= $modelClassName ?>::$modelName, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', <?= $urlParams ?>]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="box box-info">
    <div class="box-header">
        <?= "<?= " ?> Html::a('<i class="fa fa-trash-o"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '您确定要删除该项目吗？',
                'method' => 'post',
            ],
        ]) ?>
        <!-- /.btn-group -->
        <div class="pull-right">
            <?= "<?= " ?> Html::a('<i class="fa fa-reply"></i>', ['index'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
    <?= "<?= " ?>$this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
