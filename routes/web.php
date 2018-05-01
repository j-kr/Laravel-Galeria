<?php

/*
|--------------------------------------------------------------------------
| Web Routes //  TEST!
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'GalleryController@viewGalleryListAll');

Route::get('gallery/delete/{id}', 'GalleryController@deleteGallery');
Route::get('gallery/list', 'GalleryController@viewGalleryList');
Route::post('gallery/save', 'GalleryController@saveGallery');
Route::get('gallery/view/{id}', 'GalleryController@viewGalleryPics');
Route::post('image/do-upload', 'GalleryController@doImageUpload');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

