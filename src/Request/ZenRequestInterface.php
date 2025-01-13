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

    public function getPath(): string;

    public function getType(): string;

    public function getHeaders(): array;

    public function getBody(): ?string;
}
