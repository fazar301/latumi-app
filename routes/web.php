<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OauthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('front.home');
});

Route::get('/dashboard', function () {
    // mencegah user dengan role admin mengakses dashboard customer
    if(Auth::user()->role == 'admin'){
        return redirect('/admin/');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('oauth/google', [OauthController::class, 'redirectToProvider'])->name('oauth.google');  
Route::get('oauth/google/callback', [OauthController::class, 'handleProviderCallback'])->name('oauth.google.callback');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
