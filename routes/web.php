<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\PayPalController;
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
    return redirect('home');
});

Route::group(['middleware' => ['log']], function () {
    Route::resource('forum', 'App\Http\Controllers\forum\ThreadController');
    Route::resource('getsite', 'App\Http\Controllers\GetSiteController');
    Route::resource('post', 'App\Http\Controllers\forum\PostController');
    Route::resource('tickets', 'App\Http\Controllers\TicketThreadController');
    Route::resource('tpost', 'App\Http\Controllers\TicketPostController');
    Route::resource('forumcreateaccount', 'App\Http\Controllers\forum\ForumCreateUserController');
    Route::resource('user', 'App\Http\Controllers\UserController');
    Route::resource('usernotiz', 'App\Http\Controllers\user\NotizController');
    Route::resource('userpassword', 'App\Http\Controllers\user\PasswordController');
    Route::resource('useremail', 'App\Http\Controllers\user\EmailController');
    Route::resource('usernewsletter', 'App\Http\Controllers\user\NewsletterController');
    Route::resource('useravatar', 'App\Http\Controllers\user\AvatarController');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('accounts', [\App\Http\Controllers\ServerManagerController::class, 'index'])->name('servers');
        Route::get('accounts/{id}/join/{version}', [\App\Http\Controllers\ServerManagerController::class, 'join']);
        Route::get('accounts/{id}/register', [\App\Http\Controllers\ServerManagerController::class, 'register']);
    });
    Route::get('accounts/extern/get', [\App\Http\Controllers\ServerManagerController::class, 'getHeader']);

    Route::get('home', [CustomAuthController::class, 'dashboard']);
    Route::get('login', [CustomAuthController::class, 'index'])->name('login');
    Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
    Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
    Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
    Route::get('chanceoldpassword', [CustomAuthController::class, 'newPW'])->name('chance-pw');
    Route::post('chanceoldpassword', [CustomAuthController::class, 'chanceoldpassword'])->name('register.chanceoldpassword');
    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

    // Paypal Donation Form

    Route::get('transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
    Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
    Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
    Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

    Route::resource('tiles', 'App\Http\Controllers\TileMapEditorController');
    Route::post('tiles/ajax/send/{id}', 'App\Http\Controllers\TileMapEditorController@ajax');

});
