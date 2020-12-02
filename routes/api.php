<?php

use App\Http\Controllers\API\DepartmentsController;
use App\Http\Controllers\API\DepartmentsManagersController;
use App\Http\Controllers\API\DepartmentsUsersController;
use App\Http\Controllers\API\UsersVacationsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\UsersController;
use \App\Http\Controllers\API\SkillsController;
use \App\Http\Controllers\API\UsersSkillsController;

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

Route::apiResource('users', UsersController::class);
Route::apiResource('skills', SkillsController::class);
Route::apiResource('users.skills', UsersSkillsController::class, ['only' => ['index', 'store']]);
Route::apiResource('users.vacations', UsersVacationsController::class);
Route::apiResource('departments', DepartmentsController::class);
Route::apiResource('departments.users', DepartmentsUsersController::class, ['only' => ['update', 'destroy']]);
Route::apiResource('departments.managers', DepartmentsManagersController::class, ['only' => ['update', 'destroy']]);
