<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Payments;


class PaymentController extends Controller
{
    public function addPayment(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'billing_id' => 'required|string|exists:billing,billing_id',
            'amount_paid' => 'required|numeric|min:0',
            'paid_at' => 'required|date',
        ]);

        $payment = Payments::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Payment record added successfully.',
            'data' => $payment,
        ], 201);
    }

    public function getAllPayments(): JsonResponse
    {
        $payments = Payments::all();

        return response()->json([
            'success' => true,
            'message' => 'Payment records retrieved successfully.',
            'data' => $payments,
        ], 200);
    }


    public function editPayment(Request $request, string $payment_id): JsonResponse
    {
        $validated = $request->validate([
            'billing_id' => 'sometimes|required|string|exists:billing,billing_id',
            'amount_paid' => 'sometimes|required|numeric|min:0',
            'paid_at' => 'sometimes|required|date',
        ]);

        $payment = Payments::find($payment_id);

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment record not found.',
            ], 404);
        }

        $payment->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Payment record updated successfully.',
            'data' => $payment,
        ], 200);
    }

    public function deletePayment(string $payment_id): JsonResponse
    {
        $payment = Payments::find($payment_id);

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment record not found.',
            ], 404);
        }

        $payment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Payment record deleted successfully.',
        ], 200);
    }

}
