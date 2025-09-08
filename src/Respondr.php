<?php

namespace ogkarpf\respondr;

use Illuminate\Http\JsonResponse;
use Throwable;

class Respondr {

    /**
     * Return Success Response
     *
     * @param mixed $data
     * @param string|null $message
     * @param int $status
     * @return JsonResponse
     */
    public static function success($data = null, $message = null, int $status = 200): JsonResponse
    {
        return response()->json(
            [
            config('respondr.format.status_key', 'status') => 'success',
            config('respondr.format.data_key', 'data') => $data,
            config('respondr.format.message_key', 'message') => $message,
            config('respondr.format.errors_key', 'errors') => [],
            ], 
            $status
        );
    }

    /**
     * Return Error Response
     * The Errors can be an array of strings, an array of Throwables or both.
     *
     * @param array $errors
     * @param string|null $message
     * @param int $status
     * @return JsonResponse
     */
    public static function error($errors = [], $message = null, int $status = 400): JsonResponse
    {
        foreach ($errors as $key => $error) {
            if ($error instanceof Throwable) {
                $errors[$key] = $error->getMessage();
            }
        }

        return response()->json(
            [
            config('respondr.format.status_key', 'status') => 'error',
            config('respondr.format.data_key', 'data') => null,
            config('respondr.format.message_key', 'message') => $message,
            config('respondr.format.errors_key', 'errors') => (array) $errors,
            ], 
            $status
        );
    }
}
