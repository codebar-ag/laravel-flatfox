<?php

namespace CodebarAg\FlatFox\Tests\Feature;

use CodebarAg\Flatfox\FlatfoxConnector;
use CodebarAg\Flatfox\Requests\GetPublicListing;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

it('develop', function () {
    $forge = new FlatfoxConnector();
    $request = new GetPublicListing(142, '&expand=documents&expand=images');
    $response = $forge->send($request);
})
    ->group('get', 'public-listing')
    ->skip();

it('get public listing', function () {
    $mockClient = new MockClient([
        GetPublicListing::class => MockResponse::fixture('singleServer'),
    ]);
})
    ->group('get', 'public-listing')->skip();
