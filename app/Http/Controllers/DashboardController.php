<?php

namespace App\Http\Controllers;

use App\Http\Requests\animeStoreRequest;
use App\Models\anime;
use App\Models\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class DashboardController extends Controller
{
    //HALAMAN UTAMA DASHBOARD
    public function index(){
        $animes = anime::orderBy('id','DESC')->paginate(10);
        $videos = video::paginate(10);
        return view('admin.dashboard',['title'=>'Home','animes'=>$animes,'videos'=>$videos]);
    }

    // ANIME-LIST
    public  function daftarAnime(Request $request){
        $keyword = $request->keywords;
        
        $animes = anime::orderBy('id','DESC')->where('name','LIKE','%'.$keyword.'%')->orWhere('status','LIKE','%'.$keyword.'%')->paginate(10);
        return view('admin.daftar-anime',['title'=>'Daftar Anime','animes'=>$animes]);
    }
    // ANIME-SHOW
    public function showAnime($id){
        $anime = anime::with('videos')->findOrFail($id);
        return view('admin.anime-detail',['title'=>'Anime Detail','anime'=>$anime]);
    }
    // ANIME-ADD
    public function createAnime(){
        return view('admin.anime-add',['title'=>"Add New Anime"]);
    }
    // ANIME-STORE
    public function storeAnime(animeStoreRequest $request){
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
    // ANIME-EDIT
    public function editAnime($id){
        $anime = anime::findOrFail($id);
        return view('admin.anime-edit',['title'=>'Edit Anime','anime'=>$anime]);
    }
    // ANIME-UPDATE
    public function updateAnime(Request $request,$id){
        $nameImage = $request->imagebawaan;

        if ($request->file('image')) {
            $ekstensiFile = $request->file('image')->getClientOriginalExtension();
            $nameAnime = strtolower(str_replace(' ','', $request->name));
            $nameImage = $nameAnime . '-' . now()->timestamp . '.' . $ekstensiFile;
            $request->file('image')->storeAs('img', $nameImage);
        }

        $dataAnime = $request->all();
        $dataAnime['image'] = $nameImage;

        $update = anime::findOrFail($id)->update($dataAnime);

        if ($update) {
           Session::flash('status','success');
           Session::flash('pesan',"Berhasil Update : $request->name");
        }

        return redirect('/dashboard/daftar-anime');
    }
    // ANIME-DELETE
    public function dropAnime(Request $request,$id){
        $drop = anime::findOrFail($id)->delete();
        if ($drop) {
            Session::flash('status','success');
            Session::flash('pesan',"Berhasil Menghapus Anime : $request->name");
        }
        //redirect
        return redirect('/dashboard/daftar-anime');
    }
    // ANIME-TRASHED
    public function animeTrashed(){
        $animes = anime::onlyTrashed()->paginate(10);
        return view('admin.anime-trashed',['title'=>'Anime Trashed','animes'=>$animes]);
    }


    // EPISODE
    public function daftarEpisode(Request $request){
        $keyword = $request->keywords;
        $videos = video::with('anime')
        ->whereHas('anime',function ($query) use ($keyword){
            $query->where('name','LIKE','%'.$keyword.'%');
        })
        ->orWhere('name','LIKE','%'.$keyword.'%')
        ->paginate(10);
        return view('admin.daftar-episode',['title'=>'Daftar Episode','videos'=>$videos]);
    }
    // EPISODE-SHOW
    public function showEpisode($id){
        $video = video::with('anime')->findOrFail($id);
        return view('admin.episode-detail',['title'=>'Detail Episode','video'=>$video]);
    }
    // EPISODE-ADD
    public function createEpisode(){
         $animes = anime::get(['id','name']);
         return view('admin.episode-add',['title'=>'Add New Episode','animes'=>$animes]);
    }
    // EPISODE-STORE
    public function storeEpisode(Request $request){
        $store = video::create($request->all());
        if ($store) {
            Session::flash('status','success');
            Session::flash('pesan',"Berhasil Menambah episode baru");
        }
        
        return redirect('/dashboard/daftar-anime');
    }
    //EPISODE-EDIT
    public function editEpisode($id){
        $video = video::findOrFail($id);
        $animes = anime::get(['id','name']);
        return view('admin.episode-edit',['title'=>'Edit Episode','video'=>$video,'animes'=>$animes]);
    }
    //EPISODE-UPDATE
    public function updateEpisode(Request $request,$id){
        $video = video::findOrFail($id)->update($request->all());
        
        if ($video) {
            Session::flash('status','success');
            Session::flash('pesan',"Berhasil Update : $request->name");
        }

        return redirect('/dashboard/daftar-episode');
    }

    //EPISODE-DELETE 
    public function dropEpisode(Request $request ,$id){
        $drop = video::findOrFail($id)->delete();
        if ($drop) {
            Session::flash('status','success');
            Session::flash('pesan',"Berhasil menghapus episode : $request->name");
        }

        return redirect('/dashboard/daftar-episode');
    }
}