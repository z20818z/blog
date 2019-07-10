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
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/user/{id}', 'formcontroller@editActive');
Route::get('delete/{id}', 'formcontroller@delete');

//index
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/time', 'PostController@time');
Route::get('/posts.mail', function(){
    return view("posts.mail");
});
Route::post('/sendActive','formcontroller@insert')->name('sendActive');
Route::post('/updateActive','formcontroller@update')->name('updateActive');
Route::get('/send/email','formcontroller@sendmail');
Auth::routes();
Route::get('/posts.edittable','formcontroller@listActive')->name('edittable');
//Route::resource('posts', 'formcontroller');

Route::get('/auth/redirect/{provider}','SocialController@redirect');
Route::get('/callback/{provider}','SocialController@callback');

Route::resource('/form','NewformController');

