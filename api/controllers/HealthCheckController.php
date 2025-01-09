<?php

namespace api\controllers;

use yii\web\Controller;
use yii\web\Response;
use Yii;

class HealthCheckController extends Controller
{
    /**
     * Health check action to check if the API service and its dependencies are running properly.
     * @return Response
     */
    public function actionIndex()
    {
        // Set the response format to JSON
        Yii::$app->response->format = Response::FORMAT_JSON;

        $status = 'ok';
        $message = 'API service is running properly.';
        $issues = [];

        // Check database connection
        try {
            Yii::$app->db->open();
            Yii::$app->db->close();
        } catch (\Exception $e) {
            $status = 'error';
            $issues[] = 'Database connection failed: ' . $e->getMessage();
        }

        // Check Redis connection
        try {
            Yii::$app->redis->executeCommand('PING');
        } catch (\Exception $e) {
            $status = 'error';
            $issues[] = 'Redis connection failed: ' . $e->getMessage();
        }

        // Prepare the response
        $response = [
            'status' => $status,
            'message' => $message,
        ];

        if (!empty($issues)) {
            $response['issues'] = $issues;
        }

        return $response;
    }
}
