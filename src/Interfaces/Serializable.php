<?php

namespace AlexVenga\TestDTO\Interfaces;

interface Serializable
{
    public function serialize(int $flags = 0, int $depth = 512): string;

    public static function deserialize(?string $serialized = null): static;

}
