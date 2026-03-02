<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Billings;

class BillingController extends Controller
{
    public function addBilling(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'customer_id' => 'required|string|exists:customer,customer_id',
            'assessment_id' => 'required|string|exists:assessment,assessment_id',
            'amount_due' => 'required|numeric|min:0',
            'due_date' => 'required|date',
            'status' => 'nullable|string|in:pending,paid,overdue',
            'payment_date' => 'nullable|date',
        ]);

        $billings = Billings::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Billing record added successfully.',
            'data' => $billings,
        ], 201);
    }

    public function getAllBilling(): JsonResponse
    {
        $billings = Billings::all();

        return response()->json([
            'success' => true,
            'message' => 'Billing records retrieved successfully.',
            'data' => $billings,
        ], 200);
    }

    public function editBilling(Request $request, string $billing_id): JsonResponse
    {
        $validated = $request->validate([
            'customer_id' => 'sometimes|required|string|exists:customer,customer_id',
            'assessment_id' => 'sometimes|required|string|exists:assessment,assessment_id',
            'amount_due' => 'sometimes|required|numeric|min:0',
            'due_date' => 'sometimes|required|date',
            'status' => 'sometimes|nullable|string|in:pending,paid,overdue',
            'payment_date' => 'sometimes|nullable|date',
        ]);

        $billing = Billings::find($billing_id);

        if (!$billing) {
            return response()->json([
                'success' => false,
                'message' => 'Billing record not found.',
            ], 404);
        }

        $billing->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Billing record updated successfully.',
            'data' => $billing,
        ], 200);
    }

    public function deleteBilling(int $billing_id): JsonResponse
    {
        $billing = Billings::find($billing_id);

        if (!$billing) {
            return response()->json([
                'success' => false,
                'message' => 'Billing record not found.',
            ], 404);
        }

        $billing->delete();

        return response()->json([
            'success' => true,
            'message' => 'Billing record deleted successfully.',
        ], 200);
    }

}
