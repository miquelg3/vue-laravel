<?php

use App\Models\Post;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Get de axios que ve de boto.vue i va a HomeController

Route::get('/listar_posts', [App\Http\Controllers\HomeController::class, 'listar_posts'])->name('listar_posts');

// Post de axios que ve de boto.vue i va a HomeController

Route::post('/crear_nueva', [App\Http\Controllers\HomeController::class, 'store'])->name('crear_nueva');

// Put de axios que ve de boto.vue i va a HomeController amb el nom indicat, en este cas update. També tiguem una variable que es idPost

Route::put('/editar_post/{idPost}', [App\Http\Controllers\HomeController::class, 'update'])->name('editar_post');

// Delete de axios que ve de boto.vue i va a homecontroller

Route::delete('/eliminar_post/{idPost}', [App\Http\Controllers\HomeController::class, 'delete'])->name('eliminar_post');