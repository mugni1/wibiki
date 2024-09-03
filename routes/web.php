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
//show-detail-ANIME
Route::get('/dashboard/anime-detail/{id}',[DashboardController::class,'showAnime']);
//add-ANIME
Route::get('/dashboard/anime-add',[DashboardController::class,'createAnime']);
//store-ANIME
Route::post('/dashboard/anime-add/store',[DashboardController::class,'storeAnime']);
//edit ANIME
Route::get('/dashboard/anime-edit/{id}',[DashboardController::class,'editAnime']);
//update-ANIME
Route::put('/dashboard/anime-update/{id}',[DashboardController::class,'updateAnime']);
//delete-ANIME
Route::delete('/dashboard/anime-delete/{id}',[DashboardController::class,'dropAnime']);

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