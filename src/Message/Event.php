<?php

namespace AlexVenga\TestDTO\Message;

class Event extends DTO
{
    public function __construct(protected ?string $name = null)
    {
    }

    public function setName(?string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }


    public function serialize(int $flags = 0, int $depth = 512): string
    {
        if (!empty($this->name)) {
            $serializable = [
                'className' => static::class,
                'eventName' => $this->name,
                'data' => $this->data
            ];
            return json_encode($serializable, $flags, $depth);
        }

        return parent::serialize($flags, $depth);
    }


}
