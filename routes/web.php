<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('pages.home'));
Route::get('/daftar', fn () => view('pages.daftar'));
Route::get('/cek', fn () => view('pages.cek'));
Route::get('/admin', fn () => view('pages.admin'));
