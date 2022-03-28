<?php

use App\Models\Music;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;


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
    return view('music');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('music', MusicController::class); 


Route::get('/music/add', [MusicController::class, 'create']);
Route::post('/music/add', [MusicController::class, 'store']);

Route::get('/music/detail/{id}',[MusicController::class,'show']);


Route::get('/music/edit/{id}', [MusicController::class, 'edit']);
Route::post('/music/update/{id}', [MusicController::class, 'update']);

Route::get('/music/delete/{id}', [MusicController::class, 'destroy']);