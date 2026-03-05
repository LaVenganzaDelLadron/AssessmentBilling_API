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


Route::prefix('customers')->group(function () {
    // Customer Routes
    Route::post('/add', [CustomerController::class, 'addCustomer'])->name('customers.add');
    Route::get('/all', [CustomerController::class, 'getAllCustomer'])->name('customers.get_all');
    Route::put('/edit/{customer_id}', [CustomerController::class, 'editCustomer'])->name('customers.edit');
    Route::delete('/delete/{customer_id}', [CustomerController::class, 'deleteCustomer'])->name('customers.delete');
});

Route::prefix('assessments')->group(function () {
    // Assessment Routes
    Route::post('/add', [AssessmentController::class, 'addAssessment'])->name('assessments.add');
    Route::get('/all', [AssessmentController::class, 'getAllAssessment'])->name('assessments.get_all');
    Route::put('/edit/{assessment_id}', [AssessmentController::class, 'editAssessment'])->name('assessments.edit');
    Route::delete('/delete/{assessment_id}', [AssessmentController::class, 'deleteAssessment'])->name('assessments.delete');
});

Route::prefix('assessment-items')->group(function () {
    // Assessment Items Routes
    Route::post('/add', [AssessmentItemsController::class, 'addAssessmentItem'])->name('assessment_items.add');
    Route::get('/all', [AssessmentItemsController::class, 'getAllAssessmentItems'])->name('assessment_items.get_all');
    Route::put('/edit/{id}', [AssessmentItemsController::class, 'editAssessmentItem'])->name('assessment_items.edit');
    Route::delete('/delete/{id}', [AssessmentItemsController::class, 'deleteAssessmentItem'])->name('assessment_items.delete');
});



Route::prefix('billings')->group(function () {
    // Billing Routes
    Route::post('/add', [BillingController::class, 'addBilling'])->name('billings.add');
    Route::get('/all', [BillingController::class, 'getAllBilling'])->name('billings.get_all');
    Route::put('/edit/{billing_id}', [BillingController::class, 'editBilling'])->name('billings.edit');
    Route::delete('/delete/{billing_id}', [BillingController::class, 'deleteBilling'])->name('billings.delete');
});


Route::prefix('payments')->group(function () {
    // Payment Routes
    Route::post('/add', [PaymentController::class, 'addPayment'])->name('payments.add');
    Route::get('/all', [PaymentController::class, 'getAllPayments'])->name('payments.get_all');
    Route::put('/edit/{payment_id}', [PaymentController::class, 'editPayment'])->name('payments.edit');
    Route::delete('/delete/{payment_id}', [PaymentController::class, 'deletePayment'])->name('payments.delete');
});




