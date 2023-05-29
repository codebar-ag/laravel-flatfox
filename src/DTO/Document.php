<?php

namespace CodebarAg\Flatfox\DTO;

use Illuminate\Support\Arr;

class Document
{
    public function __construct(
        public int|null $pk,
        public string|null $url,
        public int|null $ordering,
        public string|null $caption,
    ) {
    }

    public static function fromJson(array $data): self
    {
        $endpoint = trim(config('flatfox.endpoint', 'https://flatfox.ch'), '/');

        return new self(
            pk: Arr::get($data, 'pk'),
            url: $endpoint.Arr::get($data, 'url'),
            ordering: Arr::get($data, 'ordering'),
            caption: Arr::get($data, 'caption'),
        );
    }
}
