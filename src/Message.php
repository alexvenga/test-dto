<?php

namespace AlexVenga\TestDTO;

use AlexVenga\TestDTO\Interfaces\Serializable;
use AlexVenga\TestDTO\Message\Event;
use AlexVenga\TestDTO\Message\Meta;
use AlexVenga\TestDTO\Message\Payload;
use AlexVenga\TestDTO\Traits\HasSerialization;

class Message implements Serializable
{
    use HasSerialization;

    public function __construct(
        protected ?Meta $meta = null,
        protected ?Event $event = null,
        protected ?Payload $payload = null
    ) {
    }

    public function setMeta(?Meta $meta = null): static
    {
        if (!is_null($meta)) {
            $this->meta = $meta;
        }
        return $this;
    }

    public function getMeta(): ?Meta
    {
        return $this->meta ?? $this->meta = new Meta();
    }

    public function setEvent(?Event $event = null): static
    {
        if (!is_null($event)) {
            $this->event = $event;
        }
        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event ?? $this->event = new Event();
    }

    public function setPayload(?Payload $payload = null): static
    {
        if (!is_null($payload)) {
            $this->payload = $payload;
        }
        return $this;
    }

    public function getPayload(): ?Payload
    {
        return $this->payload ?? $this->payload = new Payload();
    }

}
