<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryApiController extends Controller
{
    /**
     * List all categories
     * GET /api/admin/categories
     */
    public function index()
    {
        $categories = Category::withCount('cakes')->get();
        
        return response()->json([
            'success' => true,
            'data' => $categories,
            'count' => $categories->count(),
        ], 200);
    }

    /**
     * Show single category
     * GET /api/admin/categories/{id}
     */
    public function show($id)
    {
        $category = Category::with('cakes')->find($id);
        
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $category,
        ], 200);
    }

    /**
     * Get cakes by category
     * GET /api/admin/categories/{id}/cakes
     */
    public function cakesByCategory($id)
    {
        $category = Category::find($id);
        
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        $cakes = $category->cakes;

        return response()->json([
            'success' => true,
            'category' => $category,
            'data' => $cakes,
            'count' => $cakes->count(),
        ], 200);
    }

    /**
     * Create new category
     * POST /api/admin/categories
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'data' => $category,
        ], 201);
    }

    /**
     * Update category
     * PUT /api/admin/categories/{id}
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255|unique:categories,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $category->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
            'data' => $category,
        ], 200);
    }

    /**
     * Delete category
     * DELETE /api/admin/categories/{id}
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
            ], 404);
        }

        // Check if category has cakes
        if ($category->cakes()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete category with existing cakes',
            ], 400);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully',
        ], 200);
    }
}

