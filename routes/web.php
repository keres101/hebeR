<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use GuzzleHttp\Psr7\Response;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Inertia\Inertia;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        // 'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get(
        '/employee',
        [EmployeeController::class, 'list']
    )->name('employee');

    Route::get(
        '/employee/create',
        [EmployeeController::class, 'show']
    );

    Route::post(
        '/employee/save',
        [EmployeeController::class, 'save']
    )->name('employee.save');

    Route::get(
        '/employee/delete/{id}',
        [EmployeeController::class, 'delete']
    );

    // roles

    Route::get('/roles', [RoleController::class, 'show'])->name('roles');

    Route::get('/roles/create', [RoleController::class, 'create']);

    Route::post('/roles/save', [RoleController::class, 'save'])->name('roles.save');

    Route::get('/roles/delete/{id}', [RoleController::class, 'delete']);
});
