<?php

namespace common\components;

class Signature
{
    /**
     * 生成签名
     *
     * @param array $data
     * @param string $key
     * @return string
     */
    public static function sign(array $data, string $key): string
    {
        if (empty($data['signature'])) {
            throw new \InvalidArgumentException('Signature is missing');
        }
        if (empty($data['timestamp'])) {
            throw new \InvalidArgumentException('Timestamp is missing');
        }

        if (empty($data['nonce'])) {
            throw new \InvalidArgumentException('Nonce is missing');
        }

        if ($data['timestamp'] <time() - 300) {
            throw new \InvalidArgumentException('Timestamp is expired');
        }

        if (isset($data['signature'])) {
            unset($data['signature']);
        }

        ksort($data);
        $signStr = http_build_query($data) . '&key=' . $key;

        return hash('sha256', $signStr);
    }

    /**
     * 验证签名
     *
     * @param array $data
     * @param string $signature
     * @param string $key
     * @return bool
     */
    public static function verify(array $data, string $signature, string $key): bool
    {
        return $signature === self::sign($data, $key);
    }
}
