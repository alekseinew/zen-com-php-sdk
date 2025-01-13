<?php
declare(strict_types=1);

namespace Zen\Config;

class LiveConfig extends AbstractConfig
{
    private const string API_LIVE_URL="https://api.zen.com/";

    /**
     * @return void
     */
    public function setApiUrl(): void
    {
        $this->apiUrl = self::API_LIVE_URL;
    }
}
