<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Welcome to the TargetIT API!';
})->name('home');
