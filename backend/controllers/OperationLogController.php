<?php

namespace backend\controllers;

use backend\models\OperationLog;
use backend\components\Controller;

/**
 * OperationLogController implements the CRUD actions for OperationLog model.
 *
 * @desc 操作日志管理
 */
class OperationLogController extends Controller
{
    protected $modelClass = OperationLog::class;

    public static $parentActions = ['index'];

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
}
