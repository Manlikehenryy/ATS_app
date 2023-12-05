<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVParserController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/get/applicants',[ApplicantController::class,'get_all_applicants']);
    Route::get('/get/applicant',[ApplicantController::class,'get_applicant']);  
    Route::get('/applicant/status',[ApplicantController::class,'update_status']);  
    Route::post('/job',[JobController::class,'create_job']);
    Route::get('/logout/user',[UserController::class,'logout']);
    // Route::get('/city',[CityController::class,'get_saved_cities']);
    // Route::delete('/city',[CityController::class,'delete_city']);
    // Route::get('/logout',[UserController::class,'logout']);
});

    Route::post('/access/applicant',[ApplicantController::class,'access']);
    Route::get('/job',[JobController::class,'get_all_jobs']);
    Route::get('/job/{id}',[JobController::class,'get_job']);
    Route::post('/register/user',[UserController::class,'register']);
    Route::post('/login/user',[UserController::class,'login']);
 