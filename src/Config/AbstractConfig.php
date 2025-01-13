<?php
declare(strict_types=1);

namespace Zen\Config;

abstract class AbstractConfig
{
    private string $ipnSecret;
    private string $terminalApiKey;
    private string $apiKey;
    protected string $apiUrl;

    /**
     * @return void
     */
    abstract public function setApiUrl(): void;

    /**
     * @param string $ipnSecret
     * @param string $terminalApiKey
     * @param string $apiKey
     */
    public function __construct(string $ipnSecret, string $terminalApiKey, string $apiKey)
    {
        $this->ipnSecret = $ipnSecret;
        $this->terminalApiKey = $terminalApiKey;
        $this->apiKey = $apiKey;
        $this->setApiUrl();
    }

    /**
     * @return string
     */
    public function getIpnSecret(): string
    {
        return $this->ipnSecret;
    }

    /**
     * @return string
     */
    public function getTerminalApiKey(): string
    {
        return $this->terminalApiKey;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }
}
