<?php

namespace backend\controllers;

use common\models\Log;
use backend\components\Controller;

/**
 * LogController implements the CRUD actions for Log model.
 *
 * @desc 日志管理
 */
class LogController extends Controller
{
    protected $modelClass = Log::class;

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
