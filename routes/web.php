<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StatusController;
use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileInformationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('explore/{user}', ExploreUserController::class)->name('users.index');

    Route::get('timeline',[ TimelineController::class, '__invoke'])->name('timeline');
    Route::post('status', [StatusController::class, 'store'])->name('statuses.store');


    Route::prefix('profile')->group(function(){
        Route::get('{user}/following', [FollowingController::class, 'following'])->name('profile.following');
        Route::post('{user}', [FollowingController::class, 'store'])->name('following.store');
        Route::get('{user}/follower', [FollowingController::class, 'follower'])->name('profile.follower');
        Route::get('{user}', ProfileInformationController::class)->name('profile')->withoutMiddleware('auth');
    });
});



 
require __DIR__.'/auth.php';
