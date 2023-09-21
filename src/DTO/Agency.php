<?php

namespace CodebarAg\Flatfox\DTO;

use Illuminate\Support\Arr;

class Agency
{
    public function __construct(
        public ?string $name,
        public ?string $name_2,
        public ?string $street,
        public ?string $zipcode,
        public ?string $city,
        public ?string $country,
        public ?string $logo_url,
        public ?string $logo_url_org_logo_m,
    ) {
    }

    public static function fromJson(array $data): self
    {
        $endpoint = trim(config('flatfox.endpoint', 'https://flatfox.ch'), '/');

        return new self(
            name: Arr::get($data, 'name'),
            name_2: Arr::get($data, 'name'),
            street: Arr::get($data, 'street'),
            zipcode: Arr::get($data, 'zipcode'),
            city: Arr::get($data, 'city'),
            country: Arr::get($data, 'country'),
            logo_url: $endpoint.Arr::get($data, 'logo.url'),
            logo_url_org_logo_m: $endpoint.Arr::get($data, 'logo.url_org_logo_m'),
        );
    }
}
