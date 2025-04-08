<?php

namespace api\controllers;

use yii\web\Controller;
use yii\web\Response;
use Yii;

class HealthCheckController extends Controller
{
    /**
     * @return Response
     */
    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $issues = [];

        try {
            Yii::$app->db->open();
            Yii::$app->db->close();
        } catch (\Exception $e) {
            $issues[] = 'Database connection failed: ' . $e->getMessage();
        }

        try {
            Yii::$app->redis->ping();
        } catch (\Exception $e) {
            $issues[] = 'Redis connection failed: ' . $e->getMessage();
        }

        $isOk = empty($issues);
        $response = [
            'status' => $isOk ? 'ok' : 'error',
            'message' => $isOk ? 'API service is running properly.' : 'There are issues with the API service.',
        ];

        if (!$isOk) {
            $response['issues'] = $issues;
        }

        return $response;
    }
}
