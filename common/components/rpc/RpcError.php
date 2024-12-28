<?php

declare(strict_types=1);

namespace common\components\rpc;

class RpcError implements \JsonSerializable
{
    /**
     * @var int
     */
    protected $code = 0;

    /**
     * @var string
     */
    protected $message = '';

    /**
     * @var mixed
     */
    protected $data;

    /**
     * @param int    $code
     * @param string $message
     * @param mixed  $data
     *
     * @return RpcError
     */
    public static function make(int $code, string $message, $data = null): self
    {
        $instance = new static();

        $instance->code    = $code;
        $instance->message = $message;
        $instance->data    = $data;

        return $instance;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'code'    => $this->code,
            'message' => $this->message,
            'data'    => $this->data,
        ];
    }
}
