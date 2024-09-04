<?php

namespace App\Http\Controllers;

use App\Models\anime;
use App\Models\video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $videos = video::with('anime')->orderBy('id','DESC')->paginate(10);
        $animes = anime::orderBy('id','DESC')->paginate(16);
        return view('index',['title'=>"Hone", 'videos'=>$videos,'animes'=>$animes]);
    }

    public function show($id){
        $anime = anime::with('videos')->findOrFail($id);
        return view('anime-detail',['title'=>'Anime Detail','anime'=>$anime]);
    }
     // EPISODE-SHOW
     public function showEpisode($id){
        $video = video::with('anime')->findOrFail($id);
        return view('episode-detail',['title'=>'Detail Episode','video'=>$video]);
    }
}