<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Assessment;



class AssessmentController extends Controller
{
    public function adAssessment(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'customer_id' => 'required|integer|exists:customer,id',
            'total_amount' => 'nullable|string',
            'status' => 'nullable|string|in:pending,completed,cancelled',
            'assessment_date' => 'nullable|date',
        ]);

        $assessment = Assessment::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'Assessment added successfully',
            'data' => $assessment
        ]);
    }

    public function getAllAssessment(Request $request): JsonResponse
    {
        $assessments = Assessment::all();
        return response()->json([
            'success' => true,
            'message' => 'Assessments retrieved successfully',
            'data' => $assessments
        ]);
    }

    public function editAssessment(Request $request, $id): JsonResponse
    {
        $assessment = Assessment::find($id);
        if (!$assessment) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment not found'
            ], 404);
        }

        $validated = $request->validate([
            'customer_id' => 'nullable|integer|exists:customer,id',
            'total_amount' => 'nullable|string',
            'status' => 'nullable|string|in:pending,completed,cancelled',
            'assessment_date' => 'nullable|date',
        ]);

        $assessment->update($validated);
        return response()->json([
            'success' => true,
            'message' => 'Assessment updated successfully',
            'data' => $assessment
        ]);
    }

    public function deleteAssessment($id): JsonResponse
    {
        $assessment = Assessment::find($id);
        if (!$assessment) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment not found'
            ], 404);
        }

        $assessment->delete();
        return response()->json([
            'success' => true,
            'message' => 'Assessment deleted successfully'
        ]);
    }

}
