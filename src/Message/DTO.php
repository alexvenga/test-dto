<?php

namespace AlexVenga\TestDTO\Message;

use AlexVenga\TestDTO\Interfaces\Serializable;
use AlexVenga\TestDTO\Traits\HasSerialization;

class DTO implements Serializable
{
    use HasSerialization;

    protected array $data = [];

    public function setData(null|string|array $key = null, mixed $value = null): static
    {
        if (is_null($key)) {
            $this->data = [];
            return $this;
        }

        if (is_array($key)) {
            if (!array_is_list($key)) {
                throw new \InvalidArgumentException('Data array must be associative');
            }
            $this->data = $key;
            return $this;
        }

        if (is_resource($value)) {
            throw new \InvalidArgumentException('value can`t be resource');
        }

        $this->data[$key] = $value;

        return $this;
    }

    public function getData(?string $key = null): mixed
    {
        if (!is_null($key)) {
            return $this->data[$key] ?? null;
        }

        return $this->data;
    }

}
