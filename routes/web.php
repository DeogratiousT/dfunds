<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PayamController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\BeneficiaryImportController;
use App\Http\Controllers\Dashboard\DashboardController;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);

    Route::resource('states', StateController::class);
    Route::resource('counties', CountyController::class);
    Route::resource('payams', PayamController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('beneficiaries', BeneficiaryController::class);

    Route::post('beneficiaries-import', [BeneficiaryImportController::class, 'importXlsx'])->name('beneficiaries.import');
});
