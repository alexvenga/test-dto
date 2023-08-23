<?php

namespace AlexVenga\TestDTO\Message;

use AlexVenga\TestDTO\Interfaces\Serializable;
use AlexVenga\TestDTO\Traits\HasJsonSerialize;
use JsonSerializable;

class DTO implements Serializable, JsonSerializable
{
    use HasJsonSerialize;

    protected array $data = [];

    public function setData(string $key, mixed $value): static
    {
        if (is_resource($value)) {
            throw new \InvalidArgumentException('$value can`t be resource');
        }

        $this->data[$key] = $value;

        return $this;
    }

    public function getData(?string $get): array
    {
        return $this->data;
    }

    public function serialize(int $flags = 0, int $depth = 512): string
    {
        $serializable = [
            'className' => static::class,
            'data' => $this->data
        ];

        return json_encode($serializable, $flags, $depth);
    }

    public static function deserialize(?string $serialized = null): static
    {
        if (empty($serialized)) {
            return new static();
        }

        $unserialized = json_decode($serialized, true);

        if (empty($unserialized['className'])) {
            throw new \InvalidArgumentException('Unknown class name');
        }

        $object = new $unserialized['className']();

        if (!empty($unserialized['data'])) {
            foreach ($unserialized['data'] as $key => $value) {
                $object->setData($key, $value); // TODO unserelize object of my classes
            }
        }

        return $object;
    }
}
