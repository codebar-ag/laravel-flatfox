<?php

namespace CodebarAg\Flatfox\Response;

use Illuminate\Support\Arr;
use Saloon\Contracts\Response;

class PublicListing
{
    public function __construct(
        public int $count,
        public string|null $next,
        public string|null $previous,
        public array|null $results,
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $data = $response->json();

        return new static(
            Arr::get($data, 'count'),
            Arr::get($data, 'next'),
            Arr::get($data, 'previous'),
            Arr::get($data, 'results'),
        );
    }
}
