<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\Category\Index as CategoryIndex;
use App\Livewire\Category\Create as CategoryCreate;
use App\Livewire\Category\Edit as CategoryEdit;
use App\Livewire\Cats\Index as CatsIndex;
use App\Livewire\Cats\Create as CatsCreate;
use App\Livewire\Cats\Edit as CatsEdit;
use App\Livewire\Users\Index as UsersIndex;
use App\Livewire\Users\Create as UsersCreate;
use App\Livewire\Users\Edit as UsersEdit;
use App\Livewire\Adopt\Index as AdoptIndex;
use App\Livewire\Adopt\Card as AdoptCard;

Route::get('/login', Login::class)->name('login.index');

Route::get('/dashboard', DashboardIndex::class)->name('dashboard.index');

Route::get('/category', CategoryIndex::class)->name('category.index');
Route::get('/category/create', CategoryCreate::class)->name('category.create');
Route::get('/category/edit/{id}', CategoryEdit::class)->name('category.edit');

Route::get('/cats', CatsIndex::class)->name('cats.index');
Route::get('/cats/create', CatsCreate::class)->name('cats.create');
Route::get('/cats/edit/{id}', CatsEdit::class)->name('cats.edit');

Route::get('/users', UsersIndex::class)->name('users.index');
Route::get('/users/create', UsersCreate::class)->name('users.create');
Route::get('/users/edit/{id}', UsersEdit::class)->name('users.edit');

Route::get('', function(){
    return redirect()->route('adopt.index');
});
Route::get('AdoptCats', AdoptIndex::class)->name('adopt.index');

