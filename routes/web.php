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


Route::get('/', 'HomeController@index')->defaults('_config', [
    'view' => 'file.index',
])->name('file.index');

Route::post('/', 'HomeController@store')->defaults('_config', [
    'redirect' => 'category.index',
])->name('file.store');

Route::group(["prefix" => "category"], function () {

    Route::get('/', 'CategoryController@index')->defaults('_config', [
        'view' => 'category.index',
    ])->name('category.index');

    Route::get('/{id}', 'CategoryController@edit')->defaults('_config', [
        'view' => 'category.update',
    ])->name('category.edit');

    Route::put('/update', 'CategoryController@update')->defaults('_config', [
        'redirect' => 'category.index',
    ])->name('category.update');

    Route::delete('/delete/{id}', 'CategoryController@delete')->defaults('_config', [
        'redirect' => 'category.index',
    ])->name('category.delete');

});

Route::group(["prefix" => "region"], function () {

    Route::get('/', 'RegionController@index')->defaults('_config', [
        'view' => 'region.index',
    ])->name('region.index');

    Route::get('/{id}', 'RegionController@edit')->defaults('_config', [
        'view' => 'region.update',
    ])->name('region.edit');

    Route::put('/update', 'RegionController@update')->defaults('_config', [
        'redirect' => 'region.index',
    ])->name('region.update');

    Route::delete('/delete/{id}', 'RegionController@delete')->defaults('_config', [
        'redirect' => 'region.index',
    ])->name('region.delete');

});

