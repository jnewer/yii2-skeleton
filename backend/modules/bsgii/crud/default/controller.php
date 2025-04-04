<?php
/**
 * This is the template for generating a CRUD controller class file.
 */

use yii\db\ActiveRecordInterface;
use yii\helpers\StringHelper;

/** @var yii\web\View $this */
/** @var backend\modules\bsgii\crud\Generator $generator */

$controllerClass = StringHelper::basename($generator->controllerClass);
$modelClass = StringHelper::basename($generator->modelClass);
$searchModelClass = StringHelper::basename($generator->searchModelClass);
if ($modelClass === $searchModelClass) {
    $searchModelAlias = $searchModelClass . 'Search';
}

/** @var ActiveRecordInterface $class  */
$class = $generator->modelClass;
$pks = $class::primaryKey();
$urlParams = $generator->generateUrlParams();
$actionParams = $generator->generateActionParams();
$actionParamComments = $generator->generateActionParamComments();
$modelName = $class::$modelName;

echo "<?php\n";
?>

namespace <?= StringHelper::dirname(ltrim($generator->controllerClass, '\\')) ?>;

use Yii;
use <?= ltrim($generator->modelClass, '\\') ?>;
<?php if (!empty($generator->searchModelClass)) : ?>
use <?= ltrim($generator->searchModelClass, '\\') . (isset($searchModelAlias) ? " as $searchModelAlias" : "") ?>;
<?php else : ?>
use yii\data\ActiveDataProvider;
<?php endif; ?>
use <?php echo $generator->baseControllerClass ?>;
use yii\web\NotFoundHttpException;

/**
 * <?= $controllerClass ?> implements the CRUD actions for <?= $modelClass ?> model.
 * @desc <?= $modelName ?>管理
 */
class <?= $controllerClass ?> extends <?= StringHelper::basename($generator->baseControllerClass) . "\n" ?>
{
    protected $modelClass = <?= $modelClass . '::class' ?>;

    <?php if ($generator->viewMode === 'modal') : ?>
    /**
     * Displays a single User model.
     *
     * @desc 查看
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('ajax-view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @desc 新增
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new $this->modelClass();
        /** @var \common\components\ActiveRecord $model */
        $model->loadDefaultValues();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            // 取消注释来上传文件/图片
            // $model->uploadImages(['image']);

            if (!$model->hasErrors() && $model->save()) {
                return $this->returnJson(true, '创建成功！');
            }
        }

        return $this->renderAjax('ajax-form', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @desc 更新
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            // 取消注释来上传文件/图片
            // $model->uploadImages(['image']);

            if (!$model->hasErrors() && $model->save()) {
                return $this->returnJson(true, '更新成功！');
            }
        }

        return $this->renderAjax('ajax-form', [
            'model' => $model,
        ]);
    }

    <?php endif; ?>
}
