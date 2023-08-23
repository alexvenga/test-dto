<?php

namespace AlexVenga\TestDTO\Interfaces;

interface Serializable
{
    public function serialize(): string;

    public static function unserialize(string $data): static;
}
