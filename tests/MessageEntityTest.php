<?php

namespace Tests;

use AlexVenga\TestDTO\Message;
use AlexVenga\TestDTO\Message\Meta;
use PHPUnit\Framework\TestCase;

class MessageEntityTest extends TestCase
{
    public function testEmptyMessage()
    {
        $message = new Message();

        $this->assertEquals($message, Message::unserialize($message->serialize()));
    }

    public function testFilledMessage()
    {
        $message = new Message();
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
            ->setData('testPayloadKey2', 'testValue');

        $this->assertEquals($message, Message::unserialize($message->serialize()));
    }
}
