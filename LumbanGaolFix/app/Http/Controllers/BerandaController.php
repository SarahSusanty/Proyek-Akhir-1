<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_web;
use Illuminate\Support\Facades\DB;
class BerandaController extends Controller
{
    //
    public function index(){
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $_link = data_web::find(7);
        $_slider = data_web::find(1);
        $temukan = data_web::find(3);
        $tentang = data_web::find(12);
        $crfoot = data_web::find(14);
        $sekilas = data_web::find(2);
        $sliderSpef = []; 
        $temp = explode("#", $_slider->information);
        for ($i=0; $i < count($temp); $i++) { 
            $sliderSpef[$i] = explode("|", $temp[$i]);
        }
        $sliderPic =  explode("#", $_slider->picture);
        $linkterkait = explode("|", $_link->information);
        $informasi = $informasi = DB::table('informations')
        ->join('pictures', 'informations.idDisplay', '=', 'pictures.id')
        ->select('informations.*', 'pictures.name')->limit(3)->orderBy('created_at')
        ->get();
        return view('welcome',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'linkterkait'=>$linkterkait,
            'sliderSpef'=>$sliderSpef,
            'sliderPic'=>$sliderPic,
            'temukan'=>$temukan,
            'tentang'=>$tentang,
            'crfoot'=>$crfoot,
            'informasi'=>$informasi,
            'sekilas'=>$sekilas,
        ]);
    }
}
