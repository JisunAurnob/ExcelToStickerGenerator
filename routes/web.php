<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelToPdfController;
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
    return redirect()->route('upload');
});

Route::get('/home/upload',[ExcelToPdfController::class,'home'])->name('upload');
Route::post('/home/upload',[ExcelToPdfController::class,'process'])->name('upload');
Route::get('/file/delete/{id}',[ExcelToPdfController::class,'deleteExcel'])->name('deleteFile');
Route::get('/file/preview/{id}',[ExcelToPdfController::class,'PreviewExcel'])->name('previewFile');