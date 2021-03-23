<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\data_web;
class InformasiController extends Controller
{
    //
    public function index(Request $request){
        if($request->session()->has('InformasiCari')){
			$request->session()->forget('InformasiCari');
		}
        if($request->session()->has('InformasiKategori')){
			$request->session()->forget('InformasiKategori');
		}
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $background = data_web::find(8);
        $header = data_web::find(9);
        $informasi = DB::table('informations')
        ->join("pictures", 'informations.idDisplay', 'pictures.id')
        ->select('informations.*','pictures.name')
        ->orderBy('created_at','DESC')
        ->paginate(7);
        $rekomendasi = DB::table('informations')
        ->join("pictures", 'informations.idDisplay', 'pictures.id')
        ->select('informations.*','pictures.name')
        ->orderBy('view', 'DESC')
        ->limit(4)
        ->get();
        $category = DB::table('category')
        ->orderBy('category')
        ->select('category.*', DB::raw('(SELECT COUNT(*) FROM informations WHERE idCategory = category.id GROUP BY idCategory)as jumlah'))
        ->get();
        return view('informasi.index',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
            'bgHead'=>$background,
            'header'=>$header,
            'informasi'=>$informasi,
            'rekomendasi'=>$rekomendasi,
            'category'=>$category
        ]);
    }
    public function search(Request $request){
        if($request->session()->has('InformasiKategori')){
			$request->session()->forget('InformasiKategori');
		}
        $request->session()->put('InformasiCari',$request->key);
        $key = $request->key;
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $background = data_web::find(8);
        $header = data_web::find(9);
        $informasi = DB::table('informations')
        ->join("pictures", 'informations.idDisplay', 'pictures.id')
        ->select('informations.*','pictures.name')
        ->where('informations.description','like','%'.$key.'%')
        ->orWhere('informations.title','like','%'.$key.'%')
        ->orderBy('created_at','DESC')
        ->paginate(7);
        $rekomendasi = DB::table('informations')
        ->join("pictures", 'informations.idDisplay', 'pictures.id')
        ->select('informations.*','pictures.name')
        ->orderBy('view', 'DESC')
        ->limit(4)
        ->get();
        $category = DB::table('category')
        ->orderBy('category')
        ->select('category.*', DB::raw('(SELECT COUNT(*) FROM informations WHERE idCategory = category.id GROUP BY idCategory)as jumlah'))
        ->get();
        return view('informasi.index',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
            'bgHead'=>$background,
            'header'=>$header,
            'informasi'=>$informasi,
            'rekomendasi'=>$rekomendasi,
            'category'=>$category
        ]);
    }
    public function category(Request $request, $_id){
        if($request->session()->has('InformasiCari')){
			$request->session()->forget('InformasiCari');
        }
        $id = base64_decode($_id);
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $background = data_web::find(8);
        $header = data_web::find(9);
        $informasi = DB::table('informations')
        ->join("pictures", 'informations.idDisplay', 'pictures.id')
        ->select('informations.*','pictures.name')
        ->where('informations.idCategory','=',$id)
        ->orderBy('created_at','DESC')
        ->paginate(7);
        $rekomendasi = DB::table('informations')
        ->join("pictures", 'informations.idDisplay', 'pictures.id')
        ->select('informations.*','pictures.name')
        ->orderBy('view', 'DESC')
        ->limit(4)
        ->get();
        $category = DB::table('category')
        ->orderBy('category')
        ->select('category.*', DB::raw('(SELECT COUNT(*) FROM informations WHERE idCategory = category.id GROUP BY idCategory)as jumlah'))
        ->get();
        $categoryNow = DB::table('category')
        ->where('id', $id)
        ->first();
        $request->session()->put('InformasiKategori',$categoryNow->category);
        return view('informasi.index',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
            'bgHead'=>$background,
            'header'=>$header,
            'informasi'=>$informasi,
            'rekomendasi'=>$rekomendasi,
            'category'=>$category
        ]);
    }
    public function read(Request $request, $_id){
        $id = base64_decode($_id);
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $background = data_web::find(8);
        $header = data_web::find(9);
        $informasi = DB::table('informations')
        ->join("pictures", 'informations.idDisplay', 'pictures.id')
        ->select('informations.*','pictures.name')
        ->where('informations.id','=',$id)
        ->first();
        DB::table('informations')->where('informations.id','=',$id)->update([
                'view'=>($informasi->view + 1)
            ]);
        $rekomendasi = DB::table('informations')
        ->join("pictures", 'informations.idDisplay', 'pictures.id')
        ->select('informations.*','pictures.name')
        ->orderBy('view', 'DESC')
        ->limit(4)
        ->get();
        $category = DB::table('category')
        ->orderBy('category')
        ->select('category.*', DB::raw('(SELECT COUNT(*) FROM informations WHERE idCategory = category.id GROUP BY idCategory)as jumlah'))
        ->get();
        $categoryNow = DB::table('category')
        ->where('id', $informasi->idCategory)
        ->first();
        $request->session()->put('InformasiKategori',$categoryNow->category);
        return view('informasi.read',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
            'bgHead'=>$background,
            'header'=>$header,
            'informasi'=>$informasi,
            'rekomendasi'=>$rekomendasi,
            'category'=>$category
        ]);
    }
}
