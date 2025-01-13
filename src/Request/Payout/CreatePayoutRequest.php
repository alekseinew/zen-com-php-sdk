<?php

declare(strict_types=1);

namespace Zen\Request\Payout;

use Zen\Request\AbstractZenRequest;
use Zen\Request\Dto\CreatePayoutRequestDto;

class CreatePayoutRequest extends AbstractZenRequest
{
    public const string PATH = 'v1/payouts/';

    public const string TYPE = self::POST;

    private array $data = [];

    public function __construct(string $requestId, CreatePayoutRequestDto $dto)
    {
        parent::__construct($requestId);

        $this->data = $dto->toArray();
    }

    public function getBody(): string
    {
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }
}
