<?php

namespace AlexVenga\TestDTO\Interfaces;

interface Serializable
{
    public function serialize(): string;

    public static function deserialize(null|string|array $serialized): static;

}
