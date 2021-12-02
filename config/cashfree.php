<?php

return [
    //These are for the Marketplace
    'appID' => '96699e9cee1a3f73a8aea627899669',
    'secretKey' => '38e28e939c4ddfb6ff375f442f1c898359955bf1',
    'testURL' => 'https://ces-gamma.cashfree.com',
    'prodURL' => 'https://ces-api.cashfree.com',
    'maxReturn' => 100, //this is for request pagination
    'isLive' => true,

    //For the PaymentGateway.
    'PG' => [
        'appID' => '96699e9cee1a3f73a8aea627899669',
        'secretKey' => '38e28e939c4ddfb6ff375f442f1c898359955bf1',
        'testURL' => 'https://test.cashfree.com',
        'prodURL' => 'https://api.cashfree.com',
        'isLive' => true
    ]
];
