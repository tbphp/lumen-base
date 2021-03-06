<?php
/**
 * 全局返回处理
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Tymon\JWTAuth\Exceptions\JWTException;

class Result
{
    public function handle(Request $request, Closure $next)
    {
        /**
         * CORS跨域处理
         */
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Max-Age' => 2592000,
        ];
        if ($request->isMethod('OPTIONS')) {
            $serverHeaders = $request->header('Access-Control-Request-Headers');
            $serverMethods = $request->header('Access-Control-Request-Method');
            if ($serverHeaders) {
                $headers['Access-Control-Allow-Headers'] = $serverHeaders;
            }
            if ($serverMethods) {
                $headers['Access-Control-Allow-Methods'] = $serverMethods;
            }
            return response()->json('allow', 200, $headers);
        }

        /** @var Response $response */
        $response = $next($request);

        // 如果是下载文件，直接返回
        if ($response instanceof BinaryFileResponse) {
            return $response;
        }

        if ($response->exception) {
            $result = ['data' => $response->exception->getMessage()];

            if ($response->exception instanceof JWTException) {
                $result['code'] = 401;
            } elseif ($response->exception->getCode()) {
                $result['code'] = $response->exception->getCode();
            } else {
                $result['code'] = $response->getStatusCode();
            }

            if (env('APP_DEBUG')) {
                $result['file'] = $response->exception->getFile();
                $result['line'] = $response->exception->getLine();
            }
        } else {
            $result = [
                'code' => $response->getStatusCode(),
                'data' => $response->original,
            ];
        }

        return response()->json($result, 200, $headers);
    }
}
