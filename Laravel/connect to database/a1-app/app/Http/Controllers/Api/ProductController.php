<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ListProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getProducts = Product::list();
        $productResource = ListProductResource::collection($getProducts);
        return response()->json(['success'=>true,'data'=>$productResource]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::createOrUpdate($request);
        return response()->json(
            [
                'success' => true,
                'message' => "Create a product successfully"
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "product not found with ID " . $id
                ]
            );
        }
        $product = new ListProductResource($product);
        return response()->json(
            [
                'success' => true,
                'data' => $product
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => "product not found with ID " . $id
            ]);
        }

        $productUpdate = $product->createOrUpdate($request, $id);
        $productList = new ListProductResource($productUpdate);


        return response()->json([
            'success' => true,
            'message' => "product updated successfully with ID " . $id,
            'data' => $productList
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "product not found with ID " . $id
                ]
            );
        }
        $product->delete();
        return response()->json(
            [
                'success' => true,
                'message' => "Delete a product successfully the ID " . $id,
            ]
        );
    }
}