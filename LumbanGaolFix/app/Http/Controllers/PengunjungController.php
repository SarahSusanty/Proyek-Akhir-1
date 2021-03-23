<?php

namespace App\Http\Controllers;

use App\data_web;
use App\informations;
use App\aspirations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;
class PengunjungController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['pengunjung', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $welcome = data_web::find(13);

        return view('pengunjung.index',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
            'welcome'=>$welcome
        ]);
    }
    public function aspirasi()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $aspirasi = DB::table('aspirations')
        ->where('idUser',"=",7)
        ->orderByDesc('created_at')
        ->paginate(5);
        return view('pengunjung.aspirasi',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
            'aspirasi'=>$aspirasi,
        ]);
    }
    public function paginateAspirasi($status)
    {
        $date = date('Y-m-d H:i:s', time() - (60 * 60 * 24 * 3));
        if ($status == 'all') {
            $aspirasi = DB::table('aspirations')
                ->join('users', 'users.id', 'aspirations.idUser')
                ->select('users.name', 'users.profile', 'aspirations.*')
                ->where('idUser', Auth::user()->id)
                ->orderBy('created_at', 'DESC')
                ->paginate(8);
        } else {
            $aspirasi = DB::table('aspirations')
                ->join('users', 'users.id', 'aspirations.idUser')
                ->select('users.name', 'users.profile', 'aspirations.*')
                ->where('aspirations.status', $status)
                ->where('idUser', Auth::user()->id)
                ->orderBy('created_at', 'DESC')
                ->paginate(8);
        }
        return view('pengunjung.rowAspirasi', [
            'aspirasi' => $aspirasi,
            'limitDate'=>$date
        ]);
    }
    public function proses(Request $request)
    {
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
        return response()->json([
            'success'=>true
        ]);
    }
    public function prosesEdit(Request $request)
    {
        $this->validate($request,[
            "topic"=>"required|max:255",
            "content"=>"required"
        ]);
        $temp = aspirations::find($request->idAspirasi);
        $temp->topic = $request->topic;
        $temp->aspiration = $request->content;
        $temp->status = 'waiting';
        $temp->save();
        return response()->json([
            'success'=>true
        ]);
    }
    public function aspirasiBaru()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        return view('pengunjung.aspirasiBaru',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
        ]);
    }
    public function aspirasiEdit($_id)
    {
        $id = base64_decode($_id);
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $aspirasi = aspirations::find($id);
        return view('pengunjung.aspirasiEdit',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
            'aspirasi'=>$aspirasi
        ]);
    }
    public function forum()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);

        return view('pengunjung.forum',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
        ]);
    }
    public function forumMessage($_id)
    {
        $id = base64_decode($_id);
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $forums = DB::table('forums')->where('id', $id)->first();
        return view('pengunjung.messages', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'id' => $id,
            'forums' => $forums,
        ]);
    }
    public function forumMessagesRow($id, $read)
    {
        if ($read == 'yes') {
            $temp = DB::table('message_reads')->select('idMessage')
                ->where('idUser', Auth::user()->id)
                ->get();
            if ($temp->isEmpty()) {
                $temp2 = DB::table('messages')
                    ->select('id')
                    ->where('idUser', '!=', Auth::user()->id)
                    ->where('idForum', $id)
                    ->get();
                foreach ($temp2 as $item) {
                    DB::table('message_reads')->insert([
                        'idMessage' => $item->id,
                        'idUser' => Auth::user()->id,
                    ]);
                }
            } else {
                $arr = [];
                foreach ($temp as $item) {
                    array_push($arr, $item->idMessage);
                }
                $temp2 = DB::table('messages')
                    ->select('id')
                    ->where('idUser', '!=', Auth::user()->id)
                    ->whereNotIn('id', $arr)
                    ->where('idForum', $id)
                    ->get();
                foreach ($temp2 as $item) {
                    DB::table('message_reads')->insert([
                        'idMessage' => $item->id,
                        'idUser' => Auth::user()->id,
                    ]);
                }
            }
        }
        $messages = DB::table('messages')->where('idForum', $id)
            ->select('messages.*', 'users.name', 'users.id as idUser')
            ->join('users', 'messages.idUser', 'users.id')
            ->orderby('created_at')
            ->get();
        return view('pengunjung.rowMessages', [
            'messages' => $messages,
        ]);
    }
    public function forumJoin()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        return view('pengunjung.forumjoin',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot
        ]);
    }
    public function forumMenunggu()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        return view('pengunjung.forummenunggu',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot
        ]);
    }
    public function forumDitolak()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        return view('pengunjung.forumditolak',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot
        ]);
    }
    public function deleteAspirasi(Request $request){
        DB::table('aspirations')->where('id', $request->idAspirasi)->delete();
        return response()->json([
            'success'=>true
        ]);
    }
    public function requestJoinForum($_id){
        $id = base64_decode($_id);
        DB::table('forum_participants')->insert(
            [
                'idUser'=>Auth::user()->id,
                'idForum'=>$id,
                'status'=>'waiting'
            ]
            );
        return response()->json([
            'success'=>true
        ]);
    }
    public function forumMessagesSend(Request $request)
    {
        $tempDocument = null;
        $tempPicture = null;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $name_file = "Lumban-Gaol_Message-" . rand() . "-" . time() . "." . $file->getClientOriginalExtension();
            $tujuanUpload = 'uploads/message/img';
            $file->move($tujuanUpload, $name_file);
            $tempPicture = $name_file;
        } else if ($request->hasFile('document')) {
            $file = $request->file('document');
            $name_file = "Lumban-Gaol_Message-" . rand() . "-" . time() . "." . $file->getClientOriginalExtension();
            $tujuanUpload = 'uploads/message/document';
            $file->move($tujuanUpload, $name_file);
            $tempDocument = $name_file;
        }
        $messages = DB::table('messages')->insert([
            'idForum' => $request->idForum,
            'idUser' => Auth::user()->id,
            'message' => $request->msg,
            'picture' => $tempPicture,
            'document' => $tempDocument,
        ]);
        $run = DB::table('forums')->where('id', $request->idForum)->update([
            'updated_at' => Carbon::now(),
        ]);
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true,
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = ['forum'=> $request->idForum];
        $pusher->trigger('my-channel', 'my-event', $data);
        return response()->json([
            'success' => true,
        ]);
    }
    public function forumMessagesDelete($id){
        $temp = DB::table('messages')->where('id', $id)->first();
        if($temp->picture != Null){
            unlink('uploads/message/img/'.$temp->picture);
        }
        if($temp->document != Null){
            unlink('uploads/message/document/'.$temp->document);
        }
        DB::table('messages')->where('id', $id)->delete();
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true,
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = ['forum'=> $temp->idForum];
        $pusher->trigger('my-channel', 'my-event', $data);
        return response()->json([
            'success' => true,
        ]);
    }
    public function forumMenungguRow(Request $request)
    {
        $forums = DB::table('forums')
            ->join('forum_participants', 'forums.id','forum_participants.idForum')
            ->select('forums.*',
                DB::raw("(SELECT COUNT(*) FROM messages a WHERE (SELECT idUser FROM message_reads WHERE idMessage=a.id AND idUser =" . Auth::user()->id . ") IS NULL AND idForum = forums.id AND idUser != " . Auth::user()->id . ") as counts"))
            ->where('idUser',Auth::user()->id)
            ->where('status','waiting')
            ->where('name','like','%'.$request->key.'%')
            ->orderByDesc('updated_at')
            ->paginate(8);
        return view('pengunjung.rowForumsMenunggu',[
            'forums'=>$forums
        ]);
    }
    public function forumDitolakRow(Request $request)
    {
        $forums = DB::table('forums')
            ->join('forum_participants', 'forums.id','forum_participants.idForum')
            ->select('forums.*',
                DB::raw("(SELECT COUNT(*) FROM messages a WHERE (SELECT idUser FROM message_reads WHERE idMessage=a.id AND idUser =" . Auth::user()->id . ") IS NULL AND idForum = forums.id AND idUser != " . Auth::user()->id . ") as counts"))
            ->where('idUser',Auth::user()->id)
            ->where('status','rejected')
            ->where('name','like','%'.$request->key.'%')
            ->orderByDesc('updated_at')
            ->paginate(8);
        return view('pengunjung.rowForumsDitolak',[
            'forums'=>$forums
        ]);
    }
    public function forumKeluar(Request $request){
        DB::table('forum_participants')->where('idUser',Auth::user()->id)->where('idForum', $request->idForum)->delete();
        return response()->json([
            'success'=>true
        ]);
    }
    public function forumCoba(Request $request){
        DB::table('forum_participants')->where('idUser',Auth::user()->id)->where('idForum', $request->idForum)->update(
            [
                'status'=>'waiting',
                'created_at'=>Carbon::now()
            ]
        );
        return response()->json([
            'success'=>true
        ]);
    }
    public function liveSearchForumJoin(Request $request){
        $temp = [];
        $idForum = DB::table('forum_participants')->where('idUser', Auth::user()->id)->get();
        foreach($idForum  as $item){
            array_push($temp, $item->idForum);
        }
        $forums = DB::table('forums')
        ->select('forums.*')
        ->whereNotIn('id', $temp)
        ->where('name','like','%'.$request->key.'%')
        ->orderByDesc('created_at')
        ->paginate(8);

        return view('pengunjung.rowForumsJoin', [
            'forums'=>$forums
        ]);
    }
    public function liveSearchForum(Request $request){
        $forums = DB::table('forums')
            ->join('forum_participants', 'forums.id','forum_participants.idForum')
            ->select('forums.*',
                DB::raw("(SELECT COUNT(*) FROM messages a WHERE (SELECT idUser FROM message_reads WHERE idMessage=a.id AND idUser =" . Auth::user()->id . ") IS NULL AND idForum = forums.id AND idUser != " . Auth::user()->id . ") as counts"))
            ->where('idUser',Auth::user()->id)
            ->where('status','approved')
            ->where('name','like','%'.$request->key.'%')
            ->orderByDesc('updated_at')
            ->paginate(8);
        return view('pengunjung.rowForums',[
            'forums'=>$forums
        ]);
    }
    public function dataDiri()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        return view('pengunjung.datadiri',[
            'logoweb'=>$logoweb,
            'logolembaga'=>$logolembaga,
            'crfoot'=>$crfoot,
        ]);
    }
    public function dataDiriProfile(Request $request)
    {
        $name_file = $request->oldFile;
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $name_file = "Lumban-Gaol_userProfile-" . rand() . "-" . time() . "." . $file->getClientOriginalExtension();
            $tujuanUpload = 'uploads/img/UserProfile';
            $file->move($tujuanUpload, $name_file);
            if ($request->oldFile != "LumbanGaol-Default-UserProfil.png") {
                unlink($tujuanUpload . '/' . $request->oldFile);
            }
        }
        DB::table('users')->where('id', Auth::user()->id)->update([
            'profile' => $name_file,
        ]);
        return Response()->json([
            "Success" => 'Success',
        ]);
    }
    public function dataDiriBiodata(Request $request)
    {
        DB::table('users')->where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'tanggalLahir' => $request->tanggalLahir,
            'jenisKelamin' => $request->jenisKelamin,
            'alamat' => $request->alamat,
        ]);
        return Response()->json([
            "Success" => 'Success',
        ]);
    }
}
