<?php

namespace backend\controllers;

use Yii;
use yii\web\Response;
use console\jobs\CrontabJob;
use yii\console\Application;
use yii\data\ArrayDataProvider;
use backend\components\Controller;

/**
 *  @desc 定时任务管理
 */
class CrontabController extends Controller
{
    /**
     * Lists all models.
     *
     * @desc 列表
     * @return mixed
     */
    public function actionIndex()
    {
        $cronJobs = get_console_config('cronJobs', []);
        $cronTabs = [];
        foreach ($cronJobs as $command => $cronJob) {
            $cronTabs[] = [
                'command' => $command,
                'cron' => $cronJob['cron'],
                'desc' => $cronJob['desc'] ?? '',
                'frequency' => $cronJob['frequency'] ?? '',
                'enabled' => $cronJob['enabled'] ?? true,
            ];
        }
        $dataProvider = new ArrayDataProvider([
            'allModels' => $cronTabs,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @desc 执行一次
     * @param string $command
     * @return Response
     */
    public function actionRun($command)
    {
        $cronJobs = get_console_config('cronJobs', []);

        if (!in_array($command, array_keys($cronJobs))) {
            Yii::$app->session->setFlash('error', '定时任务不存在');
            return $this->redirect(['index']);
        }

        Yii::$app->queue->push(new CrontabJob([
            'command' => $command,
        ]));

        Yii::$app->session->setFlash('success', '任务已推入队列，请耐心等待执行');

        return $this->redirect(['index']);
    }
}
