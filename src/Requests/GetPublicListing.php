<?php

namespace CodebarAg\Flatfox\Requests;

use CodebarAg\Flatfox\Response\PublicListing;
use Illuminate\Support\Facades\Cache;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Http\SoloRequest;

class GetPublicListing extends SoloRequest implements Cacheable
{
    use HasCaching;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        $endpoint = trim(config('flatfox.endpoint', 'https://flatfox.ch'), '/');

        $this->expand = array_merge($this->expand, ['documents', 'images']);

        $expand = implode(',', $this->expand);

        return sprintf('%s/api/v1/public-listing/?organization=%s&expand=%s',
            $endpoint,
            urlencode($this->identifier),
            urlencode($expand)
        );
    }

    public function __construct(
        protected string $identifier,
        protected array $expand = [],
    ) {
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        return PublicListing::fromResponse($response);
    }

    protected function defaultConfig(): array
    {
        return [
            'timeout' => config('flatfox.timeout', 15),
        ];
    }

    public function resolveCacheDriver(): Driver
    {
        return new LaravelCacheDriver(Cache::store('file'));
    }

    public function cacheExpiryInSeconds(): int
    {
        return config('flatfox.caching', 1);
    }
}
