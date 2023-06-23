<?php

use App\Http\Controllers\JobController;
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
    return redirect(url('/jobs/create'));
});

Route::group(['prefix' => 'jobs'], function(){
    Route::get('all-jobs', [JobController::class, 'index']);
    Route::get('create', [JobController::class, 'create']);
    Route::get('view/{job}', [JobController::class, 'view']);

    Route::post('', [JobController::class, 'store']);
    Route::get('get/{job}', [JobController::class, 'get']);
    Route::get('all', [JobController::class, 'all']);

});

