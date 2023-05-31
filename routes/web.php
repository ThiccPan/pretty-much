<?php

use App\Http\Controllers\ItemController;
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
require __DIR__.'/auth.php';

Route::get('/', [ItemController::class, 'latest_3'])->name('user.home');
Route::get('/item', [ItemController::class, 'user_item'])->name('user.item');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/item', [ItemController::class, 'index'])->name('admin.item');
    Route::post('/admin/item', [ItemController::class, 'store'])->name('admin.item.create');
    Route::put('/admin/item/{item}', [ItemController::class, 'update'])->name('admin.item.update');
    Route::delete('/admin/item/{item}', [ItemController::class, 'destroy'])->name('admin.item.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});