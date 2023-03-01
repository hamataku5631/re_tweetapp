<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

<<<<<<< HEAD
=======
//sample
Route::get('/sample', [\App\Http\Controllers\Sample\IndexController::class,'show']
);

Route::get('/sample/{id}', [\App\Http\Controllers\Sample\IndexController::class,'showId']
);


//tweet関連
Route::get('/tweet', \App\Http\Controllers\Tweet\IndexController::class
)->name('tweet.index');
Route::get('/tweet/softdelete', \App\Http\Controllers\Tweet\ProfileDeleteController::class
)->name('tweet.softdelete');

Route::middleware('auth')->group(function () {
Route::post('/tweet/create', \App\Http\Controllers\Tweet\CreateController::class
)->name('tweet.create');

Route::get('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class
)->name('tweet.update.index')->where('tweetId','[0-9]+');

Route::put('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class
)->name('tweet.update.put')->where('tweetId','[0-9]+');

Route::delete('/tweet/delete/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class
)->name('tweet.delete');
});

//ログイン関連
Route::get('login', 'login@');
Route::get('/logout', \App\Http\Controllers\Auth\LogoutController::class
)->name('tweet.logout');

//profile関連
Route::get('/tweet/profile',\App\Http\Controllers\Tweet\ProfileController::class
)->name('tweet.profile');

Route::get('/tweet/profile/edit',\App\Http\Controllers\Tweet\ProfileEditController::class
)->name('tweet.profile.edit');

Route::put('/tweet/profile/edited',\App\Http\Controllers\Tweet\PutProfileController::class
)->name('tweet.profile.edited');


Route::post('/user', 'UsersController@withdrawal')->name('user.withdrawal');

>>>>>>> c235b54bc9de49d5c463fdc1a0262dfd42d250b5
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
