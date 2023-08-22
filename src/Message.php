<?php

namespace AlexVenga\TestDTO;

use AlexVenga\TestDTO\Interfaces\Serializable;
use AlexVenga\TestDTO\Message\Event;
use AlexVenga\TestDTO\Message\Meta;
use AlexVenga\TestDTO\Message\Payload;

class Message implements Serializable
{
    protected ?Meta $meta;

    protected ?Event $event;

    protected ?Payload $payload;

    public function setMeta(?Meta $meta): static
    {
        $this->meta = $meta;
        return $this;
    }

    public function getMeta(): ?Meta
    {
        return $this->meta;
    }

    public function setEvent(?Event $event): static
    {
        $this->event = $event;
        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setPayload(?Payload $payload): static
    {
        $this->payload = $payload;
        return $this;
    }

    public function getPayload(): ?Payload
    {
        return $this->payload;
    }

    public function serialize(): string
    {
        var_dump('serialize');
        exit;
    }

    public static function deserialize(null|string|array $serialized): static
    {
        var_dump('serialize');
        exit;
    }

}
