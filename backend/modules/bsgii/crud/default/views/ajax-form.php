<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/** @var yii\web\View $this */
/** @var backend\modules\bsgii\crud\Generator $generator  */

/** @var \yii\db\ActiveRecord $model  */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

$attributes= $generator->getColumnNames();
echo "<?php\n";
?>

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

<?php foreach ($generator->foreignKeyClassNames as $foreignKeyClassName) : ?>
use <?=$foreignKeyClassName?>;
<?php endforeach;?>

/** @var yii\web\View $this */
/** @var <?= ltrim($generator->modelClass, '\\') ?> $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="box-body">
    <?= "<?php " ?> $form = ActiveForm::begin([
        'options'=>['class'=>'form-horizontal', 'enctype'=>'multipart/form-data'],
        'fieldConfig'=>[
            'template'=>"{label}\n<div class=\"col-sm-10\">{input}\n{hint}\n{error}</div>",
            'labelOptions'=>['class'=>'col-sm-2 control-label'],
        ],
    ]); ?>
<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, ['created_at', 'updated_at'])) {
        continue;
    }
    if (in_array($attribute, $safeAttributes)) {
        echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n";
    }
} ?>
    <?= "<?php " ?> ActiveForm::end(); ?>
</div>
