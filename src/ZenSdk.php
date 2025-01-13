<?php

declare(strict_types=1);

namespace Zen;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Zen\Config\AbstractConfig;
use Zen\Config\ConfigProvider;
use Zen\Request\Dto\CreatePayoutRequestDto;
use Zen\Request\Dto\CreateTransactionRequestDto;
use Zen\Request\Dto\RefundRequestDto;
use Zen\Request\Payout\CreatePayoutRequest;
use Zen\Request\RequestBuilder;
use Zen\Request\Transaction\CreateTransactionRequest;
use Zen\Request\Transaction\GetTransactionStatusRequest;
use Zen\Request\Transaction\RefundTransactionRequest;
use Zen\Response\ZenResponse;

/**
 *  its sdk - facade for Zen.com api
 */
class ZenSdk
{
    private RequestBuilder $requestBuilder;

    private Client $client;

    private AbstractConfig $config;

    public function __construct()
    {
        $this->config = ConfigProvider::provide();
        $this->requestBuilder = new RequestBuilder($this->config);
        $this->client = new Client;
    }

    /**
     * @throws GuzzleException
     */
    public function createPayout(string $requestId, CreatePayoutRequestDto $dto): ZenResponse
    {
        return $this->sendRequest(
            $this->requestBuilder->build(new CreatePayoutRequest($requestId, $dto))
        );
    }

    /**
     * @throws GuzzleException
     */
    public function createTransaction(string $requestId, CreateTransactionRequestDto $dto): ZenResponse
    {
        return $this->sendRequest(
            $this->requestBuilder->build(new CreateTransactionRequest($requestId, $dto))
        );
    }

    /**
     * @throws GuzzleException
     */
    public function getTransactionStatus(string $requestId, string $transactionId): ZenResponse
    {
        return $this->sendRequest(
            $this->requestBuilder->build(new GetTransactionStatusRequest($requestId, $transactionId))
        );
    }

    /**
     * @throws GuzzleException
     */
    public function refundTransaction(string $requestId, RefundRequestDto $dto): ZenResponse
    {
        return $this->sendRequest(
            $this->requestBuilder->build(new RefundTransactionRequest($requestId, $dto))
        );
    }

    /**
     * Validating the IPN using hash
     */
    public function isNotificationValid(string $notification): bool
    {
        $data = json_decode($notification, true);
        $ipnHash = $data['hash'];

        $mtId = $data['merchantTransactionId'];
        $currency = $data['currency'];
        $amount = $data['amount'];
        $transactionStatus = $data['status'];
        $ipnSecret = $this->config->getIpnSecret();

        $str = \sprintf('%s%s%s%s%s', $mtId, $currency, $amount, $transactionStatus, $ipnSecret);
        $hash = hash('sha256', $str);

        return $ipnHash === strtoupper($hash);
    }

    /**
     * @throws GuzzleException
     */
    private function sendRequest(Request $request): ZenResponse
    {
        try {
            $response = $this->client->send($request);
        } catch (\Exception $e) {
            return new ZenResponse($e->getMessage(), $e->getCode());
        }

        return new ZenResponse(
            $response->getBody()->getContents(),
            $response->getStatusCode()
        );
    }
}
