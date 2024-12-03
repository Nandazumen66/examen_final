<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Ruta para la página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta para el dashboard, protegida por middleware de autenticación y verificación
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas protegidas por el middleware de autenticación
Route::middleware('auth')->group(function () {
    // Rutas para el perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para la gestión de tareas
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::patch('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    // Rutas para la gestión de categorías
    Route::get('/categories', [CategoriaController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoriaController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoriaController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoriaController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{id}', [CategoriaController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoriaController::class, 'destroy'])->name('categories.destroy');
});


require __DIR__.'/auth.php';
