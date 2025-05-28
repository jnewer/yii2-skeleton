<?php

namespace common\components\behaviors;

use Yii;
use yii\base\Behavior;
use yii\web\Application;

class RequestIdBehavior extends Behavior
{
    public const HEADER_REQUEST_ID = 'X-Request-Id';

    public function events()
    {
        return [
            Application::EVENT_BEFORE_REQUEST => 'setRequestId',
        ];
    }

    public function setRequestId($event)
    {
        try {
            $headers = Yii::$app->getRequest()->getHeaders();
            if (!$headers->has(self::HEADER_REQUEST_ID)) {
                $requestId = bin2hex(random_bytes(16));
            } else {
                $requestId = $headers->get(self::HEADER_REQUEST_ID);
            }
            Yii::$app->params[self::HEADER_REQUEST_ID] = $requestId;
        } catch (\Throwable $t) {
            Yii::error([
                'message' => "设置请求ID时发生错误",
                self::HEADER_REQUEST_ID => $this->getRequestIdFromParamsOrHeader(),
                'error' => $t->getMessage(),
                'exception' => get_class($t),
                'file' => $t->getFile(),
                'line' => $t->getLine(),
            ], __METHOD__);
        }
    }
}
