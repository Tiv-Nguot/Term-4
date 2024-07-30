<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PromotionResource;
use App\Http\Resources\ShowPromotionResource;
use App\Models\Promotion;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotion = Promotion::list();
        $promotionList = PromotionResource::collection($promotion);
        return response()->json([
            'success'=>true,
            'data'=>$promotionList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $promotion = Promotion::store($request);
        if(!$promotion){
            return response()->json([
                'success'=>false,
                'message'=>"Can't create the promotion"
            ]);
        }
        return response()->json([
            'success'=>true,
            'message'=>"Promotion created successfully"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $promotion = promotion::find($id);

        if (!$promotion) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "promotion not found with ID " . $id
                ]
            );
        }
        $showPromotion = new ShowPromotionResource($promotion);
        return response()->json(
            [
                'success' => true,
                'data' => $showPromotion
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $promotion = Promotion::find($id);

        if (!$promotion) {
            return response()->json([
                'success' => false,
                'message' => "promotion not found with ID " . $id
            ]);
        }

        $promotionUpdate = $promotion->store($request, $id);

        return response()->json([
            'success' => true,
            'message' => "promotion updated successfully with ID " . $id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $promotion = Promotion::find($id);
        if (!$promotion) {
            return response()->json(
                [
                    'success' => false,
                    'message' => "promotion not found with ID " . $id
                ]
            );
        }
        $promotion->delete();
        return response()->json(
            [
                'success' => true,
                'message' => "Deleted a promotion successfully the ID " . $id,
            ]
        );
    }
}
