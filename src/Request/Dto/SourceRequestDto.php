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
     *
     * @var string
     */
    private string $channel;

    /**
     * Plugin name for the source.
     * Maximum length: 32 characters.
     *
     * @var string|null
     */
    private ?string $pluginName = null;

    /**
     * Plugin version for the source.
     * Maximum length: 16 characters.
     *
     * @var string|null
     */
    private ?string $pluginVersion = null;

    /**
     * Platform name for the source.
     * Maximum length: 32 characters.
     *
     * @var string|null
     */
    private ?string $platformName = null;

    /**
     * Platform version for the source.
     * Maximum length: 16 characters.
     *
     * @var string|null
     */
    private ?string $platformVersion = null;

    /**
     * @param string $channel
     */
    public function __construct(string $channel = self::DEFAULT_CHANNEL)
    {
        $this->channel = $channel;
    }

    /**
     * @param string|null $pluginName
     *
     * @return self
     */
    public function setPluginName(?string $pluginName = null): self
    {
        $this->pluginName = $pluginName;

        return $this;
    }

    /**
     * @param string|null $pluginVersion
     *
     * @return self
     */
    public function setPluginVersion(?string $pluginVersion = null): self
    {
        $this->pluginVersion = $pluginVersion;

        return $this;
    }

    /**
     * @param string|null $platformName
     *
     * @return self
     */
    public function setPlatformName(?string $platformName = null): self
    {
        $this->platformName = $platformName;

        return $this;
    }

    /**
     * @param string|null $platformVersion
     *
     * @return self
     */
    public function setPlatformVersion(?string $platformVersion = null): self
    {
        $this->platformVersion = $platformVersion;

        return $this;
    }

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * @return string|null
     */
    public function getPluginName(): ?string
    {
        return $this->pluginName;
    }

    /**
     * @return string|null
     */
    public function getPluginVersion(): ?string
    {
        return $this->pluginVersion;
    }

    /**
     * @return string|null
     */
    public function getPlatformName(): ?string
    {
        return $this->platformName;
    }

    /**
     * @return string|null
     */
    public function getPlatformVersion(): ?string
    {
        return $this->platformVersion;
    }
}
