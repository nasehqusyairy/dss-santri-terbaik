<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubCriteriaController;
use App\Http\Controllers\SawController;
use App\Http\Controllers\TopsisController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('/groups', GroupController::class);
Route::get('/groups/{group}/delete', [GroupController::class, 'destroy']);

Route::resource('/criterias', CriteriaController::class);
Route::get('/criterias/{criteria}/delete', [CriteriaController::class, 'destroy']);

Route::resource('/subcriterias', SubCriteriaController::class);
Route::get('/subcriterias/{subcriteria}/delete', [SubCriteriaController::class, 'destroy']);

Route::resource('/students', StudentController::class);
Route::get('/students/{student}/delete', [StudentController::class, 'destroy']);

Route::get('/students/{student}/assessment/', [StudentController::class, 'assessment']);

Route::resource('/assessments', AssessmentController::class);
Route::get('/assessments/{student}/delete', [AssessmentController::class, 'destroy']);

Route::get('/values', [AssessmentController::class, 'values']);

Route::prefix('/saw')->group(function () {
    Route::get('/matrixes/decision', [SawController::class, 'decision']);
    Route::get('/matrixes/normalization', [SawController::class, 'normalization']);
    Route::get('/matrixes/optimization', [SawController::class, 'optimization']);
    Route::get('/', [SawController::class, 'home']);
});

Route::prefix('/topsis')->group(function () {
    Route::get('/matrixes/normalization', [TopsisController::class, 'normalization']);
    Route::get('/matrixes/weightrating', [TopsisController::class, 'weightrating']);
    Route::get('/', [TopsisController::class, 'home']);
});
