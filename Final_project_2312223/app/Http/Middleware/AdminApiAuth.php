<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Admin\AdminAuthApiController;
use Symfony\Component\HttpFoundation\Response;

class AdminApiAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Try multiple ways to get the token
        $token = $request->bearerToken();
        
        // If bearerToken() didn't work, try header directly
        if (!$token) {
            $authHeader = $request->header('Authorization');
            if ($authHeader) {
                // Remove "Bearer " prefix if present
                $token = str_replace('Bearer ', '', $authHeader);
            }
        }
        
        // Also check query parameter (for testing)
        if (!$token) {
            $token = $request->query('token');
        }
        
        if (!$token || empty(trim($token))) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication token required',
            ], 401);
        }

        // Clean the token (remove any whitespace)
        $token = trim($token);

        if (!AdminAuthApiController::verifyToken($token)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or expired token. Please login again to get a new token.',
            ], 401);
        }

        return $next($request);
    }
}

