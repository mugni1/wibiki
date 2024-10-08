<?php

namespace App\Http\Controllers;

use App\Models\anime;
use App\Models\video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        //episdoe teerbaru
        $videos = video::with('anime')->orderBy('id','DESC')->simplePaginate(6);
        //anime terbaru
        $animesxl = anime::orderBY('id','DESC')->simplePaginate(12);
        $animesmd = anime::orderBY('id','DESC')->simplePaginate(10);
        return view('index',['title'=>"Home", 'videos'=>$videos,'animesmd'=>$animesmd,'animesxl'=>$animesxl]);
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

    // DAFTAR ANIME
    public function daftarAnime(Request $request){
        $keyword = $request->keyword;
        $animesxl = anime::orderBY('id','DESC')->where('name','LIKE','%'. $keyword .'%')->paginate(12);
        $animesmd = anime::orderBY('id','DESC')->where('name','LIKE','%'. $keyword .'%')->paginate(10);
        return view('daftar-anime',['title'=>'Daftar Anime','animesmd'=>$animesmd,'animesxl'=>$animesxl]);
    }
}