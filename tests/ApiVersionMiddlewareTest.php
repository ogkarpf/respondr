<?php

use Illuminate\Http\Request;
use ogkarpf\respondr\Middleware\AppendApiVersion;
use Illuminate\Http\JsonResponse;

it('appends api version when enabled', function () {
    config()->set('respondr.version_middleware.enabled', true);
    config()->set('respondr.version_middleware.version', '2.1.0');
    config()->set('respondr.version_middleware.key', 'api_version');

    $middleware = new AppendApiVersion();

    $request = Request::create('/test', 'GET');
    $next = fn() => new JsonResponse(['foo' => 'bar']);

    $response = $middleware->handle($request, $next);
    $data = $response->getData(true);

    expect($data['api_version'])->toBe('2.1.0');
});

it('does not append api version when disabled', function () {
    config()->set('respondr.version_middleware.enabled', false);

    $middleware = new AppendApiVersion();

    $request = Request::create('/test', 'GET');
    $next = fn() => new JsonResponse(['foo' => 'bar']);

    $response = $middleware->handle($request, $next);
    $data = $response->getData(true);

    expect($data)->not->toHaveKey('api_version');
});