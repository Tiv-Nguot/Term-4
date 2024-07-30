<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PromotionProductResource;
use App\Models\PromotionProduct;
use Illuminate\Http\Request;

class PromotionProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotionProduct = PromotionProduct::list();

        $promotionProduct = PromotionProductResource::collection($promotionProduct);

        return response()->json([
            'success'=>true,
            'data'=>$promotionProduct
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
