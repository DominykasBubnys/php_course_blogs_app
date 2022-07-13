<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogAutocompleteController;



Route::get('/', function(){return view("welcome");});
Route::get("blogs/autocomplete", BlogAutocompleteController::class);
Route::resource('blogs', BlogController::class);
