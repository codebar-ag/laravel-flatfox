<?php

namespace CodebarAg\Flatfox\DTO;

use Illuminate\Support\Arr;

class Image
{
    public function __construct(
        public ?int $pk,
        public ?string $caption,
        public ?string $url,
        public ?string $url_thumb_m,
        public ?string $url_listing_search,
        public ?string $search_url,
        public ?int $ordering,
        public ?int $width,
        public ?int $height,
    ) {
    }

    public static function fromJson(array $data): self
    {
        $endpoint = trim(config('flatfox.endpoint', 'https://flatfox.ch'), '/');

        return new self(
            pk: Arr::get($data, 'pk'),
            caption: Arr::get($data, 'caption'),
            url: $endpoint.Arr::get($data, 'url'),
            url_thumb_m: $endpoint.Arr::get($data, 'url_thumb_m'),
            url_listing_search: $endpoint.Arr::get($data, 'url_listing_search'),
            search_url: $endpoint.Arr::get($data, 'search_url'),
            ordering: Arr::get($data, 'ordering'),
            width: Arr::get($data, 'width'),
            height: Arr::get($data, 'height'),
        );
    }
}
