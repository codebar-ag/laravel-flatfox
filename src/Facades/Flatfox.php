<?php

namespace CodebarAg\Flatfox\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CodebarAg\Flatfox\Flatfox
 *
 */
class Flatfox extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \CodebarAg\Flatfox\Flatfox::class;
    }
}
