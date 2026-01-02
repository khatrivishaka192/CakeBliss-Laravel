<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cake;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCakeApiController extends Controller
{
    /**
     * List all cakes
     * GET /api/admin/cakes
     */
    public function index()
    {
        $cakes = Cake::with('category')->get();
        
        return response()->json([
            'success' => true,
            'data' => $cakes,
            'count' => $cakes->count(),
        ], 200);
    }

    /**
     * Show single cake
     * GET /api/admin/cakes/{id}
     */
    public function show($id)
    {
        $cake = Cake::with('category')->find($id);
        
        if (!$cake) {
            return response()->json([
                'success' => false,
                'message' => 'Cake not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $cake,
        ], 200);
    }

    /**
     * Create new cake
     * POST /api/admin/cakes
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'required|string|min:10',
            'ingredients' => 'required|string|min:5',
        ]);

        // Upload image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('cakes', 'public');
            $data['image'] = $path;
        }

        $cake = Cake::create($data);
        $cake->load('category');

        return response()->json([
            'success' => true,
            'message' => 'Cake created successfully',
            'data' => $cake,
        ], 201);
    }

    /**
     * Update cake
     * PUT /api/admin/cakes/{id}
     */
    public function update(Request $request, $id)
    {
        $cake = Cake::find($id);
        
        if (!$cake) {
            return response()->json([
                'success' => false,
                'message' => 'Cake not found',
            ], 404);
        }

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'category_id' => 'sometimes|required|integer|exists:categories,id',
            'price' => 'sometimes|required|numeric|min:1',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'sometimes|required|string|min:10',
            'ingredients' => 'sometimes|required|string|min:5',
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($cake->image && Storage::disk('public')->exists($cake->image)) {
                Storage::disk('public')->delete($cake->image);
            }
            $path = $request->file('image')->store('cakes', 'public');
            $data['image'] = $path;
        }

        $cake->update($data);
        $cake->load('category');

        return response()->json([
            'success' => true,
            'message' => 'Cake updated successfully',
            'data' => $cake,
        ], 200);
    }

    /**
     * Delete cake
     * DELETE /api/admin/cakes/{id}
     */
    public function destroy($id)
    {
        $cake = Cake::find($id);
        
        if (!$cake) {
            return response()->json([
                'success' => false,
                'message' => 'Cake not found',
            ], 404);
        }

        // Delete image if exists
        if ($cake->image && Storage::disk('public')->exists($cake->image)) {
            Storage::disk('public')->delete($cake->image);
        }

        $cake->delete();

        return response()->json([
            'success' => true,
            'message' => 'Cake deleted successfully',
        ], 200);
    }
}

