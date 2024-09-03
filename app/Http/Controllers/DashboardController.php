<?php

namespace App\Http\Controllers;

use App\Http\Requests\animeStoreRequest;
use App\Models\anime;
use App\Models\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class DashboardController extends Controller
{
    //HALAMAN UTAMA DASHBOARD
    public function index(){
        $animes = anime::orderBy('id','DESC')->paginate(10);
        $videos = video::paginate(10);
        return view('admin.dashboard',['title'=>'Home','animes'=>$animes,'videos'=>$videos]);
    }

    // ANIME
    public  function daftarAnime(Request $request){
        $keyword = $request->keywords;
        
        $animes = anime::orderBy('id','DESC')->where('name','LIKE','%'.$keyword.'%')->orWhere('status','LIKE','%'.$keyword.'%')->paginate(10);
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

    //edit-ANIME
    public function editAnime($id){
        $anime = anime::findOrFail($id);
        return view('admin.anime-edit',['title'=>'Edit Anime','anime'=>$anime]);
    }
    //update-ANIME
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

    //delete-ANIME
    public function dropAnime(Request $request,$id){
        $drop = anime::findOrFail($id)->delete();
        if ($drop) {
            Session::flash('status','success');
            Session::flash('pesan',"Berhasil Menghapus Anime : $request->name");
        }
        //redirect
        return redirect('/dashboard/daftar-anime');
    }

    //SHOW EPISODE
    public function daftarEpisode(){
         $videos = video::with('anime')->paginate(10);
         return view('admin.daftar-episode',['title'=>'Daftar Episode','videos'=>$videos]);
    }
}