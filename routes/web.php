<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ApplicantPortalController;

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
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('tasks', TaskController::class);

        Route::resource('applicants', ApplicantController::class);
        Route::patch('applicants/{applicant}/status', [ApplicantController::class, 'updateStatus'])->name('applicants.updateStatus');

    });

// Route::prefix('portal')->group(function () {
//     Route::get('/{token}', [ApplicantPortalController::class, 'show'])->name('applicant.portal');
//     Route::post('/{token}/start', [ApplicantPortalController::class, 'startTest'])->name('applicant.portal.start');
//     Route::post('/{token}/next', [ApplicantPortalController::class, 'nextStep'])->name('applicant.portal.next');
//     Route::post('/{token}/prev', [ApplicantPortalController::class, 'prevStep'])->name('applicant.portal.prev');
//     Route::post('/{token}/submit', [ApplicantPortalController::class, 'submit'])->name('applicant.portal.submit');
// });

Route::prefix('portal')->group(function () {
    Route::get('/{token}', [ApplicantPortalController::class, 'show'])->name('applicant.portal');
    Route::post('/{token}/next', [ApplicantPortalController::class, 'nextStep'])->name('applicant.portal.next');
    Route::post('/{token}/prev', [ApplicantPortalController::class, 'prevStep'])->name('applicant.portal.prev');
    Route::post('/{token}/submit', [ApplicantPortalController::class, 'submit'])->name('applicant.portal.submit');
});

