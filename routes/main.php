<?php

use App\Http\Livewire\AccountsLivewire;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DashboardLivewire;
use App\Http\Livewire\OrganizationLivewire;

Route::get('/home', DashboardLivewire::class)->name('home');

Route::prefix('users')->group(function(){
    Route::get('/accounts', AccountsLivewire::class)->name('users.accounts');
    Route::get('/organizations', OrganizationLivewire::class)->name('users.organizations');
});
