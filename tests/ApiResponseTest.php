<?php

use ogkarpf\respondr\Facades\Respondr;

it('returns a success response with expected structure', function () {
    $response = Respondr::success(['foo' => 'bar'], 'All good', 200);
    $data = $response->getData(true);

    expect($data['status'])->toBe('success')
        ->and($data['data'])->toBe(['foo' => 'bar'])
        ->and($data['message'])->toBe('All good')
        ->and($data['errors'])->toBe([])
        ->and($response->getStatusCode())->toBe(200);
});

it('returns an error response with expected structure', function () {
    $response = Respondr::error(['invalid_field'], 'Something went wrong', 422);
    $data = $response->getData(true);

    expect($data['status'])->toBe('error')
        ->and($data['data'])->toBeNull()
        ->and($data['message'])->toBe('Something went wrong')
        ->and($data['errors'])->toBe(['invalid_field'])
        ->and($response->getStatusCode())->toBe(422);
});
