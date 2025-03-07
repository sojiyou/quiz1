<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello/{name}', function($name) {
    return 'hi ' . $name;
});
Route::resource('/inventory', InventoryController::class);