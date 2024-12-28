<?php

namespace common\components;

use GuzzleHttp\Client;
use Yii;

class DingTalk
{
    private static $webhookUrl = 'https://oapi.dingtalk.com/robot/send';

    /**
     * 发送消息
     * @param string $channel
     * @param array $args
     * @return bool|string
     */
    public static function send(string $channel, array $args)
    {
        $config = Yii::$app->params['dingTalk'] ?? [];
        if (empty($config['enable'])) {
            return false;
        }

        if (empty($config[$channel]) || !is_array($config[$channel])) {
            return false;
        }

        $channelConfig = $config[$channel];
        if (empty($channelConfig['accessToken'])) {
            return false;
        }

        try {
            $client = new Client();
            $promise = $client->postAsync(self::$webhookUrl . '?access_token=' . $channelConfig['accessToken'], [
                'json' => [
                    'msgtype' => 'text',
                    'text' => [
                        'title' => $args['title'] ?? ($channelConfig['defaultTitle'] ?? '异常通知'),
                        'content' => $args['content'],
                    ],
                ],
            ]);

            // 设置完成回调函数
            $promise->then(
                function ($response) {
                },
                function ($exception) {
                }
            );
        } catch (\Exception $e) {
        }
    }
}
