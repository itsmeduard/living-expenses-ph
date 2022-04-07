<?php
use App\Http\Livewire\Modules\User\{UserDashboard,UserExpenses};
use Illuminate\Support\Facades\{ Auth,Route };
use App\Http\Controllers\HomeController;

Auth::routes(['register' => false]);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/log-out', [HomeController::class, 'log_out'])->name('log-out');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    /*User Panel*/
    Route::group(['middleware' => ['web','CheckUser'], 'prefix' => 'user', 'as' => "user."], function() {
        Route::get('dashboard',   UserDashboard::class) ->name('dashboard');
        Route::get('expenses',    UserExpenses::class)  ->name('expenses');
    });
});

//auto clear of cache
Route::get('/clear', function() {
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return 'Cleared';
});

/*For AWS health check problem*/
Route::get('/healthcheck', function() {
    config()->set('session.driver', 'array');
    return response('OK', 200)
        ->header('Content-Type', 'text/plain');
});
