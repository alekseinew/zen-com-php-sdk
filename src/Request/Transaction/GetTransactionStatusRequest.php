<?php

declare(strict_types=1);

namespace Zen\Request\Transaction;

use Zen\Request\AbstractZenRequest;

class GetTransactionStatusRequest extends AbstractZenRequest
{
    public const string PATH = 'v1/transactions/%s';

    public const string TYPE = self::GET;

    public function __construct(string $requestId, private string $transactionId)
    {
        parent::__construct($requestId);
    }

    public function getPath(): string
    {
        return sprintf(static::PATH, $this->transactionId);
    }
}
