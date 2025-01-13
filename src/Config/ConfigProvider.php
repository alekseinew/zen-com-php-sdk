<?php
declare(strict_types=1);

namespace Zen\Config;

class ConfigProvider
{
    private const string ENV_KEY_SANDBOX_MODE = "ZEN_SANDBOX_MODE";
    private const string ENV_KEY_IPN_SECRET = "ZEN_IPN_SECRET";
    private const string ENV_KEY_TERMINAL_KEY = "ZEN_TERMINAL_KEY";
    private const string ENV_KEY_ZEN_API_KEY= "ZEN_API_KEY";

    public const array REQUIRED_ENV_PARAMS = [
        self::ENV_KEY_SANDBOX_MODE,
        self::ENV_KEY_IPN_SECRET,
        self::ENV_KEY_TERMINAL_KEY,
        self::ENV_KEY_ZEN_API_KEY
    ];

    /**
     * @return AbstractConfig
     */
    public static function provide(): AbstractConfig
    {
        self::verifyEnvsDefined();

        $ipnSecret = $_ENV[self::ENV_KEY_IPN_SECRET];
        $terminalApiKey = $_ENV[self::ENV_KEY_TERMINAL_KEY];
        $apiKey = $_ENV[self::ENV_KEY_ZEN_API_KEY];
        $isDebug = filter_var($_ENV[self::ENV_KEY_SANDBOX_MODE], FILTER_VALIDATE_BOOLEAN);

        return $isDebug
            ? new SandboxConfig($ipnSecret, $terminalApiKey, $apiKey)
            : new LiveConfig($ipnSecret, $terminalApiKey, $apiKey);
    }

    /**
     * Checks if all required environment variables are set.
     *
     * @return void
     */
    private static function verifyEnvsDefined()
    {
        foreach (self::REQUIRED_ENV_PARAMS as $param) {
            if (!isset($_ENV[$param])) {
                throw new \RuntimeException("env $param is not set");
            }
        }
    }
}
