<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('pages.home'));
Route::get('/daftar', fn () => view('pages.daftar'));
Route::get('/cek', fn () => view('pages.cek'));

// Admin auth
Route::get('/admin/login', fn () => view('pages.admin-login'));

Route::post('/admin/login', function () {
    $username = request('username', '');
    $password = request('password', '');

    if (
        $username === env('ADMIN_USERNAME', 'admin') &&
        $password === env('ADMIN_PASSWORD', 'admin123')
    ) {
        session(['admin_auth' => true]);
        return redirect('/admin');
    }

    return back()
        ->withInput(request()->only('username'))
        ->with('login_error', 'Username atau password salah!');
});

Route::post('/admin/logout', function () {
    session()->forget('admin_auth');
    return redirect('/admin/login');
});

Route::get('/admin', function () {
    if (!session('admin_auth')) {
        return redirect('/admin/login');
    }
    return view('pages.admin');
});
