<?php

namespace CodebarAg\Flatfox\DTO;

use Illuminate\Support\Arr;

class Attribute
{
    public function __construct(
        public string|null $name,
    ) {
    }

    public static function fromJson(array $data): self
    {
        return new self(
            name: Arr::get($data, 'name'),
        );
    }
}
