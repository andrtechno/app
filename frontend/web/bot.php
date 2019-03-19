<?php

/**
 * Before you run this example:
 * 1. install monolog/monolog: composer require monolog/monolog
 * 2. copy config.php.dist to config.php: cp config.php.dist config.php
 *
 * @author Novikov Bogdan <hcbogdan@gmail.com>
 */

require_once '../vendor/autoload.php';

use Viber\Bot;
use Viber\Api\Sender;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$apiKey = '48ac2da20027d4dc-e81fc2486fe80d0d-e99790255b8e5e0b';
$webhookUrl = 'https://pixelion.com.ua/page/bot';

// reply name
$botSender = new Sender([
    'name' => 'Whois bot',
    'avatar' => 'https://pixelion.com.ua/favicon.ico',
]);

$bot = null;

try {
    // create bot instance
    $bot = new Bot(['token' => $apiKey]);
    $bot
        ->onConversation(function ($event) use ($bot, $botSender) {
            // this event fires if user open chat, you can return "welcome message"
            // to user, but you can't send more messages!
            return (new \Viber\Api\Message\Text())
                ->setSender($botSender)
                ->setText('Can i help you?');
        })
        ->onText('|whois .*|si', function ($event) use ($bot, $botSender) {

            // match by template, for example "whois Bogdaan"
            $bot->getClient()->sendMessage(
                (new \Viber\Api\Message\Text())
                    ->setSender($botSender)
                    ->setReceiver($event->getSender()->getId())
                    ->setText('I do not know )')
            );
        })
        ->onText('|.*|s', function ($event) use ($bot, $botSender) {

            // .* - match any symbols
            $bot->getClient()->sendMessage(
                (new \Viber\Api\Message\Text())
                    ->setSender($botSender)
                    ->setReceiver($event->getSender()->getId())
                    ->setText('HI!')
            );
        })
        ->onPicture(function ($event) use ($bot, $botSender) {

            $bot->getClient()->sendMessage(
                (new \Viber\Api\Message\Text())
                    ->setSender($botSender)
                    ->setReceiver($event->getSender()->getId())
                    ->setText('Nice picture ;-)')
            );
        })
        ->on(function ($event) {
            return true; // match all
        }, function ($event) use ($log) {

        })
        ->run();
} catch (Exception $e) {
    echo ('Exception: '. $e->getMessage());
    if ($bot) {
      ///  $log->warning('Actual sign: ' . $bot->getSignHeaderValue());
      //  $log->warning('Actual body: ' . $bot->getInputBody());
    }
}
