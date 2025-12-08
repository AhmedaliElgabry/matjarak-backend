<?php

use App\Http\Controllers\Admin\SuperAdminController;
use Illuminate\Support\Facades\Route;

/**
 * Super Admin Routes
 * These routes are only accessible to super administrators
 */
Route::group([
    'prefix' => 'admin/super-admin',
    'middleware' => ['web', 'admin', 'super_admin'],
    'as' => 'admin.super-admin.'
], function () {
    
    // Super Admin Dashboard
    Route::get('/', [SuperAdminController::class, 'index'])->name('index');
    
    // Create Seller
    Route::get('/create', [SuperAdminController::class, 'create'])->name('create');
    Route::post('/store', [SuperAdminController::class, 'store'])->name('store');
    
    // Edit Seller
    Route::get('/{id}/edit', [SuperAdminController::class, 'edit'])->name('edit');
    Route::put('/{id}', [SuperAdminController::class, 'update'])->name('update');
    
    // Delete Seller
    Route::delete('/{id}', [SuperAdminController::class, 'destroy'])->name('destroy');
    
    // Toggle Seller Status
    Route::post('/{id}/toggle-status', [SuperAdminController::class, 'toggleStatus'])->name('toggle-status');
});
