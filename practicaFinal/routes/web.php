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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('vendedores/{vendedore}/venta', 'VendedorController@venta')->name('vendedores.venta');
Route::get('vendedores/{vendedore}/verVentas', 'VendedorController@verVentas')->name('vendedores.verVentas');

Route::resource('categorias', 'CategoriaController');
Route::resource('articulos', 'ArticuloController');
Route::resource('vendedores', 'VendedorController');

Route::post('vendedor', 'VendedorController@ventaCompletada')->name('vendedores.ventaCompletada');