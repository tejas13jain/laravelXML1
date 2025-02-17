<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/create', [ContactController::class, 'create'])->name('create');
Route::get('/import', [ContactController::class, 'import'])->name('import');

Route::get('/', [ContactController::class, 'welcome'])->name('welcome');
Route::get('/destroy/{id}', [ContactController::class, 'destroy'])->name('destroy');
Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('edit');

Route::post('importXML', [ContactController::class, 'importXML'])->name('importXML');
Route::post('update/{id}', [ContactController::class, 'update'])->name('update');
