<?php

namespace CodebarAg\Flatfox\Requests;

use CodebarAg\Flatfox\Response\PublicListing;
use Illuminate\Support\Facades\Cache;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\LaravelCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\SoloRequest;

class GetPublicListing extends SoloRequest implements Cacheable
{
    use HasCaching;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        $endpoint = trim(config('flatfox.endpoint', 'https://flatfox.ch'), '/');

        return "$endpoint/api/v1/public-listing/?organization={$this->identifier}{$this->expand}";
    }

    public function __construct(
        protected string $identifier,
        protected string|null $expand = null,
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
            'timeout' => config('flatfox.caching', 15),
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
