<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/dashboard', [CategoryController::class, 'index'])
        ->name('dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/inventory', [InventoryController::class, 'index'])
        ->name('inventory');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/inventories', [InventoryController::class, 'index'])->name('inventories.index');
    Route::get('/inventories/create', [InventoryController::class, 'create'])->name('inventories.create');
    Route::post('/inventories', [InventoryController::class, 'store'])->name('inventories.store');
    Route::get('/inventories/{inventory}', [InventoryController::class, 'show'])->name('inventories.show');
    Route::get('/inventories/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventories.edit');
    Route::put('/inventories/{inventory}', [InventoryController::class, 'update'])->name('inventories.update');
    Route::delete('/inventories/{inventory}', [InventoryController::class, 'destroy'])->name('inventories.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{inventory}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{inventory}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{inventory}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{inventory}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
// routes/web.php
Route::get('/admin-test', function () {
    return view('layouts.admin');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});


require __DIR__.'/auth.php';
