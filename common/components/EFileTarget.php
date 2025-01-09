<?php

namespace common\components;

use Yii;
use yii\log\FileTarget;

class EFileTarget extends FileTarget
{
    public function export()
    {
        if (Yii::$app->has('request') && ($requestId = Yii::$app->request->get('requestId'))) {
            foreach ($this->messages as $i => $message) {
                $this->messages[$i][] = ['requestId' => $requestId];
            }
        }

        parent::export();
    }
}
