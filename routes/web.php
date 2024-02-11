<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BookmarkController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [StockController::class, 'index'])->name('stock.index');
    Route::get('/sample', [StockController::class, 'sample'])->name('stock.sample');
    Route::get('/myCart', [StockController::class, 'myCart'])->name('stock.myCart');
    Route::post('/addMyCart', [StockController::class, 'addMyCart'])->name('stock.addMyCart');
    Route::post('/deleteMyCartStock', [StockController::class, 'deleteMyCartStock'])->name('stock.deleteMyCartStock');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/stocks/{stockId}/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store');
    Route::delete('/stocks/{stockId}/unbookmark', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    Route::get('/bookmarks', [BookmarkController::class, 'bookmark_stocks'])->name('bookmarks');
});

require __DIR__.'/auth.php';
