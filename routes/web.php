<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;

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
//     return view('welcome');
// });

/*--------------------------------------------------
        Route for Front-end
----------------------------------------------------*/


Route::get('/','App\Http\Controllers\Frontend\HomeController@home')->name('home');
Route::get('/post/{slug}','App\Http\Controllers\Frontend\postview@index')->name('post');







/*--------------------------------------------------
        Route for Back-end
----------------------------------------------------*/

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('user')->group(function(){
   Route::get('/manage',[UserController::class,'show'])->name('manage_user');
   Route::get('/adduser',[UserController::class,'userFromshow'])->name('adduser');
   Route::post('/addnewuser',[UserController::class,'adduser'])->name('addnewuser');
});

Route::group(['prefix'=>'category'],function(){
   Route::get('/addcategory','App\Http\Controllers\Backend\CategoryController@index')->name('category.add');
   Route::post('/store','App\Http\Controllers\Backend\CategoryController@store')->name('category.store');
   Route::get('/manage','App\Http\Controllers\Backend\CategoryController@create')->name('category.manage');
   Route::get('/delete/{id}','App\Http\Controllers\Backend\CategoryController@destroy')->name('categorydelete');
   Route::get('/edit/{id}','App\Http\Controllers\Backend\CategoryController@edit')->name('category.edit');
   Route::post('/update/{id}','App\Http\Controllers\Backend\CategoryController@update')->name('category.update');
});
//route for tag
Route::group(['prefix'=>'tag'],function(){
   Route::get('/addtag','App\Http\Controllers\Backend\TagController@index')->name('tag.add');
   Route::post('/store','App\Http\Controllers\Backend\TagController@store')->name('tag.store');
   Route::get('/manage','App\Http\Controllers\Backend\TagController@create')->name('tag.manage');
   Route::get('/delete/{id}','App\Http\Controllers\Backend\TagController@destroy')->name('tagdelet');
   Route::get('/edit/{id}','App\Http\Controllers\Backend\TagController@edit')->name('tag.edit');
   Route::post('/update/{id}','App\Http\Controllers\Backend\TagController@update')->name('tag.update');
});
//route for blogpost
Route::group(['prefix'=>'blog'],function(){
   Route::get('/addtag','App\Http\Controllers\Backend\BlogpostController@index')->name('blog.add');
   Route::post('/store','App\Http\Controllers\Backend\BlogpostController@store')->name('blog.store');
   Route::get('/manage','App\Http\Controllers\Backend\BlogpostController@create')->name('blog.manage');
   Route::get('/delete/{id}','App\Http\Controllers\Backend\BlogpostController@destroy')->name('blogdelete');
   Route::get('/edit/{id}','App\Http\Controllers\Backend\BlogpostController@edit')->name('blog.edit');
   Route::post('/update/{id}','App\Http\Controllers\Backend\BlogpostController@update')->name('blog.update');
   Route::get('/show/{id}','App\Http\Controllers\Backend\BlogpostController@show')->name('blog.show');
});

require __DIR__.'/auth.php';
