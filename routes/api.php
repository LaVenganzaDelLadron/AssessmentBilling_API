<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AssessmentItemsController ;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PaymentController;
use App\Models\AssessmentItems;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('customers')->controller(CustomerController::class)->group(function () {
    // Customer Routes
    Route::post('/add', 'addCustomer')->name('customers.add');
    Route::get('/all', 'getAllCustomer')->name('customers.get_all');
    Route::put('/edit/{customer_id}', 'editCustomer')->name('customers.edit');
    Route::delete('/delete/{customer_id}', 'deleteCustomer')->name('customers.delete');
});

Route::prefix('assessments')->controller(AssessmentController::class)->group(function () {
    // Assessment Routes
    Route::post('/add', 'addAssessment')->name('assessments.add');
    Route::get('/all', 'getAllAssessment')->name('assessments.get_all');
    Route::put('/edit/{assessment_id}',  'editAssessment')->name('assessments.edit');
    Route::delete('/delete/{assessment_id}', 'deleteAssessment')->name('assessments.delete');
});

Route::prefix('assessment-items')->controller(AssessmentItemsController::class)->group(function () {
    // Assessment Items Routes
    Route::post('/add', 'addAssessmentItem')->name('assessment_items.add');
    Route::get('/all', 'getAllAssessmentItems')->name('assessment_items.get_all');
    Route::put('/edit/{id}', 'editAssessmentItem')->name('assessment_items.edit');
    Route::delete('/delete/{id}', 'deleteAssessmentItem')->name('assessment_items.delete');
});



Route::prefix('billings')->controller(BillingController::class)->group(function () {
    // Billing Routes
    Route::post('/add', 'addBilling')->name('billings.add');
    Route::get('/all', 'getAllBilling')->name('billings.get_all');
    Route::put('/edit/{billing_id}',  'editBilling')->name('billings.edit');
    Route::delete('/delete/{billing_id}', 'deleteBilling')->name('billings.delete');
});


Route::prefix('payments')->controller(PaymentController::class)->group(function () {
    // Payment Routes
    Route::post('/add', 'addPayment')->name('payments.add');
    Route::get('/all',  'getAllPayments')->name('payments.get_all');
    Route::put('/edit/{payment_id}', 'editPayment')->name('payments.edit');
    Route::delete('/delete/{payment_id}', 'deletePayment')->name('payments.delete');
});




