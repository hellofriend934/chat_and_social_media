<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function (){
    Route::get('/',\App\Http\Controllers\HomeController::class)->name('home');
    Route::get('/channel/{slug?}','App\Http\Controllers\ChannelController@index')->name('channel');
    Route::get('/channel/category/{title?}','App\Http\Controllers\ChannelController@index');

});


Route::middleware('auth')->group(function (){
    Route::get('/getMessages/{recipient_id?}/{group_id?}','App\Http\Controllers\Chat\GetMessageController@index')->name('getMess');
    Route::post('/sendMessage/{recipient_id?}/{group_id?}','App\Http\Controllers\Chat\SendMessageController@index')->name('sendMess');
    Route::post('/sendImage/{group_id}', \App\Http\Controllers\Chat\SendImageController::class)->name('chat.send_image');

});

Route::group(['prefix'=>'grud','name'=>'grud'], function (){
    Route::post('/create/{slug}',\App\Http\Controllers\GRUD\CreatePostController::class)->name('create.post');
    Route::get('/update/{channel}/post/{id}',\App\Http\Controllers\GRUD\EditPostController::class)->name('edit.post');
    Route::post('/update/{channel}/post/{id}',\App\Http\Controllers\GRUD\UpdatePostController::class)->name('update.post');
});
Route::post('/create','\App\Http\Controllers\CreatChannelController@__invoke')->name('store.channel');


Route::group(['name'=>'search'], function (){
    Route::get('/search/group', 'App\Http\Controllers\SearchChat@__invoke')->name('search.group');
    Route::get('/search/channel/', 'App\Http\Controllers\SearchChannel@__invoke')->name('search.channel');
    Route::get('/search/profile', \App\Http\Controllers\SearchProfileController::class)->name('search.profile');
});

Route::group(['middleware'=>'auth'],function (){
    Route::get('/messenger/{group_id?}',\App\Http\Controllers\ChatController::class)->name('messenger');
    Route::post('/messenger/create/group', \App\Http\Controllers\Chat\CreatGroupController::class)->name('create.group');
    Route::get('/leave/{group_id}', \App\Http\Controllers\Chat\LeaveGroup::class)->name('leave_group');
    Route::get('/group/with/{user_id}', \App\Http\Controllers\Chat\NotPartyGroupController::class)->name('nparty_group_create');
    Route::get('/follow/{channel_id}', '\App\Http\Controllers\ChannelController@follow')->name('follow');
});






Route::group(['name'=>'auth'],function (){
    Route::get('/signIn', 'App\Http\Controllers\Auth\SignInController@index')->name('login');
    Route::post('/signIn', 'App\Http\Controllers\Auth\SignInController@signIn')->name('signIn');

    Route::get('/signUp', 'App\Http\Controllers\Auth\SignUpController@index');
    Route::DELETE('/logOut', 'App\Http\Controllers\Auth\SignInController@logOut')->name('logOut');
    Route::post('/signUp', 'App\Http\Controllers\Auth\SignUpController@signUp')->name('signUp');;

    Route::get('/forgot-password', 'App\Http\Controllers\Auth\ForgotPasswordController@index')->middleware('guest')->name('password.request');
    Route::post('/forgot-password', 'App\Http\Controllers\Auth\ForgotPasswordController@forgotPassword')->middleware('guest')->name('password.email');
    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->middleware('guest')->name('password.reset');

    Route::post('/reset-password', 'App\Http\Controllers\Auth\ForgotPasswordController@update')->name('password.update');

    Route::get('/profile/{user_id?}', '\App\Http\Controllers\ProfileController@index')->name('profile');
    Route::post('/profile/update', '\App\Http\Controllers\ProfileController@updateProfile')->name('profile.update');

});

Route::group([],function(){
    Route::get('/2fa', 'App\Http\Controllers\Auth\TwoFaController@TwoFa');
    route::post('/OtpCheck','App\Http\Controllers\Auth\TwoFaController@OtpCheck')->name('OtpCheck');
});
Route::group(['prefix'=>'admin'],function (){
    Route::get('/block/{user}/{group_id}', 'App\Http\Controllers\Chat\AdminController@blockUser')->name('blockUserChat');
    Route::get('/unblock/{user}/{group_id}', 'App\Http\Controllers\Chat\AdminController@unBlockUser')->name('unBlockUserChat');
});
