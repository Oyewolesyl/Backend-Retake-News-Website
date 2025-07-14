<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

// ADD THIS NEW ROUTE FOR DATABASE DIAGNOSIS
Route::get('/db-test', function () {
    try {
        $config = config('database.connections.mysql');
        dd($config);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
});

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/article/{id}', [HomeController::class, 'show'])->name('article.show');

// Authentication routes
Auth::routes();

// Admin routes - CHECK ADMIN INSIDE THE CONTROLLER INSTEAD
Route::prefix('admin-dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/articles', [AdminController::class, 'articles'])->name('admin.articles');
    Route::get('/articles/create', [AdminController::class, 'createArticle'])->name('admin.articles.create');
    Route::post('/articles', [AdminController::class, 'storeArticle'])->name('admin.articles.store');
    Route::get('/articles/{id}/edit', [AdminController::class, 'editArticle'])->name('admin.articles.edit');
    Route::put('/articles/{id}', [AdminController::class, 'updateArticle'])->name('admin.articles.update');
    Route::delete('/articles/{id}', [AdminController::class, 'deleteArticle'])->name('admin.articles.delete');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/admins', [AdminController::class, 'admins'])->name('admin.admins');
});

// ✅ Add this route for user (and admin) profile page
Route::get('/profile', function () {
    $user = auth()->user();
    $userArticles = Article::where('user_id', $user->id)->get();
    return view('profile', compact('userArticles'));
})->middleware(['auth'])->name('profile');
