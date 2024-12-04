<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TacheController;
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
Route::middleware(['auth', 'roleMiddleware:admin'])->group(function() {
    Route::get('/admin/dashboard', [RegisteredUserController::class, 'index_admin'])->name('admin.dashboard');
    Route::get('/user-management',[UserController::class, 'index'])->name('user-management') ;
    Route::get('/supprimer-user/{id}',[UserController::class, 'destroy']);
    Route::get('/api/users', [UserController::class, 'getUsers']);
});


// Route pour le tableau de bord utilisateur
Route::middleware(['auth', 'roleMiddleware:user'])->group(function() {
    Route::get('/user/dashboard', [RegisteredUserController::class, 'index_user'])->name('user.dashboard');
});

require __DIR__.'/auth.php';

//Routes communes
Route::get('/project-management',[ProjetController::class, 'index'])->name('project-management') ;
Route::get('/supprimer-projet/{id_projet}',[ProjetController::class, 'destroy']); 
Route::get('/ajouter-projet',[ProjetController::class, 'create'])->name('ajouter-projet'); 
Route::post('/ajouter/traitement',[ProjetController::class, 'store']); 
Route::put('/terminer-projet/{id_projet}', [ProjetController::class, 'modifierStatutProjet'])->name('terminer-projet');
Route::get('/modifier-projet/{id_projet}', [ProjetController::class, 'edit']);
Route::patch('/modifier/traitement/{id_projet}', [ProjetController::class, 'update']);
Route::get('/api/projets', [ProjetController::class, 'getProjets']);

Route::get('/api/task', [TacheController::class, 'getTaches']);
Route::get('/api/assigned-task', [TacheController::class, 'getTachesAssignees']);
Route::get('/ajouter-tache', [TacheController::class, 'create'])->name('ajouter-tache');
Route::post('/ajouter/tache/traitement',[TacheController::class, 'store'])->name('tache.store'); 
Route::get('/task-management', [TacheController::class, 'index'])->name('task-management');
Route::put('/terminer-tache/{id_tache}', [TacheController::class, 'modifierStatutTache'])->name('terminer-tache');
Route::patch('/modifier/traitement/tache/{id_tache}', [TacheController::class, 'update']);
Route::get('/modifier-tache/{id_tache}',[TacheController::class, 'edit']); 
Route::get('/supprimer-tache/{id_tache}',[TacheController::class, 'destroy']); 

Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('stats');

Route::get('/assigner-tache/{id}', [TacheController::class, 'showAssignForm'])->name('assigner-tache');
Route::post('/assigner-tache/{id}', [TacheController::class, 'delegate'])->name('delegate-tache');
Route::get('/mes-taches', [TacheController::class, 'taskManagement']);