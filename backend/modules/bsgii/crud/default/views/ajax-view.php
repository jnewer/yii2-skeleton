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
use yii\helpers\Url;
use yii\widgets\DetailView;
use <?php echo $generator->modelClass ?>;

/** @var yii\web\View $this */
/** @var <?= ltrim($generator->modelClass, '\\') ?>  $model */

?>

<div class="box">
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <?= "<?= " ?>DetailView::widget([
        'model' => $model,
        'template' => '<tr><th width="20%">{label}</th><td>{value}</td></tr>',
        'attributes' => [
<?php
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        echo "            '" . $name . "',\n";
    }
} else {
    foreach ($generator->getTableSchema()->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (strpos($column->name, 'image')!==false||strpos($column->name, 'photo')!==false||strpos($column->name, 'picture')!==false) {
            echo "            ['attribute'=>'" . $column->name."', 'format'=>'raw', 'value'=>Yii::\$app->formatter->asImage(\$model->" . $column->name.", ['height'=>200])],\n";
        } else {
            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }
    }
}
?>
        ],
    ]) ?>

    </div>
    <!-- /.box-body -->
</div>
