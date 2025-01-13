<?php

declare(strict_types=1);

namespace Zen\Request\Transaction;

use Zen\Request\AbstractZenRequest;
use Zen\Request\Dto\CreateTransactionRequestDto;

class CreateTransactionRequest extends AbstractZenRequest
{
    public const string PATH = 'v1/transactions/';

    public const string TYPE = self::POST;

    private array $data = [];

    public function __construct(string $requestId, CreateTransactionRequestDto $dto)
    {
        parent::__construct($requestId);

        $this->data = $dto->toArray();
    }

    public function getBody(): string
    {
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }
}
