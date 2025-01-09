<?php

namespace common\traits;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleRetry\GuzzleRetryMiddleware;

trait GuzzleRetry
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param array $config 配置
     * @param array $retryOptions 重试选项
     * @param bool $reuse 单例模式
     * @return Client
     */
    public function getClient(array $config = [], array $retryOptions = [], bool $reuse = true)
    {
        if ($reuse && !empty($this->client)) {
            return $this->client;
        }

        $stack = HandlerStack::create();
        $stack->push(GuzzleRetryMiddleware::factory($retryOptions));

        $client = new Client(array_merge(['handler' => $stack], $config));

        $reuse && $this->client = $client;

        return $client;
    }
}
