<?php

declare(strict_types=1);

namespace Zen\Request\Dto;

use Zen\Util\ToArrayTrait;

/**
 * Class representing the source details for the transaction.
 */
class SourceRequestDto
{
    use ToArrayTrait;

    private const string DEFAULT_CHANNEL = 'PTS_ZEN_API';

    /**
     * Channel identifier for the transaction source.
     * Maximum length: 32 characters.
     */
    private string $channel;

    /**
     * Plugin name for the source.
     * Maximum length: 32 characters.
     */
    private ?string $pluginName = null;

    /**
     * Plugin version for the source.
     * Maximum length: 16 characters.
     */
    private ?string $pluginVersion = null;

    /**
     * Platform name for the source.
     * Maximum length: 32 characters.
     */
    private ?string $platformName = null;

    /**
     * Platform version for the source.
     * Maximum length: 16 characters.
     */
    private ?string $platformVersion = null;

    public function __construct(string $channel = self::DEFAULT_CHANNEL)
    {
        $this->channel = $channel;
    }

    public function setPluginName(?string $pluginName = null): self
    {
        $this->pluginName = $pluginName;

        return $this;
    }

    public function setPluginVersion(?string $pluginVersion = null): self
    {
        $this->pluginVersion = $pluginVersion;

        return $this;
    }

    public function setPlatformName(?string $platformName = null): self
    {
        $this->platformName = $platformName;

        return $this;
    }

    public function setPlatformVersion(?string $platformVersion = null): self
    {
        $this->platformVersion = $platformVersion;

        return $this;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    public function getPluginName(): ?string
    {
        return $this->pluginName;
    }

    public function getPluginVersion(): ?string
    {
        return $this->pluginVersion;
    }

    public function getPlatformName(): ?string
    {
        return $this->platformName;
    }

    public function getPlatformVersion(): ?string
    {
        return $this->platformVersion;
    }
}
