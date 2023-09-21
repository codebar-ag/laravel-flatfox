<?php

namespace CodebarAg\Flatfox\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CodebarAg\Flatfox\Zendesk
 */
class Flatfox extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \CodebarAg\Flatfox\Zendesk::class;
    }
}
