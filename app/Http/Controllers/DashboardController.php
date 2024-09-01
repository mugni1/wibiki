<?php

namespace App\Http\Controllers;

use App\Models\anime;
use App\Models\video;
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
    // Show ANIME
    public function showAnime($id){
        $anime = anime::with('videos')->findOrFail($id);
        return view('admin.anime-detail',['title'=>'Anime Detail','anime'=>$anime]);
    }

    public function daftarEpisode(){
         $videos = video::with('anime')->paginate(10);
         return view('admin.daftar-episode',['title'=>'Daftar Episode','videos'=>$videos]);
    }
}