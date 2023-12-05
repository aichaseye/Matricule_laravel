<?php

use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ProfileController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource("apprenants", ApprenantController::class);

// Route::get('/apprenants/index', [ApprenantController::class, 'index'])->name('apprenants.index');
// Route::get('apprenants/create', [ApprenantController::class, 'create'])->name('apprenants.create');
// Route::post('apprenants', [ApprenantController::class, 'store'])->name('apprenants.store');
// Route::get('apprenants/{id}', [ApprenantController::class, 'show'])->name('apprenants.show');
// Route::get('apprenants/{apprenant}/edit', [ApprenantController::class, 'edit'])->name('apprenants.edit');
// Route::put('apprenants/{id}', [ApprenantController::class, 'update'])->name('apprenants.update');
// Route::delete('apprenants/{id}', [ApprenantController::class, 'destroy'])->name('apprenants.destroy');

Route::resource('etablissements', EtablissementController::class);
Route::resource('matieres' , MatiereController::class);


require __DIR__.'/auth.php';
