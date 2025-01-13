# zen-com-php-sdk

PHP client library for interaction with ZEN.COM API


## Usage
### add params to .env
```php
ZEN_IPN_SECRET=aeb8e7bf-0009-4f30-b521-1136fd336ae6
ZEN_TERMINAL_KEY=terminal_key
ZEN_API_KEY=key
ZEN_SANDBOX_MODE=true
```

### creat transaction
```php
$sdk = new Zen\ZenSdk();
$requestId = 'us04oqdnzFQVr0rITD9sXVfwervrITD9sXVfwerv';

$dto = new CreateTransactionRequestDto(
    "23beb187-f8a3-44b8-9ef8-b31180358dd3",
    "PCL_CARD",
    "123.04",
    "PLN",
    new Zen\Request\Dto\CustomerRequestDto('email@a.com', '0.0.0.0')
);

$response = $sdk->createTransaction($requestId, $dto);
var_dump($response);
```

### Get transaction status
```php
$sdk = new Zen\ZenSdk();
$requestId = 'us04oqdnzFQVr0rITD9sXVfwervrITD9sXVfwerv';
$transactionId = '23beb187-f8a3-44b8-9ef8-b31180358dd3';

$response = $sdk->getTransactionStatus($requestId, $transactionId);
var_dump($response);
```

### Refund transaction
```php
$sdk = new Zen\ZenSdk();
$requestId = 'us04oqdnzFQVr0rITD9sXVfwervrITD9sXVfwerv';
$refundDto = new RefundRequestDto(
    '23beb187-f8a3-44b8-9ef8-b31180358dd3',
    '23beb187-f8a3-44b8-9ef8-b31180358dd3',
    "123.22",
    "PLN"
);
$response = $sdk->refundTransaction($requestId, $refundDto);
var_dump($response);
```

### Create payout
```php
$sdk = new Zen\ZenSdk();
$requestId = 'us04oqdnzFQVr0rITD9sXVfwervrITD9sXVfwerv';
$refundDto = new CreatePayoutRequestDto(
    '23beb187-f8a3-44b8-9ef8-b31180358dd3',
    'PCL_CARD',
    "123.22",
    "PLN",
    new CustomerRequestDto('email@a.com', '0.0.0.0'),
    new SpecificDataRequestDto('9dbad520-8162-11ef-8c1e-0800200c9a66', 'paynow')
);

$response = $sdk->createPayout($requestId, $refundDto);
var_dump($response);
```

### Verify notification
```php
$correctNotificationData = '{
   "type":"TRT_PURCHASE",
   "transactionId":"2d36ff20-017d-4c63-b626-407edb369cc2",
   "merchantTransactionId":"feb78e88-47bc-428a-8ea4-806535aaf2de",
   "amount":"100",
   "currency":"PLN",
   "status":"PENDING",
   "hash":"28EE6604A8A40ACC8B8CE0B8DE9AAC87A4E24BBF0388A48ED164E512C8073C7E",
   "signature":"D3739E5ADCC20E436DEE8F386C81B1C3ACCCE0558FAB65EC924564F998F983EE"
}';
$badNotificationData = '{
   "type":"TRT_PURCHASE",
   "transactionId":"2d36ff20-017d-4c63-b626-407edb369cc2",
   "merchantTransactionId":"feb78e88-47bc-428a-8ea4-806535aaf2de",
   "amount":"100",
   "currency":"PLN",
   "status":"PENDING",
   "hash":"0000000000000000000000000000000000000000000000000000000000000000",
   "signature":"D3739E5ADCC20E436DEE8F386C81B1C3ACCCE0558FAB65EC924564F998F983EE"
}';

echo \sprintf(
    "expected verification result: true. actual verification result: %s<br>",
    var_export($sdk->isNotificationValid($correctNotificationData), true)
);

echo \sprintf(
    "expected verification result: false. actual verification result: %s<br>",
    var_export($sdk->isNotificationValid($badNotificationData), true)
);

```

## API Documentation
See the official zen.com [API documentation](https://www.zen.com/developer/)

## License
MIT license.
