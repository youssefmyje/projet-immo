<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

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
    return view('annonces.create');
})->name('sell')->middleware('auth');


// Route pour la page "Liste des annonces"
Route::get('/listings', [AnnonceController::class, 'index'])->name('listings.index');

// Route pour la page de connexion/inscription
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Route pour la page de paramètres
Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit')->middleware('auth');
Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update')->middleware('auth');

Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

// Routes pour les annonces
Route::get('/annonces/create', [AnnonceController::class, 'create'])->name('annonces.create')->middleware('auth');
Route::post('/annonces', [AnnonceController::class, 'store'])->name('annonces.store')->middleware('auth');
Route::get('/annonces/{id}/edit', [AnnonceController::class, 'edit'])->name('annonces.edit')->middleware('auth');
Route::put('/annonces/{id}', [AnnonceController::class, 'update'])->name('annonces.update')->middleware('auth');
Route::delete('/annonces/{id}', [AnnonceController::class, 'destroy'])->name('annonces.destroy')->middleware('auth');
Route::get('/listings/{id}', [AnnonceController::class, 'show'])->name('annonces.show');

// Routes pour les favoris
Route::post('/favoris/{annonce}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
Route::middleware('auth')->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
});

// Routes pour l'administration
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/users/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])->name('users.toggleAdmin');
});

Route::get('/search', [AnnonceController::class, 'search'])->name('listings.search');
