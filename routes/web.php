<?php

use App\Exports\ResultsExport;
use Illuminate\Support\Facades\Route;
use App\Layers\Presentation\Controllers\Colors\GetFilesController;
use App\Layers\Presentation\Controllers\Colors\CreateFilesController;

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


Route::get('/', [GetFilesController::class, 'index'])->name('index');
Route::get('/create', [CreateFilesController::class, 'create'])->name('create.file');
Route::post('/store', [CreateFilesController::class, 'store'])->name('store.file');
