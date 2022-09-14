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

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create']);
Route::post('/categories/store', [App\Http\Controllers\CategoryController::class, 'store']);
Route::get('/categories/edit/{category_id}', [App\Http\Controllers\CategoryController::class, 'edit']);
Route::put('/categories/update/{category_id}', [App\Http\Controllers\CategoryController::class, 'update']);
Route::delete('/categories/destroy/{category_id}', [App\Http\Controllers\CategoryController::class, 'destroy']);


Route::get('/menus', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('/menus/create', [App\Http\Controllers\MenuController::class, 'create']);
Route::post('/menus/store', [App\Http\Controllers\MenuController::class, 'store']);
Route::get('/menus/edit/{menu_id}', [App\Http\Controllers\MenuController::class, 'edit']);
Route::put('/menus/update/{menu_id}', [App\Http\Controllers\MenuController::class, 'update']);
Route::delete('/menus/destroy/{menu_id}', [App\Http\Controllers\MenuController::class, 'destroy']);

Route::get('/tables', [App\Http\Controllers\TableController::class, 'index']);
Route::get('/tables/create', [App\Http\Controllers\TableController::class, 'create']);
Route::post('/tables/store', [App\Http\Controllers\TableController::class, 'store']);
Route::get('/tables/edit/{table_id}', [App\Http\Controllers\TableController::class, 'edit']);
Route::put('/tables/update/{table_id}', [App\Http\Controllers\TableController::class, 'update']);
Route::delete('/tables/destroy/{table_id}', [App\Http\Controllers\TableController::class, 'destroy']);

Route::get('/servers', [App\Http\Controllers\ServerController::class, 'index']);
Route::get('/servers/create', [App\Http\Controllers\ServerController::class, 'create']);
Route::post('/servers/store', [App\Http\Controllers\ServerController::class, 'store']);
Route::get('/servers/edit/{servant_id}', [App\Http\Controllers\ServerController::class, 'edit']);
Route::put('/servers/update/{servant_id}', [App\Http\Controllers\ServerController::class, 'update']);
Route::delete('/servers/destroy/{servant_id}', [App\Http\Controllers\ServerController::class, 'destroy']);

Route::get('/sales',[App\Http\Controllers\SalesController::class, 'index']);
Route::get('/sales/create', [App\Http\Controllers\SalesController::class, 'create']);
Route::post('/sales/store', [App\Http\Controllers\SalesController::class, 'store']);
Route::get('/sales/{sale_id}', [App\Http\Controllers\SalesController::class, 'edit']);
Route::put('/sales/update/{sale_id}', [App\Http\Controllers\SalesController::class, 'update']);
Route::delete('/sales/destroy/{sale_id}', [App\Http\Controllers\SalesController::class, 'destroy']);


Route::get('/payments', [App\Http\Controllers\PaymentController::class, 'index']);

Route::get('/pdfview', [App\Http\Controllers\PaymentController::class, 'pdfview']);


Route::get('/reports', [App\Http\Controllers\ReportController::class, 'index']);

Route::post('/reports/generate', [App\Http\Controllers\ReportController::class, 'generate']);

Route::post('/reports/export', [App\Http\Controllers\ReportController::class, 'export']);

// Route::resource('categories', 'CategoryController');
// Route::resource('tables', 'TableController');
// Route::resource('servants', 'ServantsController');
// Route::resource('menus', 'MenuController');
// Route::get('payments', 'PaymentController@index')->name("payments.index");
// Route::resource('sales', 'SalesController');
// Route::get('reports', 'ReportController@index')->name("reports.index");
// Route::post('reports/generate', 'ReportController@generate')->name("reports.generate");
// Route::post('reports/export', 'ReportController@export')->name("reports.export");
