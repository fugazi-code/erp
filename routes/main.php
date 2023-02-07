<?php

use App\Http\Livewire\AccountsLivewire;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DashboardLivewire;

Route::get('/home', DashboardLivewire::class)->name('home');

Route::prefix('users')->group(function(){
    Route::get('/accounts', AccountsLivewire::class)->name('users.accounts');
});
