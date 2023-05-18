<?php

namespace CodebarAg\Flatfox\DTO;

use Illuminate\Support\Arr;

class Agency
{
    public function __construct(
        public string|null $name,
        public string|null $name_2,
        public string|null $street,
        public string|null $zipcode,
        public string|null $city,
        public string|null $country,
        public string|null $logo_url,
        public string|null $logo_url_org_logo_m,
    ) {
    }

    public static function fromJson(array $data): self
    {
        return new self(
            name: Arr::get($data, 'name'),
            name_2: Arr::get($data, 'name'),
            street: Arr::get($data, 'street'),
            zipcode: Arr::get($data, 'zipcode'),
            city: Arr::get($data, 'city'),
            country: Arr::get($data, 'country'),
            logo_url: Arr::get($data, 'logo.url'),
            logo_url_org_logo_m: Arr::get($data, 'logo.url_org_logo_m'),
        );
    }
}
