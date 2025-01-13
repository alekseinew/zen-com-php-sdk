<?php
declare(strict_types=1);

namespace Zen\Response;

class ZenResponse
{
    public function __construct(
        public string $body,
        public int    $code,
    ) {}
}
