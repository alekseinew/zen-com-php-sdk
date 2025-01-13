<?php
declare(strict_types=1);

namespace Zen\Request;

/**
 *  Interface RequestInterface
 */
interface ZenRequestInterface
{
    public const string GET = 'GET';
    public const string POST = 'POST';
    public const string PUT = 'PUT';
    public const string DELETE = 'DELETE';
    public const string PATCH = 'PATCH';
    public const string OPTIONS = 'OPTIONS';
    public const string HEAD = 'HEAD';

    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @return string|null
     */
    public function getBody(): ?string;
}
