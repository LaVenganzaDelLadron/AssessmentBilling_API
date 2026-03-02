<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Customer;


class CustomerController extends Controller
{
    
    public function addCustomer(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
        ]);

        $customer = Customer::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'Customer added successfully',
            'customer' => $customer,
        ], 201);
    
    }


    public function getAllCustomer(): JsonResponse
    {
        $customers = Customer::all();
        return response()->json([
            'success' => true,
            'message' => 'Customers retrieved successfully',
            'customers' => $customers,
        ], 200);
    }

    public function editCustomer(Request $request, string $customer_id): JsonResponse
    {
        

        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
        ]);

        $customer = Customer::find($customer_id);

        if (!$customer) {
            return response()->json([
                'success' => false,
                'message' => 'Customer not found',
            ], 404);
        }

        $customer->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Customer updated successfully',
            'customer' => $customer,
        ], 200);
    }

    public function deleteCustomer(Request $request, string $customer_id): JsonResponse
    {
        $customer = Customer::find($customer_id);

        if (!$customer) {
            return response()->json([
                'success' => false,
                'message' => 'Customer not found',
            ], 404);
        }

        $customer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Customer deleted successfully',
        ], 200);
    }

}
