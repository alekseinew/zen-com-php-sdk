<?php
declare(strict_types=1);

namespace Zen\Request\Dto;

use Zen\Util\ToArrayTrait;

/**
 * DTO class that holds all create-transaction data.
 */
class CreateTransactionRequestDto
{
    use ToArrayTrait;

    /**
     * Id of the transaction provided by merchant.
     * Must be between 1 and 128 characters.
     * Match pattern: ^[a-zA-Z0-9?&:\-\/=.,#|+_$\[\]€ ]+$
     * 
     * @var string
     */
    private string $merchantTransactionId;

    /**
     * Id of the payment channel for selected payment method.
     * Match pattern: ^([a-z](-?[a-z0-9])*|[A-Z](_?[A-Z0-9])*)$
     * 
     * @var string
     */
    private string $paymentChannel;

    /**
     * Amount of the transaction.
     * Match pattern: ^(?=.*[0-9])\d{1,16}(?:\.\d{1,12})?$
     * 
     * @var string
     */
    private string $amount;

    /**
     * Currency code in ISO 4217 alphabetic code.
     * Must be exactly 3 characters.
     * Example: PLN
     * 
     * @var string
     */
    private string $currency;

    /**
     * Customer details.
     *
     * @var CustomerRequestDto
     */
    private CustomerRequestDto $customer;

    /**
     * Origin Id of the transaction provided by merchant.
     * Optional. Must be between 1 and 128 characters.
     *
     * @var string|null
     */
    private ?string $originMerchantTransactionId = null;

    /**
     * URL address used by ZEN to send IPN to.
     * Optional. Must be <= 1024 characters.
     *
     * @var string|null
     */
    private ?string $customIpnUrl = null;

    /**
     * Optional comment, must be <= 512 characters.
     *
     * @var string|null
     */
    private ?string $comment = null;

    /**
     * Optional authorization details.
     *
     * @var AuthorizationRequestDto|null
     */
    private ?AuthorizationRequestDto $authorization = null;

    /**
     * Optional source details.
     *
     * @var SourceRequestDto|null
     */
    private ?SourceRequestDto $source = null;

    /**
     * @param string             $merchantTransactionId
     * @param string             $paymentChannel
     * @param string             $amount
     * @param string             $currency
     * @param CustomerRequestDto $customer
     */
    public function __construct(
        string $merchantTransactionId,
        string $paymentChannel,
        string $amount,
        string $currency,
        CustomerRequestDto $customer
    ) {
        $this->merchantTransactionId = $merchantTransactionId;
        $this->paymentChannel = $paymentChannel;
        $this->amount = $amount;
        $this->currency = $currency;
        $this->customer = $customer;
    }

    /**
     * @param string|null $originMerchantTransactionId
     *
     * @return CreateTransactionRequestDto
     */
    public function setOriginMerchantTransactionId(?string $originMerchantTransactionId): self
    {
        $this->originMerchantTransactionId = $originMerchantTransactionId;

        return $this;
    }

    /**
     * @param string|null $customIpnUrl
     *
     * @return self
     */
    public function setCustomIpnUrl(?string $customIpnUrl): self
    {
        $this->customIpnUrl = $customIpnUrl;

        return $this;
    }

    /**
     * @param string|null $comment
     *
     * @return self
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @param AuthorizationRequestDto|null $authorization
     *
     * @return self
     */
    public function setAuthorization(?AuthorizationRequestDto $authorization): self
    {
        $this->authorization = $authorization;

        return $this;
    }

    /**
     * @param SourceRequestDto|null $source
     *
     * @return self
     */
    public function setSource(?SourceRequestDto $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getMerchantTransactionId(): string
    {
        return $this->merchantTransactionId;
    }

    /**
     * @return string
     */
    public function getPaymentChannel(): string
    {
        return $this->paymentChannel;
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
     * @return ?string
     */
    public function getOriginMerchantTransactionId(): ?string
    {
        return $this->originMerchantTransactionId;
    }

    /**
     * @return ?string
     */
    public function getCustomIpnUrl(): ?string
    {
        return $this->customIpnUrl;
    }

    /**
     * @return ?string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @return ?AuthorizationRequestDto
     */
    public function getAuthorization(): ?AuthorizationRequestDto
    {
        return $this->authorization;
    }

    /**
     * @return ?SourceRequestDto
     */
    public function getSource(): ?SourceRequestDto
    {
        return $this->source;
    }
}
