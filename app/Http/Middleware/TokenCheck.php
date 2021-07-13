<?php

namespace App\Http\Middleware;

use App\Pendonor;
use Closure;

class TokenCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            // get token from request header
            $token = $request->header('api-token');
            // get role from request header
            $role = $request->header('role');
            if ($role == 'pendonor') {
                $pendonor = Pendonor::where('api_token', $token)->first();
                if ($pendonor) {
                    return $next($request);
                } else {
                    return response()->json([
                        'status'    => 'failed',
                        'message'   => 'token mismatch, unauthorized!',
                        'data'      => []
                    ], 401);
                }
            } elseif ($role == 'user') {
                return $next($request);
            } else {
                return response()->json([
                    'status'    => 'error',
                    'message'   => 'role or token not found in the request header',
                    'data'      => []
                ], 500);
            }
        } catch (\Throwable $th) {
            // catch error
            return response()->json([
                'status'    => 'error',
                'message'   => $th->getMessage(),
                'data'      => []
            ], 500);
        }
    }
}
