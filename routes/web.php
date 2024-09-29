<?php

use App\Http\Controllers\Documents;
use App\Http\Controllers\DataCenterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\User;
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



Route::get('/', [User::class, 'index'])->middleware(['auth', 'verified'])->name('main');

Route::middleware('auth')->group(function () {

    Route::get('/change_theme', [User::class, 'change_theme'])->name('change_theme');


    Route::get('/students',             [StudentController::class, 'students'])->name('students');


    // --------------------- Transaction Controller -----------------------------------


    Route::get('/requests',             [TransactionController::class, 'requests'])->name('requests');
    Route::get('/get_requests/{id}',     [TransactionController::class, 'get_requests'])->name('get_requests');


    Route::post('/store_transaction',     [TransactionController::class, 'store_transaction'])->name('store_transaction');
    Route::post('/store_request',         [TransactionController::class, 'store_request'])->name('store_request');


    // --------------------- Data Center Controller -----------------------------------

    Route::get('/get_cabinets',         [DataCenterController::class, 'get_cabinets'])->name('get_cabinets');
    Route::get('/get_folders',             [DataCenterController::class, 'get_folders'])->name('get_folders');
    Route::get('/get_folder_student/{id}',     [DataCenterController::class, 'get_folder_student'])->name('get_folder_student');



    Route::post('/add_student_to_folder',    [DataCenterController::class, 'add_student_to_folder'])->name('add_student_to_folder');
    Route::get('/open_folder/{id}',         [DataCenterController::class, 'open_folder'])->name('open_folder');



    Route::get('/get_specific_cabinet/{id}', [DataCenterController::class, 'get_specific_cabinet'])->name('get_specific_cabinet');
    Route::get('/get_specific_folder/{id}', [DataCenterController::class, 'get_specific_folder'])->name('get_specific_folder');



    Route::post('/create_cabinet',         [DataCenterController::class, 'create_cabinet'])->name('create_cabinet');
    Route::post('/create_folder',         [DataCenterController::class, 'create_folder'])->name('create_folder');

    // --------------------- End Data Center Controller -----------------------------------

    Route::get('/get_documents',         [Documents::class, 'get_documents'])->name('get_documents');
});

require __DIR__ . '/auth.php';
