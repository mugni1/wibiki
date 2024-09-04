<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//login 
Route::get('/login',[AuthController::class,'login'])->name('login');
//Auth
Route::post('/login-auth',[AuthController::class,'auth']);
//logout
Route::get('/logout',[AuthController::class,'logout'])->middleware('auth');

//DASHBOARD KHUSUS ADMIN
Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');

// ANIMEEEEEEEEEEEEEEEEEEE
Route::get('/dashboard/daftar-anime',[DashboardController::class,'daftarAnime'])->middleware('auth');
//ANIME-SHOW
Route::get('/dashboard/anime-detail/{id}',[DashboardController::class,'showAnime'])->middleware('auth');
//anime-ADD
Route::get('/dashboard/anime-add',[DashboardController::class,'createAnime'])->middleware('auth');
//anime-STORE
Route::post('/dashboard/anime-add/store',[DashboardController::class,'storeAnime'])->middleware('auth');
//anime EDIT
Route::get('/dashboard/anime-edit/{id}',[DashboardController::class,'editAnime'])->middleware('auth');
//anime-UPDATE
Route::put('/dashboard/anime-update/{id}',[DashboardController::class,'updateAnime'])->middleware('auth');
//anime-DELETE
Route::delete('/dashboard/anime-delete/{id}',[DashboardController::class,'dropAnime'])->middleware('auth');
//anime-TRASHED
Route::get('/dashboard/anime-trashed',[DashboardController::class,'animeTrashed'])->middleware('auth');

//EPISODEEEEEEEEEEEEEEEEEE
Route::get('/dashboard/daftar-episode',[DashboardController::class,'daftarEpisode'])->middleware('auth');
//epiaode-SHOW
Route::get('/dashboard/episode-detail/{id}',[DashboardController::class,'showEpisode'])->middleware('auth');
//episode-ADD
Route::get('/dashboard/episode-add',[DashboardController::class,'createEpisode'])->middleware('auth');
//episode-STORE
Route::post('/dashboard/episode-add/store',[DashboardController::class,'storeEpisode'])->middleware('auth');
//episode-EDIT
Route::get('/dashboard/episode-edit/{id}',[DashboardController::class,'editEpisode'])->middleware('auth');
//episode-UPDATE
Route::put('/dashboard/episode-update/{id}',[DashboardController::class,'updateEpisode'])->middleware('auth');
//episode-DELETE
Route::delete('/dashboard/video-delete/{id}',[DashboardController::class,'dropEpisode'])->middleware('auth');

//HALAMAN UNTUK SEMUA USER
Route::get('/',[HomeController::class,'index']);

//ANIME-DETAIL
Route::get('/anime-detail/{id}',[HomeController::class,'show']);
//EPISODE-DETAIL
Route::get('episode-detail/{id}',[HomeController::class,'showEpisode']);