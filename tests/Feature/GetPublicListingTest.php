<?php

namespace CodebarAg\FlatFox\Tests\Feature;

use CodebarAg\Flatfox\Requests\GetPublicListing;

it('get public listing', function () {
    $request = new GetPublicListing(142, '&expand=documents&expand=images');
    $response = $request->send();
    expect($response->status())->toBe(200)
        ->and($response->dto())->not()->toBeEmpty();
})
    ->group('get', 'public-listing');
