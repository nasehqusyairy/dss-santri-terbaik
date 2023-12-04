<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubCriteriaController;
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
    return view('welcome');
});

Route::resource('/groups', GroupController::class);
Route::get('/groups/{group}/delete', [GroupController::class, 'destroy']);

Route::resource('/criterias', CriteriaController::class);
Route::get('/criterias/{criteria}/delete', [CriteriaController::class, 'destroy']);

Route::resource('/subcriterias', SubCriteriaController::class);
Route::get('/subcriterias/{subCriteria}/delete', [SubCriteriaController::class, 'destroy']);

Route::resource('/students', StudentController::class);
Route::get('/students/{student}/delete', [StudentController::class, 'destroy']);

Route::get('/students/{student}/assessment/{criteria}', [StudentController::class, 'assessment']);

Route::resource('/assessments', AssessmentController::class);
Route::get('/assessments/{assessment}/delete', [AssessmentController::class, 'destroy']);
