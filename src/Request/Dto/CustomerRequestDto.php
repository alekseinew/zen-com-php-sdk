<?php

declare(strict_types=1);

namespace Zen\Request\Dto;

use Zen\Util\ToArrayTrait;

class CustomerRequestDto
{
    use ToArrayTrait;

    /**
     * Customer's email.
     * Must be <= 256 characters.
     * Must be a valid email format.
     */
    private string $email;

    /**
     * IP address of the customer.
     * Must be a valid IPv4 or IPv6 address.
     * Must be <= 15 characters.
     */
    private string $ip;

    /**
     * Customer's ID as provided by the merchant.
     * Must be <= 64 characters.
     * Match pattern: ^[a-zA-Z0-9_-]+$
     */
    private ?string $id = null;

    /**
     * Customer's firstname.
     * Must be <= 128 characters.
     */
    private ?string $firstName = null;

    /**
     * Customer's lastname.
     * Must be <= 128 characters.
     */
    private ?string $lastName = null;

    /**
     * Customer's phone number.
     * Must be <= 64 characters.
     */
    private ?string $phone = null;

    /**
     * Some information about customer.
     * Must be <= 128 characters.
     */
    private ?string $information = null;

    public function __construct(string $email, string $ip)
    {
        $this->email = $email;
        $this->ip = $ip;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function setInformation(?string $information): self
    {
        $this->information = $information;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getInformation(): ?string
    {
        return $this->information;
    }

    public function getIp(): string
    {
        return $this->ip;
    }
}
