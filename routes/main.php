<?php

use App\Http\Livewire\AccountsLivewire;
use App\Http\Livewire\CategoryLivewire;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DashboardLivewire;
use App\Http\Livewire\OrganizationLivewire;
use App\Http\Livewire\ProductLivewire;
use App\Http\Livewire\SubCategoryLivewire;

Route::get('/home', DashboardLivewire::class)->name('home');

Route::prefix('products')->group(function(){
    Route::get('/list', ProductLivewire::class)->name('products.list');
    Route::get('/category', CategoryLivewire::class)->name('category.list');
    Route::get('/sub-category', SubCategoryLivewire::class)->name('sub-category.list');
});

Route::prefix('users')->group(function(){
    Route::get('/accounts', AccountsLivewire::class)->name('users.accounts');
    Route::get('/organizations', OrganizationLivewire::class)->name('users.organizations');
});
