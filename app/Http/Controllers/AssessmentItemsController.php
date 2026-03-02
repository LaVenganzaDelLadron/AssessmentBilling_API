<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\AssessmentItems;

class AssessmentItemsController extends Controller
{
    public function addAssessmentItem(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'assessment_id' => 'required|string|exists:assessment,assessment_id',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'amount'=> 'required|numeric|min:0',
        ]);

        $validatedData['amount'] = $validatedData['quantity'] * $validatedData['unit_price'];
        $validatedData['created_at'] = now();

        $assessmentItem = AssessmentItems::create($validatedData);

        return response()->json([
            'message' => 'Assessment item added successfully.',
            'data' => $assessmentItem,
        ], 201);
    }

    public function getAllAssessmentItems(): JsonResponse
    {
        $assessmentItems = AssessmentItems::all();

        return response()->json([
            'success' => true,
            'message' => 'Assessment items retrieved successfully.',
            'data' => $assessmentItems,
        ], 200);
    }

    public function editAssessmentItem(Request $request, $id): JsonResponse
    {

        $validatedData = $request->validate([
            'description' => 'sometimes|required|string',
            'quantity' => 'sometimes|required|integer|min:1',
            'unit_price' => 'sometimes|required|numeric|min:0',
        ]);

        $assessmentItem = AssessmentItems::find($id);

        if (!$assessmentItem) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment item not found.',
            ], 404);
        }

        if (isset($validatedData['quantity']) && isset($validatedData['unit_price'])) {
            $validatedData['amount'] = $validatedData['quantity'] * $validatedData['unit_price'];
        }

        $assessmentItem->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Assessment item updated successfully.',
            'data' => $assessmentItem,
        ], 200);
    }

    public function deleteAssessmentItem(Request $request, $id): JsonResponse
    {
        $assessmentItem = AssessmentItems::find($id);

        if (!$assessmentItem) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment item not found.',
            ], 404);
        }

        $assessmentItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Assessment item deleted successfully.',
        ], 200);
    }


}
