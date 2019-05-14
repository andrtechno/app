#!/usr/bin/env php
<?php
require __DIR__ . '/vendor/autoload.php';
//require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

$bot_api_key = '835652742:AAES6NfEgJm7GMWmKzxkOy861ppAHkCezZo';
$bot_username = 'pixelionbot';
// Define all IDs of admin users in this array (leave as empty array if not used)
$admin_users = [
//    123,
];
// Define all paths for your custom commands in this array (leave as empty array if not used)
$commands_paths = [
    //  __DIR__ . '/vendor/longman/telegram-bot/src/Commands/UserCommands/SystemCommands',
    //  __DIR__ . '/vendor/panix/mod-telegram/commands/UserCommands',
];
// Enter your MySQL database credentials
$mysql_credentials = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '47228960panix',
    'database' => 'telegram',
];
try {
    while (true) {
        sleep(2);
        // Create Telegram API object
        $telegram = new Longman\TelegramBot\Telegram($bot_api_key, $bot_username);
        // Add commands paths containing your custom commands
        $telegram->addCommandsPaths($commands_paths);
        // Enable admin users
        $telegram->enableAdmins($admin_users);
        // Enable MySQL
        $telegram->enableMySql($mysql_credentials);
        // Logging (Error, Debug and Raw Updates)
        Longman\TelegramBot\TelegramLog::initErrorLog(__DIR__ . "/runtime/telegram/{$bot_username}_error.log");
        Longman\TelegramBot\TelegramLog::initDebugLog(__DIR__ . "/runtime/telegram/{$bot_username}_debug.log");
        Longman\TelegramBot\TelegramLog::initUpdateLog(__DIR__ . "/runtime/telegram/{$bot_username}_update.log");
        // If you are using a custom Monolog instance for logging, use this instead of the above
        //Longman\TelegramBot\TelegramLog::initialize($your_external_monolog_instance);
        // Set custom Upload and Download paths
        //$telegram->setDownloadPath(__DIR__ . '/Download');
        $telegram->setUploadPath(__DIR__ . '/web/uploads');
        // Here you can set some command specific parameters
        // e.g. Google geocode/timezone api key for /date command
        //$telegram->setCommandConfig('date', ['google_api_key' => 'your_google_api_key_here']);
        // Botan.io integration
        //$telegram->enableBotan('your_botan_token');
        // Requests Limiter (tries to prevent reaching Telegram API limits)
        $telegram->enableLimiter();
        $telegram->runCommands([
            '/whoami',
            "/echo I'm a bot!",
        ]);

        //$commandsList = $telegram->getCommandsList();
        //print_r($commandsList);die;


        // Handle telegram getUpdates request
        $server_response = $telegram->handleGetUpdates();
        if ($server_response->isOk()) {
            foreach ($server_response->getResult() as $result) {
                \Longman\TelegramBot\Request::sendMessage([
                    'text' => 'Hi 😜 <strong>Panix!</strong>',
                    'chat_id' => $result->message['chat']['id'],
                    'parse_mode' => 'HTML',
                    'reply_markup' => [
                        'inline_keyboard' => [
                            [
                                [
                                    'text' => "refresh",
                                    'callback_data' => time()
                                ],
                                [
                                    'text' => "refresh 2",
                                    'callback_data' => time()
                                ]
                            ]
                        ]
                    ]
                ]);

                \Longman\TelegramBot\Request::sendPhoto([
                    'photo' => __DIR__ . '/web/uploads/watermark.png',
                    'chat_id' => $result->message['chat']['id'],
                    'caption' => 'LALAL'
                ]);

                \Longman\TelegramBot\Request::sendContact([
                    'phone_number' => '0682937379',
                    'chat_id' => $result->message['chat']['id'],
                    'first_name' => 'Panix',
                    'last_name' => 'Web Developer',
                ]);

            }

            $update_count = count($server_response->getResult());
            echo date('Y-m-d H:i:s', time()) . ' - Processed ' . $update_count . ' updates' . PHP_EOL;
        } else {
            echo date('Y-m-d H:i:s', time()) . ' - Failed to fetch updates' . PHP_EOL;
            echo $server_response->printError();
        }
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    echo $e->getMessage();
    // Log telegram errors
    Longman\TelegramBot\TelegramLog::error($e);
} catch (Longman\TelegramBot\Exception\TelegramLogException $e) {
    // Catch log initialisation errors
    echo $e->getMessage();
}