<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PublicCatalog;
use App\Livewire\BookDetails;

Route::get('/', PublicCatalog::class);
Route::get('/books/{book}', BookDetails::class);