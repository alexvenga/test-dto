<?php

namespace AlexVenga\TestDTO\Traits;

trait HasSerialization
{
    public function serialize(): string
    {
        return serialize($this);
    }

    public static function unserialize(string $data): static
    {
        return unserialize($data);
    }
}
