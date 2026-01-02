<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class AdminAuthApiController extends Controller
{
    // Hardcoded admin credentials (for API testing)
    private const ADMIN_EMAIL = 'admin@example.com';
    private const ADMIN_PASSWORD = 'admin123';
    private const TOKEN_EXPIRY = 1440; // 24 hours in minutes

    /**
     * Admin Login API
     * POST /api/admin/login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Check credentials
        if ($request->email === self::ADMIN_EMAIL && $request->password === self::ADMIN_PASSWORD) {
            // Generate API token
            $token = Str::random(60);
            
            // Store token in cache with expiry
            Cache::put("admin_token_{$token}", [
                'email' => $request->email,
                'created_at' => now()->toDateTimeString(),
            ], now()->addMinutes(self::TOKEN_EXPIRY));

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'token' => $token,
                'expires_in' => self::TOKEN_EXPIRY * 60, // in seconds
                'admin' => [
                    'email' => $request->email,
                ],
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials',
        ], 401);
    }

    /**
     * Admin Logout API
     * POST /api/admin/logout
     */
    public function logout(Request $request)
    {
        $token = $this->extractToken($request);
        
        if ($token) {
            Cache::forget("admin_token_{$token}");
        }

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully',
        ], 200);
    }

    /**
     * Verify token (used by middleware)
     */
    public static function verifyToken($token)
    {
        if (empty($token)) {
            return false;
        }
        
        $cacheKey = "admin_token_{$token}";
        return Cache::has($cacheKey);
    }

    /**
     * Get current admin info
     * GET /api/admin/me
     */
    public function me(Request $request)
    {
        $token = $this->extractToken($request);
        
        if ($token && Cache::has("admin_token_{$token}")) {
            $adminData = Cache::get("admin_token_{$token}");
            
            return response()->json([
                'success' => true,
                'admin' => [
                    'email' => $adminData['email'],
                ],
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unauthorized',
        ], 401);
    }

    /**
     * Extract token from request
     */
    private function extractToken(Request $request)
    {
        $token = $request->bearerToken() ?? $request->header('Authorization');
        
        if ($token) {
            return str_replace('Bearer ', '', $token);
        }
        
        return null;
    }
}

