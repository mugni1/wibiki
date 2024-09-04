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

// ANIMEEEEEEEEEEEEEEEEEEE
Route::get('/dashboard/daftar-anime',[DashboardController::class,'daftarAnime'])->middleware('auth');
//ANIME-SHOW
Route::get('/dashboard/anime-detail/{id}',[DashboardController::class,'showAnime']);
//anime-ADD
Route::get('/dashboard/anime-add',[DashboardController::class,'createAnime']);
//anime-STORE
Route::post('/dashboard/anime-add/store',[DashboardController::class,'storeAnime']);
//anime EDIT
Route::get('/dashboard/anime-edit/{id}',[DashboardController::class,'editAnime']);
//anime-UPDATE
Route::put('/dashboard/anime-update/{id}',[DashboardController::class,'updateAnime']);
//anime-DELETE
Route::delete('/dashboard/anime-delete/{id}',[DashboardController::class,'dropAnime']);
//anime-TRASHED
Route::get('/dashboard/anime-trashed',[DashboardController::class,'animeTrashed']);

//EPISODEEEEEEEEEEEEEEEEEE
Route::get('/dashboard/daftar-episode',[DashboardController::class,'daftarEpisode']);
//episode-ADD
Route::get('/dashboard/episode-add',[DashboardController::class,'createEpisode']);
//episode-STORE
Route::post('/dashboard/episode-add/store',[DashboardController::class,'storeEpisode']);
//episode-EDIT
Route::get('/dashboard/episode-edit/{id}',[DashboardController::class,'editEpisode']);
//episode-UPDATE
Route::put('/dashboard/episode-update/{id}',[DashboardController::class,'updateEpisode']);
//episode-DELETE
Route::delete('/dashboard/video-delete/{id}',[DashboardController::class,'dropEpisode']);

//HALAMAN UNTUK SEMUA USER
Route::get('/',function (){
    return view('index',['title'=>'Beranda']);
});