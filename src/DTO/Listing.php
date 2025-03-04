<?php

namespace CodebarAg\Flatfox\DTO;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Listing
{
    public function __construct(
        public int $pk,
        public ?string $slug,
        public ?array $url,
        public ?string $short_url,
        public ?array $submit_url,
        public ?string $status,
        public ?string $offer_type,
        public ?string $object_category,
        public ?string $object_type,
        public ?string $reference,
        public ?string $ref_property,
        public ?string $ref_house,
        public ?string $ref_object,
        public ?string $alternative_reference,
        public ?int $price_display,
        public ?string $price_display_type,
        public ?string $price_unit,
        public ?int $rent_net,
        public ?int $rent_charges,
        public ?int $rent_gross,
        public ?string $short_title,
        public ?string $public_title,
        public ?string $pitch_title,
        public ?string $description_title,
        public ?string $description,
        public ?int $surface_living,
        public ?int $surface_property,
        public ?int $surface_usable,
        public ?int $surface_usable_minimum,
        public ?int $volume,
        public ?int $space_display,
        public ?string $number_of_rooms,
        public ?int $floor,
        public ?Collection $attributes,
        public bool $is_furnished,
        public bool $is_temporary,
        public bool $is_selling_furniture,
        public ?string $street,
        public ?int $zipcode,
        public ?string $city,
        public ?string $public_address,
        public ?float $latitude,
        public ?float $longitude,
        public ?int $year_built,
        public ?int $year_renovated,
        public ?string $moving_date_type,
        public ?Carbon $moving_date,
        public ?string $video_url,
        public ?string $tour_url,
        public ?string $website_url,
        public ?string $live_viewing_url,
        public ?int $cover_image,
        public ?Collection $images,
        public ?Collection $documents,
        public ?Agency $agency,
        public bool $reserved,
        public ?string $rent_title,
        public ?int $livingspace,
        public ?Carbon $published,
        public ?Carbon $created,
    ) {}

    public static function fromJson(array $data): self
    {
        $endpoint = trim(config('flatfox.endpoint', 'https://flatfox.ch'), '/');

        $url = $endpoint.Arr::get($data, 'url');
        $submit_url = $endpoint.Arr::get($data, 'submit_url');

        return new self(
            pk: Arr::get($data, 'pk'),
            slug: Arr::get($data, 'slug'),
            url: [
                'de' => Str::replace('/en/flat/', '/de/wohnung/', $url),
                'en' => $url,
                'fr' => Str::replace('/en/', '/fr/', $url),
                'it' => Str::replace('/en/', '/it/', $url),
            ],
            short_url: $endpoint.Arr::get($data, 'short_url'),
            submit_url: [
                'de' => Str::replace('/en/', '/de/', $submit_url),
                'en' => $submit_url,
                'fr' => Str::replace('/en/', '/fr/', $submit_url),
                'it' => Str::replace('/en/', '/it/', $submit_url),
            ],
            status: Arr::get($data, 'status'),
            offer_type: Arr::get($data, 'offer_type'),
            object_category: Arr::get($data, 'object_category'),
            object_type: Arr::get($data, 'object_type'),
            reference: Arr::get($data, 'reference'),
            ref_property: Arr::get($data, 'ref_property'),
            ref_house: Arr::get($data, 'ref_house'),
            ref_object: Arr::get($data, 'ref_object'),
            alternative_reference: Arr::get($data, 'alternative_reference'),
            price_display: Arr::get($data, 'price_display'),
            price_display_type: Arr::get($data, 'price_display_type'),
            price_unit: Arr::get($data, 'price_unit'),
            rent_net: Arr::get($data, 'rent_net'),
            rent_charges: Arr::get($data, 'rent_charges'),
            rent_gross: Arr::get($data, 'rent_gross'),
            short_title: Arr::get($data, 'short_title'),
            public_title: Arr::get($data, 'public_title'),
            pitch_title: Arr::get($data, 'pitch_title'),
            description_title: Arr::get($data, 'description_title'),
            description: Arr::get($data, 'description'),
            surface_living: Arr::get($data, 'surface_living'),
            surface_property: Arr::get($data, 'surface_property'),
            surface_usable: Arr::get($data, 'surface_usable'),
            surface_usable_minimum: Arr::get($data, 'surface_usable_minimum'),
            volume: Arr::get($data, 'volume'),
            space_display: Arr::get($data, 'space_display'),
            number_of_rooms: Arr::get($data, 'number_of_rooms'),
            floor: Arr::get($data, 'floor'),
            attributes: Arr::has($data, 'attributes') ? self::attributes(Arr::get($data, 'attributes')) : null,
            is_furnished: Arr::get($data, 'is_furnished'),
            is_temporary: Arr::get($data, 'is_temporary'),
            is_selling_furniture: Arr::get($data, 'is_selling_furniture'),
            street: Arr::get($data, 'street'),
            zipcode: Arr::get($data, 'zipcode'),
            city: Arr::get($data, 'city'),
            public_address: Arr::get($data, 'public_address'),
            latitude: Arr::get($data, 'latitude'),
            longitude: Arr::get($data, 'longitude'),
            year_built: Arr::get($data, 'year_built'),
            year_renovated: Arr::get($data, 'year_renovated'),
            moving_date_type: Arr::get($data, 'moving_date_type'),
            moving_date: Arr::get($data, 'moving_date') ? Carbon::parse(Arr::get($data, 'moving_date')) : null,
            video_url: Arr::get($data, 'video_url'),
            tour_url: Arr::get($data, 'tour_url'),
            website_url: Arr::get($data, 'website_url'),
            live_viewing_url: Arr::get($data, 'live_viewing_url'),
            cover_image: Arr::get($data, 'cover_image'),
            images: Arr::has($data, 'images') ? self::images(Arr::get($data, 'images')) : null,
            documents: Arr::has($data, 'documents') ? self::documents(Arr::get($data, 'documents')) : null,
            agency: Arr::has($data, 'agency') ? Agency::fromJson(Arr::get($data, 'agency')) : null,
            reserved: Arr::get($data, 'reserved'),
            rent_title: Arr::get($data, 'rent_title'),
            livingspace: Arr::get($data, 'livingspace'),
            published: Arr::get($data, 'published') ? Carbon::parse(Arr::get($data, 'published')) : null,
            created: Arr::get($data, 'created') ? Carbon::parse(Arr::get($data, 'created')) : null,
        );
    }

    protected static function attributes(array $attributes): Collection
    {
        return collect($attributes)->map(function ($result) {
            return Attribute::fromJson($result);
        });
    }

    protected static function images(array $images): Collection
    {
        return collect($images)->map(function ($result) {
            return Image::fromJson($result);
        });
    }

    protected static function documents(array $documents): Collection
    {
        return collect($documents)->map(function ($result) {
            return Document::fromJson($result);
        });
    }
}
