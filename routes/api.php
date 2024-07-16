<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/Logout', [AuthController::class, 'Logout']);
});

Route::middleware(['auth:sanctum', 'Admin'])->group(function () {
    Route::post('/RegisterAdmin', [AuthController::class, 'RegisterAdmin']);
    Route::post('/AddProperty', [PropertyController::class, 'AddProperty']);
    Route::put('/EditProperty/{id}', [PropertyController::class, 'EditProperty']);
    Route::delete('/DeleteProperty/{id}', [PropertyController::class, 'DeleteProperty']);
    Route::delete('/DeleteReview/{id}', [ReviewController::class, 'DeleteReview']);
    Route::get('/showSpecificPropertyInquiries/{propertyID}', [ReviewController::class, 'showSpecificPropertyInquiries']);
    Route::get('/showSpecificUserInquiries/{user}', [ReviewController::class, 'showSpecificUserInquiries']);

});

Route::middleware(['auth:sanctum', 'Agent'])->group(function () {
    // Route::post('/RegisterAgent',[UserController::class, 'RegisterAgent']);
    Route::post('/AddProperty', [PropertyController::class, 'AddProperty']);
    Route::delete('/DeleteProperty/{id}', [PropertyController::class, 'DeleteProperty']);
    Route::put('/EditProperty/{id}', [PropertyController::class, 'EditProperty']);
    Route::get('/showSpecificPropertyInquiries/{propertyID}', [ReviewController::class, 'showSpecificPropertyInquiries']);
    Route::get('/showSpecificUserInquiries/{user}', [ReviewController::class, 'showSpecificUserInquiries']);
});

Route::post('/Register', [AuthController::class, 'Register']);
Route::post('/Login', [AuthController::class, 'Login']);
Route::get('/displayProperties', [PropertyController::class, 'displayProperties']);
Route::get('/showSpecificPropertyReviews/{propertyID}', [ReviewController::class, 'showSpecificPropertyReviews']);
Route::get('/showSpecificUserReviews/{user}', [ReviewController::class, 'showSpecificUserReviews']);
Route::get('/displaySpecificTypeOfProperties/{type}', [PropertyController::class, 'displaySpecificTypeOfProperties']);
Route::post('/createInquiry', [InquiryController::class, 'createInquiry']);
Route::post('/sendReview', [ReviewController::class, 'sendReview']);
