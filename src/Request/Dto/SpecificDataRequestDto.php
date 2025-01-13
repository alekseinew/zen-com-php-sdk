<?php

declare(strict_types=1);

namespace Zen\Request\Dto;

/**
 * Data Transfer Object representing recipient specific data.
 */
class SpecificDataRequestDto
{
    /**
     * Recipient external identifier.
     * Length: Between 1 and 128 characters.
     * Example: 9dbad520-8162-11ef-8c1e-0800200c9a66
     */
    private string $recipientExternalId;

    /**
     * Type of transaction.
     * Example: onetime
     */
    private string $type;

    /**
     * @param  string  $recipientExternalId  Recipient external identifier.
     * @param  string  $type  Type of transaction.
     */
    public function __construct(string $recipientExternalId, string $type)
    {
        $this->recipientExternalId = $recipientExternalId;
        $this->type = $type;
    }

    public function getRecipientExternalId(): string
    {
        return $this->recipientExternalId;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
