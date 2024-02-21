<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(["prefix" => "/student"],function(){
    Route::get('/all',[\App\Http\Controllers\StudentsController::class,'index']);
    Route::get('/edit/{student}', [\App\Http\Controllers\StudentsController::class, "edit"]);
    Route::post('/update/{student}', [\App\Http\Controllers\StudentsController::class, "update"]);
    Route::get('/tambah',[\App\Http\Controllers\StudentsController::class, "create"]);
    Route::post('/add', [\App\Http\Controllers\StudentsController::class, "store"]);
    Route::delete('/delete/{student}',[\App\Http\Controllers\StudentsController::class,"destroy"]);

});

Route::group(['prefix'=>"/school"],function (){
    Route::get('/all',[\App\Http\Controllers\IlhamsController::class,'index']);
    Route::get('/edit/{id}',[\App\Http\Controllers\IlhamsController::class,'edit']);
    Route::get('/tambah',[\App\Http\Controllers\IlhamsController::class,'create']);
    Route::post('/add',[\App\Http\Controllers\IlhamsController::class,'store']);
    Route::post('/update/{id}',[\App\Http\Controllers\IlhamsController::class,'update']);
    Route::delete('/delete/{id}',[\App\Http\Controllers\IlhamsController::class,'destroy']);
});

Route::group(["prefix" => "/Login"], function (){
    Route::get('/login', [\App\Http\Controllers\LoginController::class, "login"])->name('login')->middleware('guest');
    Route::get('/register', [\App\Http\Controllers\RegisterController::class, "Register"])->middleware('guest');
    Route::post('/register', [\App\Http\Controllers\RegisterController::class, "store"]);
    Route::post('/login', [\App\Http\Controllers\LoginController::class, "authenticate"]);
    Route::post('/keluar', [\App\Http\Controllers\LoginController::class, "logout"]);
});

Route::group(['prefix' => "dashboard"], function(){
    // <-----------------------------------STUDENT----------------------------------------------->
    Route::get('/index', [\App\Http\Controllers\DashboardController::class, "index"])->middleware('auth');
    Route::get('/tambah', [\App\Http\Controllers\DashboardController::class, "create"])->middleware('auth');
    Route::post('/add', [\App\Http\Controllers\DashboardController::class, "store"])->middleware('auth');
    Route::delete('/delete/{student}',[\App\Http\Controllers\DashboardController::class,"destroy"])->middleware('auth');
    Route::get('/edit/{student}', [\App\Http\Controllers\DashboardController::class, "edit"])->middleware('auth');
    Route::post('/update/{student}', [\App\Http\Controllers\DashboardController::class, "update"])->middleware('auth');
    Route::get('/keluar', [\App\Http\Controllers\DashboardController::class, "logoutds"]);//Tambahan agar bisa keluar dari dashboard ke login
    // <-----------------------------------KELAS----------------------------------------------->
    Route::get('/grade', [\App\Http\Controllers\DashboardController::class, "indexKelas"])->middleware('auth');
    Route::get('/tambahKelas', [\App\Http\Controllers\DashboardController::class, "createKelas"])->middleware('auth');
    Route::post('/addKelas', [\App\Http\Controllers\DashboardController::class, "storeKelas"])->middleware('auth');
    Route::delete('/deleteKelas/{kelas}',[\App\Http\Controllers\DashboardController::class,"destroyKelas"])->middleware('auth');
    Route::get('/editKelas/{kelas}', [\App\Http\Controllers\DashboardController::class, "editKelas"])->middleware('auth');
    Route::post('/updateKelas/{kelas}', [\App\Http\Controllers\DashboardController::class, "updateKelas"])->middleware('auth');
});

Route::get('/', function () {
    return view('welcome');
});
