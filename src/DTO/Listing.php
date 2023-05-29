<?php

namespace CodebarAg\Flatfox\DTO;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class Listing
{
    public function __construct(
        public int $pk,
        public string|null $slug,
        public string|null $url,
        public string|null $short_url,
        public string|null $submit_url,
        public string|null $status,
        public string|null $offer_type,
        public string|null $object_category,
        public string|null $object_type,
        public string|null $reference,
        public string|null $ref_property,
        public string|null $ref_house,
        public string|null $ref_object,
        public string|null $alternative_reference,
        public int|null $price_display,
        public string|null $price_display_type,
        public string|null $price_unit,
        public int|null $rent_net,
        public int|null $rent_charges,
        public int|null $rent_gross,
        public string|null $short_title,
        public string|null $public_title,
        public string|null $pitch_title,
        public string|null $description_title,
        public string|null $description,
        public int|null $surface_living,
        public int|null $surface_property,
        public int|null $surface_usable,
        public int|null $surface_usable_minimum,
        public int|null $volume,
        public int|null $space_display,
        public string|null $number_of_rooms,
        public int|null $floor,
        public Collection|null $attributes,
        public bool $is_furnished,
        public bool $is_temporary,
        public bool $is_selling_furniture,
        public string|null $street,
        public int|null $zipcode,
        public string|null $city,
        public string|null $public_address,
        public float|null $latitude,
        public float|null $longitude,
        public int|null $year_built,
        public int|null $year_renovated,
        public string|null $moving_date_type,
        public Carbon|null $moving_date,
        public string|null $video_url,
        public string|null $tour_url,
        public string|null $website_url,
        public string|null $live_viewing_url,
        public int|null $cover_image,
        public Collection|null $images,
        public Collection|null $documents,
        public Agency|null $agency,
        public bool $reserved,
        public string|null $rent_title,
        public int|null $livingspace,
        public Carbon|null $published,
        public Carbon|null $created,
    ) {
    }

    public static function fromJson(array $data): self
    {
        $endpoint = trim(config('flatfox.endpoint', 'https://flatfox.ch'), '/');

        return new self(
            pk: Arr::get($data, 'pk'),
            slug: Arr::get($data, 'slug'),
            url: $endpoint.Arr::get($data, 'url'),
            short_url: $endpoint.Arr::get($data, 'short_url'),
            submit_url: $endpoint.Arr::get($data, 'submit_url'),
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
