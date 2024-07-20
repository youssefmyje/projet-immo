<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('welcome');

// Route pour la page de contact
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');
Route::post('/send-contact', [ContactController::class, 'send'])->name('send.contact');

// Route pour la page "Qui sommes-nous"
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

// Route pour la page "Vendre un bien"
Route::get('/sell', function () {
    return view('pages.sell');
})->name('sell');

// Route pour la page "Liste des annonces"
Route::get('/listings', function () {
    return view('pages.listings');
})->name('listings');
