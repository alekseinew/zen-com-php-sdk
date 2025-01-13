<?php
declare(strict_types=1);

namespace Zen\Request;

use GuzzleHttp\Psr7\Request;
use Zen\Request\ZenRequestInterface;
use Zen\Config\AbstractConfig;
use Zen\Config\ConfigProvider;

class RequestBuilder
{
    public function __construct(private AbstractConfig $config)
    {}

    /**
     * Build and return the HTTP request.
     *
     * @param ZenRequestInterface $request
     *
     * @return Request
     */
    public function build(ZenRequestInterface $request): Request
    {
        $uri = rtrim($this->config->getApiUrl(), '/') . '/' . ltrim($request->getPath(), '/');

        $headers = $request->getHeaders();
        $headers['Content-Type'] = 'application/json';
        $headers['Authorization'] = \sprintf('Bearer %s', $this->config->getApiKey());

        return new Request(
            $request->getType(),
            $uri,
            $headers,
            $request->getBody()
        );
    }
}
