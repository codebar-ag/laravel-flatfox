<?php

namespace CodebarAg\Flatfox\DTO;

use Illuminate\Support\Arr;

class Image
{
    public function __construct(
        public int|null $pk,
        public string|null $caption,
        public string|null $url,
        public string|null $url_thumb_m,
        public string|null $url_listing_search,
        public string|null $search_url,
        public int|null $ordering,
        public int|null $width,
        public int|null $height,
    ) {
    }

    public static function fromJson(array $data): self
    {
        return new self(
            pk: Arr::get($data, 'pk'),
            caption: Arr::get($data, 'caption'),
            url: Arr::get($data, 'url'),
            url_thumb_m: Arr::get($data, 'url_thumb_m'),
            url_listing_search: Arr::get($data, 'url_listing_search'),
            search_url: Arr::get($data, 'search_url'),
            ordering: Arr::get($data, 'ordering'),
            width: Arr::get($data, 'width'),
            height: Arr::get($data, 'height'),
        );
    }
}