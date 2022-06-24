<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

/*--------------------------------------------------
        Route for Front-end
----------------------------------------------------*/

Route::get('/',function(){
    return view('frontend.home');
});




/*--------------------------------------------------
        Route for Back-end
----------------------------------------------------*/

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix'=>'admin'],function(){
   Route::get('/addcategory','App\Http\Controllers\Backend\CategoryController@index')->name('category.add');
   Route::post('/store','App\Http\Controllers\Backend\CategoryController@store')->name('category.store');
   Route::get('/manage','App\Http\Controllers\Backend\CategoryController@create')->name('category.manage');
   Route::get('/delete/{id}','App\Http\Controllers\Backend\CategoryController@destroy')->name('categorydelete');
   Route::get('/edit/{id}','App\Http\Controllers\Backend\CategoryController@edit')->name('category.edit');
   Route::post('/update/{id}','App\Http\Controllers\Backend\CategoryController@update')->name('category.update');
});

require __DIR__.'/auth.php';
