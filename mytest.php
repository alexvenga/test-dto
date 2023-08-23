<?php

use AlexVenga\TestDTO\Message;
use AlexVenga\TestDTO\Message\Meta;

include_once 'vendor/autoload.php';


$message = new AlexVenga\TestDTO\Message();
$meta = new Meta();

$meta->setData('testMetaKey', 'testValue');
$meta->setData('testMetaKey2', 'testValue2');
$message->setMeta($meta);
$message->getMeta()
    ->setData('testMetaKey3', 'testValue3')
    ->setData('testMetaKey2', 'testValueOverwrite');

$message->getEvent()
    ->setName('newEvent');

$message->getPayload()
    ->setData('testPayloadKey', 'testValue')
    ->setData('testPayloadKey2', 'testValue')
    ->setData(
        'sub-event',
        $message->getEvent()
    );

print_r($message);
echo PHP_EOL;
echo PHP_EOL;
print_r($message->serialize());
echo PHP_EOL;
echo PHP_EOL;
print_r(Message::unserialize($message->serialize()));
