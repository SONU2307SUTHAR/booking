<?php

use App\Http\Middleware\SP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirmController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('/schedule',ScheduleController::class)->middleware('auth');
Route::middleware('auth')->group(function () {
    Route::resource('firm',FirmController::class)->middleware(SP::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function(){
    $user=Auth::user();
    switch($user->getRoleNames()[0]){
        case 'admin': return "ye admin wala he";
        case 'client': return "ye client wala he";
        case 'service_provider': return app(FirmController::class)->create();
    }
})->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';
