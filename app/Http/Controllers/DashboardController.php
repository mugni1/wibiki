<?php

namespace App\Http\Controllers;

use App\Models\anime;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $animes = anime::orderBy('id','DESC')->paginate(10);
        return view('admin.dashboard',['title'=>'Home','animes'=>$animes]);
    }

    // ANIME
    public  function daftarAnime(){
        $animes = anime::paginate(10);
        $videos = anime::paginate();
        return view('admin.daftar-anime',['title'=>'Daftar Anime','animes'=>$animes,'videos'=>$videos]);
    }
    //Show Detail anime 
    public function show($id){
        $anime = anime::with('videos')->findOrFail($id);
        return view('admin.anime-detail',['title'=>'Anime Detail','anime'=>$anime]);
    }
}