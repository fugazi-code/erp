<?php

use App\Http\Livewire\AccountsLivewire;
use App\Http\Livewire\BrandLivewire;
use App\Http\Livewire\CategoryLivewire;
use App\Http\Livewire\CustomerLivewire;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DashboardLivewire;
use App\Http\Livewire\OrganizationLivewire;
use App\Http\Livewire\ProductLivewire;
use App\Http\Livewire\SubCategoryLivewire;
use App\Http\Livewire\SupplierLivewire;

Route::get('/home', DashboardLivewire::class)->name('home');

Route::prefix('products')->group(function(){
    Route::get('/list', ProductLivewire::class)->name('products.list');
    Route::get('/category', CategoryLivewire::class)->name('category.list');
    Route::get('/sub-category', SubCategoryLivewire::class)->name('sub-category.list');
    Route::get('/brand', BrandLivewire::class)->name('brand.list');
});

Route::prefix('people')->group(function(){
    Route::get('/customer', CustomerLivewire::class)->name('people.customer');
    Route::get('/supplier', SupplierLivewire::class)->name('people.supplier');
});

Route::prefix('users')->group(function(){
    Route::get('/accounts', AccountsLivewire::class)->name('users.accounts');
    Route::get('/organizations', OrganizationLivewire::class)->name('users.organizations');
});
