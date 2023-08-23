<?php

namespace AlexVenga\TestDTO\Traits;

trait HasJsonSerialize
{
    public function jsonSerialize(): string
    {
        return $this->serialize();
    }

}
