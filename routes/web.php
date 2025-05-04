<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {   
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('/category', CategoryController::class);
Route::resource('/item', ItemController::class);
Route::resource('/transaction', TransactionController::class);
Route::resource('/detail', TransactionDetailController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::put('/item/{id}', [ItemController::class, 'update'])->name('item.update');

require __DIR__.'/auth.php';
