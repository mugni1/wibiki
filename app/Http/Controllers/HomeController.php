<?php

namespace App\Http\Controllers;

use App\Models\anime;
use App\Models\video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $keyword = $request->keyword;
        //episdoe teerbaru
        $videos = video::with('anime')->orderBy('id','DESC')->paginate(10);
        //anime terbaru
        $animes = anime::orderBy('id','DESC')
        ->where('name','LIKE','%'.$keyword.'%')
        ->paginate(12);
        return view('index',['title'=>"Home", 'videos'=>$videos,'animes'=>$animes]);
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