<?php

namespace CodebarAg\Flatfox;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

class FlatfoxConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return 'https://flatfox.ch/api/v1';
    }

    protected function defaultAuth(): ?Authenticator
    {
        return new TokenAuthenticator(config('flatfox.token'));
    }
}
