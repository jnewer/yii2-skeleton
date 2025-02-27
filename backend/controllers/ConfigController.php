<?php

namespace backend\controllers;

use backend\models\OperationLog;
use Yii;
use backend\components\Controller;

/**
 * ConfigController implements the CRUD actions for Log model.
 *
 * @desc 配置管理
 */
class ConfigController extends Controller
{
    /**
     * @desc 列表
     *
     * @return void
     */
    public function actionIndex()
    {
        if (Yii::$app->request->isPost) {
            $config = Yii::$app->config->getAll();
            unset($_POST['_csrf-backend']);
            Yii::$app->config->set($_POST);
            Yii::$app->getSession()->setFlash('success', '操作成功！');
            OperationLog::create('配置管理', '修改配置', $config, $_POST);
            return $this->redirect(['index']);
        }

        $config = Yii::$app->config->getAll();

        return $this->render('index', [
            'config' => $config,
        ]);
    }
}
