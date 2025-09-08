<?php

namespace ogkarpf\respondr\Middleware;

use Closure;

class AppendApiVersion
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $config = config('respondr.version_middleware');
        if (!($config['enabled'] ?? false)) {
            return $response;
        }

        if (method_exists($response, 'getData')) {
            $data = $response->getData(true);
            $data[$config['key'] ?? 'api_version'] = $config['version'] ?? '1.0.0';
            $response->setData($data);
        }

        return $response;
    }
}