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
     *
     * @var string
     */
    private string $email;

    /**
     * IP address of the customer.
     * Must be a valid IPv4 or IPv6 address.
     * Must be <= 15 characters.
     *
     * @var string
     */
    private string $ip;
    
    /**
     * Customer's ID as provided by the merchant.
     * Must be <= 64 characters.
     * Match pattern: ^[a-zA-Z0-9_-]+$
     * 
     * @var string|null
     */
    private ?string $id = null;

    /**
     * Customer's firstname.
     * Must be <= 128 characters.
     * 
     * @var string|null
     */
    private ?string $firstName = null;

    /**
     * Customer's lastname.
     * Must be <= 128 characters.
     * 
     * @var string|null
     */
    private ?string $lastName = null;

    /**
     * Customer's phone number.
     * Must be <= 64 characters.
     *
     * @var string|null
     */
    private ?string $phone = null;

    /**
     * Some information about customer.
     * Must be <= 128 characters.
     *
     * @var string|null
     */
    private ?string $information = null;

    /**
     * @param string $email
     * @param string $ip
     */
    public function __construct(string $email, string $ip)
    {
        $this->email = $email;
        $this->ip = $ip;
    }

    /**
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string|null $firstName
     *
     * @return self
     */
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @param string|null $lastName
     *
     * @return self
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @param string|null $phone
     *
     * @return self
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param string|null $information
     *
     * @return self
     */
    public function setInformation(?string $information): self
    {
        $this->information = $information;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @return string|null
     */
    public function getInformation(): ?string
    {
        return $this->information;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }
}
