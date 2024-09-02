<?php

namespace App\Http\Controllers;

use App\Models\anime;
use App\Models\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    //HALAMAN UTAMA DASHBOARD
    public function index(){
        $animes = anime::orderBy('id','DESC')->paginate(10);
        $videos = video::paginate(10);
        return view('admin.dashboard',['title'=>'Home','animes'=>$animes,'videos'=>$videos]);
    }

    // ANIME
    public  function daftarAnime(){
        $animes = anime::orderBy('id','DESC')->paginate(10);
        return view('admin.daftar-anime',['title'=>'Daftar Anime','animes'=>$animes]);
    }
    // Show ANIME
    public function showAnime($id){
        $anime = anime::with('videos')->findOrFail($id);
        return view('admin.anime-detail',['title'=>'Anime Detail','anime'=>$anime]);
    }
    //add-ANIME
    public function createAnime(){
        return view('admin.anime-add',['title'=>"Add New Anime"]);
    }
    //store-ANIME
    public function storeAnime(Request $request){
        //default nameImage kosong
        $nameImage=null;

        //new nameImage
        if($request->file('image')){
            $ekstensiImage = $request->file('image')->getClientOriginalExtension();// abil ekstensi image
            $nameAnime = strtolower(str_replace(' ','', $request->name));//ambil name anime
            $nameImage = $nameAnime.'-'.now()->timestamp.'.'.$ekstensiImage;
            //simpan ke dtorage
            $request->file('image')->storeAs('img', $nameImage);
        };

        //simpan ke database 
        $dataImage = $request->all();
        $dataImage['image'] = $nameImage;
        
        //buat session flash succes jika berhasil di simpan ke database
        $store = anime::create($dataImage);
        if ($store) {
           Session::flash('status','succsess');
           Session::flash('pesan',"Berhasil Menambah Anime $request->name");
        }
        
        //redirect ke dashboard daftar anime
       return redirect('/dashboard/daftar-anime');
    }


    public function daftarEpisode(){
         $videos = video::with('anime')->paginate(10);
         return view('admin.daftar-episode',['title'=>'Daftar Episode','videos'=>$videos]);
    }
}