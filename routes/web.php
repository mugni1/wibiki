<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//login 
Route::get('/login',[AuthController::class,'login'])->name('login');
//Auth
Route::post('/login-auth',[AuthController::class,'auth']);
//logout
Route::get('/logout',[AuthController::class,'logout']);

//DASHBOARD KHUSUS ADMIN
Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');

// Dashboard Anime
Route::get('/dashboard/daftar-anime',[DashboardController::class,'daftarAnime'])->middleware('auth');
//show-detail-anime
Route::get('/dashboard/anime-detail/{id}',[DashboardController::class,'showAnime']);
//add-anime
Route::get('/dashboard/anime-add',[DashboardController::class,'createAnime']);
//store-anime
Route::post('/dashboard/anime-add/store',[DashboardController::class,'storeAnime']);
//delete-anime
Route::delete('/dashboard/anime-delete/{id}',[DashboardController::class,'dropAnime']);

//Dashboard Episode
Route::get('/dashboard/daftar-episode',[DashboardController::class,'daftarEpisode']);


//HALAMAN UNTUK SEMUA USER
Route::get('/',function (){
    return view('index',['title'=>'Beranda']);
});