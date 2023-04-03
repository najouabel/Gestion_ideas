<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Models\Commentaire;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/posts/profile', [PostController::class, 'profile'])->name('posts.profile');
Route::get('/', function () {
    return redirect()->route('posts.index');
 });
Route::resource('posts', PostController::class);
Route::resource('commentaire', CommentaireController::class)->only(['store', 'destroy']);
Route::get('/posts/commentaire/{id}', [PostController::class, 'getonepost']);
Route::post('/posts/commentaire/{id}/likes', [LikeController::class, 'store'])->name('commentaire.l.store');
Route::delete('/posts/commentaire/{id}/likes', [LikeController::class, 'destroy'])->name('commentaire.l.store');

Route::get('/dashboard', function () {
    return redirect()->route('posts.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
