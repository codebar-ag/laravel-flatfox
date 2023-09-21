<?php

namespace CodebarAg\FlatFox\Tests\Feature;

use CodebarAg\Flatfox\Requests\GetPublicListing;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('get public listing', function () {

    $mockClient = new MockClient([
        GetPublicListing::class => MockResponse::fixture('get-public-listing-request'),
    ]);

    $request = new GetPublicListing(142, '&expand=documents&expand=images');
    $request->withMockClient($mockClient);

    $response = $request->send();

    $mockClient->assertSent(GetPublicListing::class);

    expect($response->status())->toBe(200)
        ->and($response->dto())->not()->toBeEmpty();
})
    ->group('get', 'public-listing');
