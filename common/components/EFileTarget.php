<?php

namespace common\components;

use Yii;
use yii\log\FileTarget;

class EFileTarget extends FileTarget
{
    public function getMessagePrefix($message)
    {
        $message = parent::getMessagePrefix($message);
        if (Yii::$app->has('request') && ($requestId = Yii::$app->request->headers->get('X-Request-Id'))) {
            $message .= "[$requestId]";
        }

        return $message;
    }
}
