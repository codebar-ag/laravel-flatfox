<?php

namespace CodebarAg\FlatFox\Tests\Feature;

use CodebarAg\Flatfox\Requests\GetPublicListing;

it('get public listing', function () {
    $request = new GetPublicListing(142, '&expand=documents&expand=images');
    $response = $request->send();
    expect($response->status())->toBe(200);

    ray($response->dto()->results->first());
})
    ->group('get', 'public-listing');
