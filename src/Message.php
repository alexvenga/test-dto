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
        if (empty($serialized)) {
            return new static();
        }

        $unserialized = json_decode($serialized, true);

        if (empty($unserialized['className'])) {
            throw new \InvalidArgumentException('Unknown message class name');
        }

        return (new $unserialized['className']())
            ->setMeta(isset($unserialized['meta']) ? Meta::deserialize($unserialized['meta']) : null)
            ->setEvent(isset($unserialized['event']) ? Event::deserialize($unserialized['event']) : null)
            ->setPayload(isset($unserialized['payload']) ? Payload::deserialize($unserialized['payload']) : null);
    }

}
