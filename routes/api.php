<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AssessmentItemsController ;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PaymentController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Customer Routes
Route::post('/customers/add/', [CustomerController::class, 'addCustomer'])->name('customers.add');
Route::get('/customers/all/', [CustomerController::class, 'getAllCustomer'])->name('customers.get_all');
Route::put('/customers/edit/{customer_id}', [CustomerController::class, 'editCustomer'])->name('customers.edit');
Route::delete('/customers/delete/{customer_id}', [CustomerController::class, 'deleteCustomer'])->name('customers.delete');

// Assessment Routes
Route::post('/assessments/add/', [AssessmentController::class, 'addAssessment'])->name('assessments.add');
Route::get('/assessments/all/', [AssessmentController::class, 'getAllAssessment'])->name('assessments.get_all');
Route::put('/assessments/edit/{assessment_id}', [AssessmentController::class, 'editAssessment'])->name('assessments.edit');
Route::delete('/assessments/delete/{assessment_id}', [AssessmentController::class, 'deleteAssessment'])->name('assessments.delete');

// Assessment Items Routes
Route::post('/assessment-items/add/', [AssessmentItemsController::class, 'addAssessmentItem'])->name('assessment_items.add');
Route::get('/assessment-items/all/', [AssessmentItemsController::class, 'getAllAssessmentItems'])->name('assessment_items.get_all');
Route::put('/assessment-items/edit/{id}', [AssessmentItemsController::class, 'editAssessmentItem'])->name('assessment_items.edit');
Route::delete('/assessment-items/delete/{id}', [AssessmentItemsController::class, 'deleteAssessmentItem'])->name('assessment_items.delete');

// Billing Routes
Route::post('/billings/add/', [BillingController::class, 'addBilling'])->name('billings.add');
Route::get('/billings/all/', [BillingController::class, 'getAllBilling'])->name('billings.get_all');
Route::put('/billings/edit/{billing_id}', [BillingController::class, 'editBilling'])->name('billings.edit');
Route::delete('/billings/delete/{billing_id}', [BillingController::class, 'deleteBilling'])->name('billings.delete');

// Payment Routes
Route::post('/payments/add/', [PaymentController::class, 'addPayment'])->name('payments.add');
Route::get('/payments/all/', [PaymentController::class, 'getAllPayments'])->name('payments.get_all');
Route::put('/payments/edit/{payment_id}', [PaymentController::class, 'editPayment'])->name('payments.edit');
Route::delete('/payments/delete/{payment_id}', [PaymentController::class, 'deletePayment'])->name('payments.delete');





