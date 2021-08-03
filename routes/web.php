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


Route::get('/', function () {
    return view('pages.index');
});

Route::get('/','makeController@index');





Route::get('about','makeController@about')->name('about');
Route::get('contact','makeController@contact')->name('contact');
Route::get('writepost','makeController@writepost')->name('write.post');
Route::get('addcategory','makeController@AddCategory')->name('add.category');
Route::post('storecategory','makeController@StoreCategory')->name('store.category');
Route::post('/','makeController@welcome')->name('welcome');
Route::get('allcategory','makeController@AllCategory')->name('all.category');
Route::get('view/category/{id}','makeController@viewCategory');
Route::get('delete/category/{id}','makeController@deleteCategory');
Route::get('edit/category/{id}','makeController@editCategory');
Route::post('update/category/{id}','makeController@updateCategory');


Route::get('writepost','makeController@writepost')->name('write.post');
Route::post('storepost','makeController@Storepost')->name('store.post');
Route::get('allpost','makeController@Allpost')->name('all.post');
Route::get('view/post/{id}','makeController@viewpost');
Route::get('delete/post/{id}','makeController@deletepost');
Route::get('edit/post/{id}','makeController@editpost');
Route::post('update/post/{id}','makeController@updatepost');