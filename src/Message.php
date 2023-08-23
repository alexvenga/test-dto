<?php

namespace AlexVenga\TestDTO;

use AlexVenga\TestDTO\Interfaces\Serializable;
use AlexVenga\TestDTO\Message\Event;
use AlexVenga\TestDTO\Message\Meta;
use AlexVenga\TestDTO\Message\Payload;
use AlexVenga\TestDTO\Traits\HasJsonSerialize;

class Message implements Serializable
{
    use HasJsonSerialize;

    public function __construct(
        protected ?Meta $meta = null,
        protected ?Event $event = null,
        protected ?Payload $payload = null
    ) {
    }

    public function setMeta(?Meta $meta): static
    {
        $this->meta = $meta;
        return $this;
    }

    public function getMeta(): ?Meta
    {
        return $this->meta ?? $this->meta = new Meta();
    }

    public function setEvent(?Event $event): static
    {
        $this->event = $event;
        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event ?? $this->event = new Event();
    }

    public function setPayload(?Payload $payload): static
    {
        $this->payload = $payload;
        return $this;
    }

    public function getPayload(): ?Payload
    {
        return $this->payload ?? $this->payload = new Payload();
    }

    public function serialize(int $flags = 0, int $depth = 512): string
    {
        $serializable = ['className' => static::class];

        if (!empty($this->meta)) {
            $serializable['meta'] = $this->meta;
        }

        if (!empty($this->event)) {
            $serializable['event'] = $this->event;
        }

        if (!empty($this->payload)) {
            $serializable['payload'] = $this->payload;
        }

        return json_encode($serializable, $flags, $depth);
    }

    public static function deserialize(?string $serialized = null): static
    {
        var_dump('deserialize');
        exit;
    }

}
