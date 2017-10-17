<?php

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

// Route::get('/', function () {
//     return view('index');
// });


Route::get('demos/loaddata','RekomendasiController@loadData');  
Route::post('demos/loaddata','RekomendasiController@loadDataAjax' );
            Route::post('demos/loaddatapop','RekomendasiController@loadDataAjaxpop' );

Auth::routes();

    Route::get('/', 'RekomendasiController@index')->name('/');

Route::group(['prefix'=>'member', 'middleware'=>['auth']], function () {
    Route::get('/preference', 'RekomendasiController@preference');

    Route::get('/preference/2', 'RekomendasiController@preference2')->name('preference/2');
    Route::get('/preference/3', 'RekomendasiController@preference3')->name('preference/3');
    Route::get('/preference/4', 'RekomendasiController@preference4')->name('preference/4');
    Route::get('/preference/5', 'RekomendasiController@preference5')->name('preference/5');
});
    Route::get('member/detailmusik/{id}', 'RekomendasiController@show');

    Route::get('/admin/users', 'UsersController@users')->name('users');
    Route::delete('/admin/users/{id}', 'UsersController@destroy');
    Route::resource('/admin/kelola_music', 'MusikController');

    Route::post('/member/rating/create', 'RekomendasiController@create');
    Route::post('/member/rating/createdetail', 'RekomendasiController@createdetail');


// Route::get('/', 'HomeController@index')->name('home');
