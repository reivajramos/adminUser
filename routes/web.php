<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
/* admin*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\ViewAdminController::class, 'index'])->name('admin');
Route::resource('proveedores', App\Http\Controllers\ProveedoreController::class);
Route::resource('categorias', App\Http\Controllers\CategoriaController::class);
Route::resource('productos', App\Http\Controllers\ProductoController::class);
Route::get('/users', [App\Http\Controllers\ViewUsersController::class, 'index'])->name('users');

/* users*/
Route::resource('pedidos', App\Http\Controllers\PedidoController::class);
Route::get('pdf', [App\Http\Controllers\PedidoController::class, 'pdf'])->name('users.pedido.pdf');


