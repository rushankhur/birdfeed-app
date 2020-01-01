<?php

use App\User;
use Illuminate\Support\Facades\Input;
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

Route::resource('/admin/users', 'UsersController');

// Search users by name or email
Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
        return view('users.search')->withDetails($user)->withQuery ( $q );
    else return view ('users.search')->withMessage('No Details found. Try to search again !');
});



Route::resource('/admin/themes', 'ThemesController');


Route::resource('/feed', 'PostsController');
Route::redirect('/', '/feed');

Route::resource('/posts', 'PostsController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


