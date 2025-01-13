<?php

declare(strict_types=1);

namespace Zen\Request;

abstract class AbstractZenRequest implements ZenRequestInterface
{
    public const PATH = '/';

    public const TYPE = self::GET;

    private array $headers = [];

    public function __construct(private readonly string $requestId)
    {
        $this->headers = [
            'request-id' => $this->requestId,
        ];
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getPath(): string
    {
        return static::PATH;
    }

    public function getType(): string
    {
        return static::TYPE;
    }

    public function getBody(): ?string
    {
        return null;
    }
}
