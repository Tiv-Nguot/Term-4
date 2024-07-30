<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListCategory;
use App\Http\Resources\ShowCategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::list();
        $category = ListCategory::collection($category);
        return response()->json(
            [
                'success' => true,
                'data' => $category
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::createOrUpdate($request);
        return response()->json(
            [
                'success' => true,
                'message' => "Create a category successfully"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Category not found with ID " . $id
                ]
            );
        }
        $category = new ShowCategoryResource($category);
        return response()->json(
            [
                'success' => true,
                'data' => $category
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $category = Category::find($id);

    if(!$category) {
        return response()->json([
            'success' => false,
            'message' => "Category not found with ID " . $id
        ]);
    }

    $category->createOrUpdate($request,$id);
    $category = new ShowCategoryResource($category);

    return response()->json([
        'success' => true,
        'message' => "Category updated successfully with ID " . $id,
        'data' => $category
    ]);
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "Category not found with ID " . $id
                ]
            );
        }
        $category->delete();
        return response()->json(
            [
                'success' => true,
                'message' => "Delete a category successfully the ID " . $id,
            ]
        );
    }
}
