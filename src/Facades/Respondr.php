<?php

namespace ogkarpf\respondr\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ogkarpf\respondr\Respondr
 * @method static \Illuminate\Http\JsonResponse success(mixed $data = null, string|null $message = null, int $status = 200)
 * @method static \Illuminate\Http\JsonResponse error(array|string $errors = [], string|null $message = null, int $status = 400)
 */
class Respondr extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ogkarpf\respondr\Respondr::class;
    }
}
