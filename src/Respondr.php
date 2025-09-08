<?php

namespace ogkarpf\respondr;

use Throwable;

class Respondr {

    /**
     * Return Success Response
     *
     * @param mixed $data
     * @param string|null $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data = null, $message = null, int $status = 200)
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
     *
     * @param array|string $errors
     * @param string|null $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error($errors = [], $message = null, int $status = 400)
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
