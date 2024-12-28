<?php

declare(strict_types=1);

namespace common\components\rpc;

use common\components\rpc\exception\RpcResponseException;
use common\components\rpc\exception\RpcUnexpectedValueException;

/**
 * RPC客户端
 *
 * 使用示例:
 * ```php
 * $client = stream_socket_client('tcp://127.0.0.1:8888', $errorCode, $errorMessage);
 * if (false === $client) {
 *     throw new \Exception('rpc failed to connect: '.$errorMessage);
 * }
 * $request = [
 *     'class'   => 'User',
 *     'method'  => 'get',
 *     'args'    => [
 *         [
 *             'uid' => 100,
 *             'username' => 'rpc_test',
 *         ]
 *     ]
 * ];
 * // 发送数据，注意5678端口是Text协议的端口，Text协议需要在数据末尾加上换行符
 * fwrite($client, json_encode($request)."\n");
 * // 读取推送结果
 * $result = fgets($client, 10240000);
 * // 解析JSON字符串
 * $result = json_decode($result, true);
 * var_export($result);
 * ```
 */
class Client
{
    /**
     * @var string
     */
    private $address;

    /**
     * Client constructor.
     */
    public function __construct(string $address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function request(array $param)
    {
        try {
            $resource = stream_socket_client($this->address, $errno, $errorMessage);
            if (false === $resource) {
                throw new RpcUnexpectedValueException('rpc failed to connect: ' . $errorMessage);
            }

            // 如果param数组里面存在timeout参数，就设置超时时间
            $timeout = $param['timeout'] ?? 0;
            if ($timeout > 0) {
                stream_set_timeout($resource, $timeout);
            }

            fwrite($resource, json_encode($param) . "\n");
            $result = fgets($resource, 10240000);

            // 检查是否超时,并报超时异常
            $meta = stream_get_meta_data($resource);
            if ($meta['timed_out']) {
                throw new RpcResponseException(RpcError::make(408, 'rpc request timeout'));
            }

            fclose($resource);
            return json_decode($result, true);
        } catch (\Throwable $throwable) {
            throw new RpcUnexpectedValueException('rpc request failed: ' . $throwable->getMessage());
        }
    }
}
