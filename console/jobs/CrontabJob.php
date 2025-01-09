<?php

namespace console\jobs;

use Yii;

/**
 * Class CrontabJob.
 */
class CrontabJob extends \yii\base\BaseObject implements \yii\queue\RetryableJobInterface
{
    public $command;

    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
        $cronJobs = get_console_config('cronJobs', []);

        if (!in_array($this->command, array_keys($cronJobs))) {
            return false;
        }

        $command = sprintf('php %s %s', Yii::getAlias('@console/../'), $this->command);
        exec($command, $output, $return_var);
    }

    /**
     * @inheritdoc
     */
    public function getTtr()
    {
        return 3600;
    }

    /**
     * @inheritdoc
     */
    public function canRetry($attempt, $error)
    {
        return false;
    }
}
