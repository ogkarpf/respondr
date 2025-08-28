<?php

namespace ogkarpf\respondr\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ogkarpf\respondr\Respondr
 */
class Respondr extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ogkarpf\respondr\Respondr::class;
    }
}
