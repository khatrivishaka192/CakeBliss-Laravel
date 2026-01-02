<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cake;
use Illuminate\Http\Request;

// Ensure Cake model exists

class ApiCakeController extends Controller
{
    // List all cakes
    public function index()
    {
        $cakes = Cake::all();
        return response()->json($cakes);
    }

    // Show single cake
    public function show($id)
    {
        $cake = Cake::find($id);
        if (!$cake) {
            return response()->json(['message' => 'Cake not found'], 404);
        }
        return response()->json($cake);
    }

    }


