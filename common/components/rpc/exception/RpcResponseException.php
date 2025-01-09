<?php

declare(strict_types=1);

namespace common\components\rpc\exception;

use common\components\rpc\RpcError;

class RpcResponseException extends \Exception
{
    protected $error;

    public function __construct(RpcError $error)
    {
        parent::__construct($error->getMessage(), $error->getCode());
        $this->error = $error;
    }

    public function getError(): RpcError
    {
        return $this->error;
    }
}
