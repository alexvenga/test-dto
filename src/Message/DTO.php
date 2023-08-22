<?php

namespace AlexVenga\TestDTO\Message;

use AlexVenga\TestDTO\Interfaces\Serializable;

class DTO implements Serializable
{
    protected array $data = [];

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

    public function setData(string|array|Serializable $key, mixed $value): static
    {
        //$this->data = $data;
        return $this;
    }

    public function getData(?string $get): array
    {
        return $this->data;
    }

}
