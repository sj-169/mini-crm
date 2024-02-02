<?php

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

Route::get('getCompanyById/{id}',[\App\Http\Controllers\Api\CompanyController::class,'getCompanyById']);
Route::post('addCompany',[\App\Http\Controllers\Api\CompanyController::class,'addCompany']);
Route::get('getEmployeesByCompany/{id}',[\App\Http\Controllers\Api\EmployeeController::class,'getEmployeesByCompany']);
Route::post('addEmployee',[\App\Http\Controllers\Api\EmployeeController::class,'addEmployee']);
