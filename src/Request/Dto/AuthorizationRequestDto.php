<?php

declare(strict_types=1);

namespace Zen\Request\Dto;

use Zen\Util\ToArrayTrait;

/**
 * Class representing the authorization details of the transaction.
 */
class AuthorizationRequestDto
{
    use ToArrayTrait;

    /**
     *  Amount of the transaction.
     *  Matches pattern: ^(?=.*[0-9])\d{1,16}(?:\.\d{1,12})?$
     */
    private string $amount;

    /**
     * Currency code (ISO 4217, exactly 3 characters).
     * Matches pattern: ^[A-Z]{3}$
     */
    private string $currency;

    /**
     * Session ID related to the transaction.
     * This is an optional field.
     */
    private ?string $sessionId;

    public function __construct(string $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function setSessionId(string $sessionId): self
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }
}
