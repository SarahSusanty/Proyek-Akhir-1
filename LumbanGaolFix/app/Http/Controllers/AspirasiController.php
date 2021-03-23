<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\data_web;
use App\aspirations;
use App\replays;
use Auth;
class AspirasiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index(Request $request){
        if($request->session()->has('AspirasiCari')){
			$request->session()->forget('AspirasiCari');
		}
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $background = data_web::find(11);
        $header = data_web::find(10);
        $aspirasi = DB::table('aspirations')
        ->join('users', 'aspirations.idUser', '=','users.id')
        ->select("aspirations.*", "users.profile", "users.name",
            DB::raw("(SELECT COUNT(*) FROM replays
            WHERE replays.idAspiration = aspirations.id
            GROUP BY replays.idAspiration) as Jumlah_Count")
        )
        ->where('aspirations.status', '=','approved')
        ->orderBy('aspirations.created_at', 'DESC')
        ->paginate(8);
        $rekomendasi = DB::table('aspirations')
        ->select("aspirations.*",
            DB::raw("(SELECT COUNT(*) FROM replays
            WHERE replays.idAspiration = aspirations.id
            GROUP BY replays.idAspiration) as Jumlah_Count")
        )
        ->where('aspirations.status', '=','approved')
        ->orderBy('Jumlah_Count', 'DESC')
        ->limit(5)
        ->get();
        return view('aspirasi.index',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
            'bgHead'=>$background,
            'header'=>$header,
            'aspirasi'=>$aspirasi,
            'rekomendasi'=>$rekomendasi,
            ]);
    }
    public function search(Request $request){
        $request->session()->put('AspirasiCari',$request->key);
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $background = data_web::find(11);
        $header = data_web::find(10);
        $aspirasi = DB::table('aspirations')
        ->join('users', 'aspirations.idUser', '=','users.id')
        ->select("aspirations.*", "users.profile", "users.name",
            DB::raw("(SELECT COUNT(*) FROM replays
            WHERE replays.idAspiration = aspirations.id
            GROUP BY replays.idAspiration) as Jumlah_Count")
        )
        ->where('aspirations.status', '=','approved')
        ->where(function($q) use ($request){
            $q->where('aspirations.topic', 'like','%'.$request->key.'%')
        ->orWhere('aspirations.aspiration', 'like','%'.$request->key.'%');
        })
        ->orderBy('aspirations.created_at', 'DESC')
        ->paginate(8);
        $rekomendasi = DB::table('aspirations')
        ->select("aspirations.*",
            DB::raw("(SELECT COUNT(*) FROM replays
            WHERE replays.idAspiration = aspirations.id
            GROUP BY replays.idAspiration) as Jumlah_Count")
        )
        ->where('aspirations.status', '=','approved')
        ->orderBy('Jumlah_Count', 'DESC')
        ->limit(5)
        ->get();
        return view('aspirasi.index',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
            'bgHead'=>$background,
            'header'=>$header,
            'aspirasi'=>$aspirasi,
            'rekomendasi'=>$rekomendasi,
            ]);
    }
    public function showReplay($_id){
        $id = base64_decode($_id);
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $background = data_web::find(11);
        $header = data_web::find(10);
        $aspirasi = DB::table('aspirations')
        ->join('users', 'aspirations.idUser', '=','users.id')
        ->select("aspirations.*", "users.profile", "users.name",
            DB::raw("(SELECT COUNT(*) FROM replays
            WHERE replays.idAspiration = aspirations.id
            GROUP BY replays.idAspiration) as Jumlah_Count")
        )
        ->where('aspirations.status', '=','approved')
        ->Where('aspirations.id', '=',$id)
        ->first();
        $rekomendasi = DB::table('aspirations')
        ->select("aspirations.*",
            DB::raw("(SELECT COUNT(*) FROM replays
            WHERE replays.idAspiration = aspirations.id
            GROUP BY replays.idAspiration) as Jumlah_Count")
        )
        ->where('aspirations.status', '=','approved')
        ->orderBy('Jumlah_Count', 'DESC')
        ->limit(5)
        ->get();
        $replays = DB::table('replays')
        ->join('users', 'replays.idUser', '=','users.id')
        ->select("replays.*",  "users.profile", "users.name")
        ->where("replays.idAspiration","=",$id)
        ->orderBy("replays.created_at")
        ->paginate(15);
        return view('aspirasi.tanggapan',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
            'bgHead'=>$background,
            'header'=>$header,
            'aspirasi'=>$aspirasi,
            'rekomendasi'=>$rekomendasi,
            'replays'=>$replays
            ]);
    }
    public function addAspiration(Request $request){
        $this->validate($request,[
            "topic"=>"required|max:255",
            "content"=>"required"
        ]);
        aspirations::create([
            "topic"=>$request->topic,
            "aspiration"=>$request->content,
            "idUser"=>Auth::user()->id,
            "status"=>"waiting"
        ]);
        return redirect()->route('aspirasi');
    }
    public function addReplay(Request $request){
        $this->validate($request,[
            "content"=>"required"
        ]);
        replays::create([
            "replay"=>$request->content,
            "idUser"=>Auth::user()->id,
            "idAspiration"=>$request->idAspirasi
        ]);
        return redirect()->route('aspirasi.Replay',base64_encode($request->idAspirasi));
    }
    public function deleteReplay($_id, $_idAspirasi){
        $id = base64_decode($_id);
        $idAspirasi = base64_decode($_idAspirasi);

        $temp = replays::find($id);
        $temp->delete();

        return redirect()->route('aspirasi.Replay',base64_encode($idAspirasi));
    }
}
