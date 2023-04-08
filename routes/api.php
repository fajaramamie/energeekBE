<?php

use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\SkillsController;
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
Route::get('/skills', [SkillsController::class, 'index']);
Route::get('/jobs', [JobsController::class,'index']);
Route::post('/candidate',[CandidatesController::class,'create']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
