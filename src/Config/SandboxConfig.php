<?php
declare(strict_types=1);

namespace Zen\Config;

class SandboxConfig extends AbstractConfig
{
    private const string API_SANDBOX_URL="https://api.zen-test.com/";

    /**
     * @return void
     */
    public function setApiUrl(): void
    {
       $this->apiUrl = self::API_SANDBOX_URL;
    }
}
