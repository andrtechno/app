<?php

/**
 * Before you run this example:
 * 1. copy config.php.dist to config.php: cp config.php.dist config.php
 *
 * @author Novikov Bogdan <hcbogdan@gmail.com>
 */

require_once '../vendor/autoload.php';

use Viber\Client;

$apiKey = '48ac2da20027d4dc-e81fc2486fe80d0d-e99790255b8e5e0b';
$webhookUrl = 'https://pixelion.com.ua/page/bot'; // for exmaple https://my.com/bot.php
try {
    $client = new Client(['token' => $apiKey]);
    $result = $client->setWebhook($webhookUrl);
    echo "Success!\n"; // print_r($result);
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage() . "\n";
}
