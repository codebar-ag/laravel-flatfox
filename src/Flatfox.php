<?php

namespace CodebarAg\Flatfox;

use CodebarAg\Flatfox\Requests\GetPublicListing;

class Flatfox
{
    public function getPublicListing(string $identifier, string $expand): GetPublicListing
    {
        return new GetPublicListing($identifier, $expand);
    }
}
