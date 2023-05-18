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
use Saloon\Http\Request;

class GetPublicListing extends Request implements Cacheable
{
    use HasCaching;

    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/public-listing/?organization={$this->identifier}{$this->expand}";
    }

    public function __construct(
        protected string $identifier,
        protected string $expand,
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
            'timeout' => 15,
        ];
    }

    public function resolveCacheDriver(): Driver
    {
        return new LaravelCacheDriver(Cache::store('file'));
    }

    public function cacheExpiryInSeconds(): int
    {
        return 1;
    }
}
