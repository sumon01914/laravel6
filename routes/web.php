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

Route::get('/',"HomeController@index");
Route::get('about/us', "HelloController@about")->name('about');
Route::get('contact/us', "HelloController@contact")->name('contact');

Route::get('add/category', "HelloController@AddCategory")->name('add.category');
Route::post('store/category', "HelloController@StoreCategory")->name('store.category');
Route::get('category/all', "HelloController@Showcategory")->name('category.all');
Route::get('category/view/{id}',"HelloController@ViewCategory");
Route::get('category/delete/{id}',"HelloController@DeleteCategory");
Route::get('category/edit/{id}',"HelloController@EditCategory");
Route::post('category/update/{id}',"HelloController@UpdateCategory");

Route::get('write/post', "PostController@WritePost")->name('write.post');
Route::post('store/post', "PostController@StorePost")->name('store.post');
Route::get('all/post', "PostController@AllPost")->name('all.post');
Route::get('post/view/{id}',"PostController@ViewPost");
Route::get('post/edit/{id}',"PostController@EditPost");
Route::post('update/post/{id}',"PostController@UpdatePost");
Route::get('post/delete/{id}',"PostController@DeletePost");


