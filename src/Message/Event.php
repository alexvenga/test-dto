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

}
