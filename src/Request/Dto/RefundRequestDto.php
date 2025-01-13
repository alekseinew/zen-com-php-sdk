<?php
declare(strict_types=1);

namespace Zen\Request\Dto;

use Zen\Util\ToArrayTrait;

/**
 * DTO class that contains transaction-refund data.
 */
class RefundRequestDto
{
    use ToArrayTrait;

    /**
     * Amount of the transaction.
     * Format: String matching pattern ^(?=.*[0-9])\d{1,16}(?:\.\d{1,12})?$.
     * Example: 123.04
     */
    private string $amount;

    /**
     * Transaction ID generated during the create transaction process.
     * Format: UUID.
     */
    private string $transactionId;

    /**
     * Currency code in ISO 4217 alphabetic format.
     * Length: 3 characters.
     * Example: PLN
     * Format: Matches pattern ^[A-Z]+$.
     */
    private string $currency;

    /**
     * ID of the transaction provided by the merchant.
     * Length: Between 1 and 128 characters.
     * Example: 23beb187-f8a3-44b8-9ef8-b31180358dd3
     * Format: Matches pattern ^[a-zA-Z0-9?&:\-\/=.,#|+_$\[\]€ ]+$.
     */
    private string $merchantTransactionId;

    /**
     * Optional comment about the transaction.
     * Maximum length: 512 characters.
     */
    private ?string $comment = null;

    /**
     * Origin ID of the transaction provided by the merchant.
     * Length: Between 1 and 128 characters.
     * Example: 23beb187-f8a3-44b8-9ef8-b31180358dd3
     */
    private ?string $originMerchantTransactionId = null;

    /**
     * Optional source information for the transaction.
     */
    private ?SourceRequestDto $source = null;

    /**
     * @param string $transactionId Transaction ID generated during the create transaction process.
     * @param string $merchantTransactionId ID of the transaction provided by the merchant.
     * @param string $amount Amount of the transaction.
     * @param string $currency Currency code in ISO 4217 alphabetic format.
     */
    public function __construct(
        string $transactionId,
        string $merchantTransactionId,
        string $amount,
        string $currency
    ) {
        $this->amount = $amount;
        $this->transactionId = $transactionId;
        $this->currency = $currency;
        $this->merchantTransactionId = $merchantTransactionId;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
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
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
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
    public function getMerchantTransactionId(): string
    {
        return $this->merchantTransactionId;
    }

    /**
     * @return string|null
     */
    public function getOriginMerchantTransactionId(): ?string
    {
        return $this->originMerchantTransactionId;
    }

    /**
     * @param string|null $originMerchantTransactionId
     *                                                
     * @return self                                                
     */
    public function setOriginMerchantTransactionId(?string $originMerchantTransactionId): self
    {
        $this->originMerchantTransactionId = $originMerchantTransactionId;
        
        return $this;
    }

    /**
     * @return SourceRequestDto|null
     */
    public function getSource(): ?SourceRequestDto
    {
        return $this->source;
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
}
