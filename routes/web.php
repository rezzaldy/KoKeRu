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


Route::get('/', [App\Http\Controllers\UserController::class, 'landing'])->name('/');

// Route::get('login', function () {
//     return view('auth/login');
// })->name('login');

Auth::routes();

Route::get('cs', [App\Http\Controllers\UserController::class, 'index'])->name('cs');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('is_admin');
Auth::routes();

Route::get('deleteDistribusi/{id}', [App\Http\Controllers\UserController::class, 'deleteDistribusi'])->name('deleteDistribusi');
Route::post('deleteDistribusi/{id}', [App\Http\Controllers\UserController::class, 'deleteDistribusi'])->name('deleteDistribusi');

Route::get('editDistribusi/{id}', ['as' => 'profile.change', 'uses' => 'App\Http\Controllers\ProfileController@change']);
Route::post('editDistribusi/{id}', ['as' => 'profile.change', 'uses' => 'App\Http\Controllers\ProfileController@change']);
Route::post('add',[App\Http\Controllers\DistribusiController::class,'addData']);
Route::post('change',[App\Http\Controllers\DistribusiController::class,'changeData']);
Route::post('store',[App\Http\Controllers\UserController::class,'store']);

//Route::get('/cetak_pdf_tgl', 'App\Http\Controllers\CetakController@index')->name('cetak_pdf_tgl');
Route::get('/report', 'App\Http\Controllers\CetakController@cetakForm')->name('report');
Route::get('/cetak_pdf_tgl/{tglawal}/{tglakhir}/{status}', 'App\Http\Controllers\CetakController@cetakPegawaiPertanggal')->name('cetak_pdf_tgl');

Route::get('resetStatus', ['as' => 'pages.reset', 'uses' => 'App\Http\Controllers\DistribusiController@resetStatus']);

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('monitor', function () {
		return view('pages.monitor');
	})->name('monitor');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
	
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('distribusi', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::get('monitor', ['as' => 'monitor', 'uses' => 'App\Http\Controllers\TaskController@index']);
	Route::get('addDistribusi', ['as' => 'profile.add', 'uses' => 'App\Http\Controllers\ProfileController@add']);
	Route::post('addDistribusi', ['as' => 'profile.add', 'uses' => 'App\Http\Controllers\ProfileController@add']);
	//Route::get('report', ['as' => 'pages.report', 'uses' => 'App\Http\Controllers\ReportController@index']);
});

//Route::post('cs', [App\Http\Controllers\UserController::class, 'store'])->name('addimage');