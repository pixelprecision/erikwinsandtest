<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

 
Route::post('/test', [JobController::class, 'index']);

// == Routes for Job CRUD
// Route::get('/jobs', [JobController::class, 'getAll']);
// Route::post('/jobs', [JobController::class, 'create']);
// Route::patch('/jobs/{id}', [JobController::class, 'update']);
// Route::delete('/jobs/{id}', [JobController::class, 'delete']);

