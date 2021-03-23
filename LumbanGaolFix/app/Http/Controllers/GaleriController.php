<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\data_web;
class GaleriController extends Controller
{
    //
    public function index(){
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $albums = DB::table('albums')
        ->join('pictures', 'albums.idDisplay','pictures.id')
        ->select('albums.*','pictures.name as picture','pictures.location')
        ->paginate(4);
        return view('galeri.index',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
            'albums'=>$albums
        ]);
    }
    public function showAlbum(Request $request, $id){
        $request->session()->put('idAlbum',$id);
        $picture = DB::table('album_picture')
        ->join('pictures','album_picture.idPicture','pictures.id')
        ->select('pictures.name')
        ->where('album_picture.idAlbum', $id)
        ->get();
        $video = DB::table('album_video')
        ->join('videos','album_video.idVideo','videos.id')
        ->select('videos.name')
        ->where('album_video.idAlbum', $id)
        ->get();
        return view('galeri.show',[
            'video'=>$video,
            'picture'=>$picture
        ]);
    }
}
