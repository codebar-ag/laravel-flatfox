<?php

namespace CodebarAg\Flatfox\Response;

use CodebarAg\Flatfox\DTO\Listing;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Http\Response;

final class PublicListing
{
    public function __construct(
        public int $count,
        public ?string $next,
        public ?string $previous,
        public ?Collection $results,
    ) {}

    public static function fromResponse(Response $response): self
    {
        $data = $response->json();

        return new self(
            Arr::get($data, 'count'),
            Arr::get($data, 'next'),
            Arr::get($data, 'previous'),
            Arr::has($data, 'results') ? self::prepareResults(Arr::get($data, 'results')) : null,
        );
    }

    protected static function prepareResults(array $results): Collection
    {
        return collect($results)->map(function ($result) {
            return Listing::fromJson($result);
        });
    }
}
