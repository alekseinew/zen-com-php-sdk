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
     *
     * @var string
     */
    private string $amount;

    /**
     * Currency code (ISO 4217, exactly 3 characters).
     * Matches pattern: ^[A-Z]{3}$
     * 
     * @var string
     */
    private string $currency;

    /**
     * Session ID related to the transaction.
     * This is an optional field.
     * 
     * @var string|null
     */
    private ?string $sessionId;

    /**
     * @param string $amount
     * @param string $currency
     */
    public function __construct(string $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @param string $sessionId
     *
     * @return self
     */
    public function setSessionId(string $sessionId): self
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->sessionId;
    }
}
