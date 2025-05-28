<?php

namespace common\components;

use Yii;
use yii\log\FileTarget;

class EFileTarget extends FileTarget
{
    public function getMessagePrefix($message)
    {
        $message = parent::getMessagePrefix($message);

        if (!empty(Yii::$app->params['X-Request-Id'])) {
            $requestId = Yii::$app->params['X-Request-Id'];
            $message .= "[$requestId]";
        }

        return $message;
    }
}
