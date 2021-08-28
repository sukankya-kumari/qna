<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

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
Route::get("/",[QuestionController::class,"home"])->name('home');
Route::match(['post','get'],"/insertQ",[QuestionController::class,"insertQ"])->name('insertQ');
// Route::match(['post','get'],"/create",[QuestionController::class,"create"])->name('insertQ');
Route::match(['post','get'],"/insert",[QuestionController::class,"insert"])->name('insert');
Route::get("/viewans/{id}",[QuestionController::class,"viewans"])->name('viewans');
Route::get("/vote/{id}",[QuestionController::class,"vote"])->name('vote');
Route::get("/unlike/{id}",[QuestionController::class,"unlike"]);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
