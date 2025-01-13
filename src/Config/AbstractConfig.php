<?php

declare(strict_types=1);

namespace Zen\Config;

abstract class AbstractConfig
{
    private string $ipnSecret;

    private string $terminalApiKey;

    private string $apiKey;

    protected string $apiUrl;

    abstract public function setApiUrl(): void;

    public function __construct(string $ipnSecret, string $terminalApiKey, string $apiKey)
    {
        $this->ipnSecret = $ipnSecret;
        $this->terminalApiKey = $terminalApiKey;
        $this->apiKey = $apiKey;
        $this->setApiUrl();
    }

    public function getIpnSecret(): string
    {
        return $this->ipnSecret;
    }

    public function getTerminalApiKey(): string
    {
        return $this->terminalApiKey;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }
}
