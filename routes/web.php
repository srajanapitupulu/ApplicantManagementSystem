<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Admin\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function (Request $request) {
    $credentials = config('admin');

    if ($request->email === $credentials['email'] && $request->password === $credentials['password']) {
        session(['is_admin' => true]);
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['Invalid credentials.']);
})->name('admin.login.submit');

Route::get('/admin/logout', function () {
    session()->forget('is_admin');
    return redirect()->route('admin.login');
})->name('admin.logout');

Route::prefix('admin')
    ->as('admin.')
    ->middleware('admin')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('tasks', TaskController::class);
    });
