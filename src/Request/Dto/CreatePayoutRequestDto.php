<?php

declare(strict_types=1);

namespace Zen\Request\Dto;

use Zen\Util\ToArrayTrait;

/**
 * DTO class that holds all create-payout data.
 */
class CreatePayoutRequestDto
{
    use ToArrayTrait;

    /**
     * Id of the transaction provided by merchant.
     * Must be between 1 and 128 characters.
     * Match pattern: ^[a-zA-Z0-9?&:\-\/=.,#|+_$\[\]€ ]+$
     */
    private string $merchantTransactionId;

    /**
     * Id of the payment channel for selected payment method.
     * Match pattern: ^([a-z](-?[a-z0-9])*|[A-Z](_?[A-Z0-9])*)$
     */
    private string $paymentChannel;

    /**
     * Amount of the transaction.
     * Match pattern: ^(?=.*[0-9])\d{1,16}(?:\.\d{1,12})?$
     */
    private string $amount;

    /**
     * Currency code in ISO 4217 alphabetic code.
     * Must be exactly 3 characters.
     * Example: PLN
     */
    private string $currency;

    /**
     * Customer details.
     */
    private CustomerRequestDto $customer;

    /**
     * Specific recipient data.
     */
    private SpecificDataRequestDto $paymentSpecificData;

    /**
     * Origin Id of the transaction provided by merchant.
     * Optional. Must be between 1 and 128 characters.
     */
    private ?string $originMerchantTransactionId = null;

    /**
     * URL address used by ZEN to send IPN to.
     * Optional. Must be <= 1024 characters.
     */
    private ?string $customIpnUrl = null;

    /**
     * Optional comment, must be <= 512 characters.
     */
    private ?string $comment = null;

    /**
     * Optional source details.
     */
    private ?SourceRequestDto $source = null;

    public function __construct(
        string $merchantTransactionId,
        string $paymentChannel,
        string $amount,
        string $currency,
        CustomerRequestDto $customer,
        SpecificDataRequestDto $paymentSpecificData
    ) {
        $this->merchantTransactionId = $merchantTransactionId;
        $this->paymentChannel = $paymentChannel;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->customer = $customer;
        $this->paymentSpecificData = $paymentSpecificData;
    }

    public function setOriginMerchantTransactionId(?string $originMerchantTransactionId): self
    {
        $this->originMerchantTransactionId = $originMerchantTransactionId;

        return $this;
    }

    public function setCustomIpnUrl(?string $customIpnUrl): self
    {
        $this->customIpnUrl = $customIpnUrl;

        return $this;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function setSource(?SourceRequestDto $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getMerchantTransactionId(): string
    {
        return $this->merchantTransactionId;
    }

    public function getPaymentChannel(): string
    {
        return $this->paymentChannel;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getOriginMerchantTransactionId(): ?string
    {
        return $this->originMerchantTransactionId;
    }

    public function getCustomIpnUrl(): ?string
    {
        return $this->customIpnUrl;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function getSource(): ?SourceRequestDto
    {
        return $this->source;
    }
}
