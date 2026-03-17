<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PublicCatalog;
use App\Livewire\BookDetails;
use App\Livewire\CartPage;

Route::get('/', PublicCatalog::class);
Route::get('/books/{book}', BookDetails::class);
Route::get('/cart', CartPage::class);