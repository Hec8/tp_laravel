<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatistiqueController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route pour le tableau de bord admin
Route::middleware('auth')->get('/admin/dashboard', [RegisteredUserController::class, 'index_admin'])->name('admin.dashboard');

// Route pour le tableau de bord utilisateur
Route::middleware('auth')->get('/user/dashboard', [RegisteredUserController::class, 'index_user'])->name('user.dashboard');

require __DIR__.'/auth.php';

Route::get('/user-management',[UserController::class, 'index'])->name('user-management') ;
Route::get('/supprimer-user/{id}',[UserController::class, 'destroy']); 
Route::get('/project-management',[ProjetController::class, 'index'])->name('project-management') ;
Route::get('/supprimer-projet/{id_projet}',[ProjetController::class, 'destroy']); 
Route::get('/ajouter-projet',[ProjetController::class, 'create'])->name('ajouter-projet'); 
Route::post('/ajouter/traitement',[ProjetController::class, 'store']); 
Route::put('/terminer-projet/{id_projet}', [ProjetController::class, 'modifierStatutProjet'])->name('terminer-projet');
Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('stats');
Route::get('/modifier-projet/{id_projet}', [ProjetController::class, 'edit']);
Route::patch('/modifier/traitement/{id_projet}', [ProjetController::class, 'update']);
Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('stats');
Route::get('/api/projets', [ProjetController::class, 'getProjets']);
Route::get('//api/users', [UserController::class, 'getUsers']);
