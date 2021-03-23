<?php

namespace App\Http\Controllers;

use App\data_web;
use App\informations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class AdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['admin', 'verified']);
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
        $welcome = data_web::find(4);
        $informations = DB::table('informations')
            ->count();
        $aspirations = DB::table('aspirations')
            ->where('status', 'approved')
            ->count();
        $forums = DB::table('forums')
            ->count();
        $users = DB::table('users')
            ->count();
        return view('admin.index', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'welcome' => $welcome,
            'information' => $informations,
            'aspirations' => $aspirations,
            'forums' => $forums,
            'users' => $users,
        ]);
    }
    public function aspirasi()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $aspirasi = DB::table('aspirations')
            ->join('users', 'users.id', 'aspirations.idUser')
            ->select('users.name', 'users.profile', 'aspirations.*')
            ->where('aspirations.status', 'approved')
            ->orWhere('aspirations.status', 'rejected')
            ->orderBy('created_at', 'DESC')
            ->paginate(1);
        return view('admin.aspirasi', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'aspirations' => $aspirasi,
        ]);
    }
    public function paginateAspirasi($status)
    {
        if ($status == 'all') {
            $aspirasi = DB::table('aspirations')
                ->join('users', 'users.id', 'aspirations.idUser')
                ->select('users.name', 'users.profile', 'aspirations.*')
                ->where('aspirations.status', 'approved')
                ->orWhere('aspirations.status', 'rejected')
                ->orderBy('created_at', 'DESC')
                ->paginate(8);
        } else {
            $aspirasi = DB::table('aspirations')
                ->join('users', 'users.id', 'aspirations.idUser')
                ->select('users.name', 'users.profile', 'aspirations.*')
                ->where('aspirations.status', $status)
                ->orderBy('created_at', 'DESC')
                ->paginate(8);
        }
        return view('admin.rowAspirasi', [
            'aspirations' => $aspirasi,
        ]);
    }
    public function aspirasiMenunggu()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $aspirasi = DB::table('aspirations')
            ->join('users', 'users.id', 'aspirations.idUser')
            ->select('users.name', 'users.profile', 'aspirations.*')
            ->where('aspirations.status', 'waiting')
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        return view('admin.aspirasiMenunggu', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'aspirations' => $aspirasi,
        ]);
    }
    public function aspirasiBlokir()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $aspirasi = DB::table('aspirations')
            ->join('users', 'users.id', 'aspirations.idUser')
            ->select('users.name', 'users.profile', 'aspirations.*')
            ->where('aspirations.status', 'blocked')
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
        return view('admin.aspirasiBlokir', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'aspirations' => $aspirasi,
        ]);
    }
    public function aspirasiKonfirmasi($id, $confirm)
    {
        if ($confirm == 'batalkan') {
            DB::table('aspirations')->where('id', $id)->update([
                'status' => 'waiting',
            ]);
        } else if ($confirm == 'terima') {
            DB::table('aspirations')->where('id', $id)->update([
                'status' => 'approved',
            ]);
        } else if ($confirm == 'tolak') {
            DB::table('aspirations')->where('id', $id)->update([
                'status' => 'rejected',
            ]);
        } else if ($confirm == 'blokir') {
            DB::table('aspirations')->where('id', $id)->update([
                'status' => 'blocked',
            ]);
        }
        return Response()->json([
            "id" => $id,
        ]);
    }
    public function informasi()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $informasi = DB::table('informations')
            ->join("pictures", 'informations.idDisplay', 'pictures.id')
            ->select('informations.*', 'pictures.name')
            ->orderByDesc('created_at')
            ->get();
        return view('admin.informasi', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'informations' => $informasi,
        ]);
    }
    public function rowInformasi(Request $request)
    {
        $informasi = DB::table('informations')
            ->join("pictures", 'informations.idDisplay', 'pictures.id')
            ->select('informations.*', 'pictures.name')
            ->orderByDesc('created_at')
            ->where('title','like','%'.$request->key.'%')
            ->paginate(10);
        return view('admin.rowInformasi', [
            'informations' => $informasi,
        ]);
    }
    public function forumParticipants($_id)
    {
        $id = base64_decode($_id);
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $forum = DB::table('forums')->where('id', $id)->first();
        return view('admin.adminForumParticipants', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'forum' =>$forum
        ]);
    }
    public function forumParticipantsConfirm()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        return view('admin.adminConfirmParticipants', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
        ]);
    }
    public function forumParticipantsOut(Request $request)
    {
        DB::table('forum_participants')->where('idUser', $request->idUser)->where('idForum', $request->idForum)->delete();
        return response()->json([
            'success'=>true
        ]);
    }
    public function forumParticipantsRow(Request $request,$id)
    {
        $participants = DB::table('forum_participants')
            ->join('users', 'users.id','forum_participants.idUser')
            ->select('users.id','users.name', 'users.alamat', 'tanggalLahir as umur', 'idForum')
            ->where('users.name','like','%'.$request->key.'%')
            ->where('idForum', $id)->paginate(15);
        return view('admin.rowParticipants', [
            'participants'=>$participants
        ]);
    }
    public function forumConfirmParticipantsRow(Request $request)
    {
        $participants = DB::table('forum_participants')
            ->join('users', 'users.id','forum_participants.idUser')
            ->select('users.id','users.name', 'users.alamat', 'tanggalLahir as umur', 'idForum')
            ->where('users.name','like','%'.$request->key.'%')
            ->where('forum_participants.status', 'waiting')
            ->paginate(15);
        return view('admin.rowConfirParticipants', [
            'participants'=>$participants
        ]);
    }
    public function forumConfirmParticipantsProcess(Request $request)
    {
        DB::table('forum_participants')->where('idUser',$request->idUser)->where('idForum',$request->idForum)
        ->update([
            'status'=>$request->status
        ]);
        return Response()->json([
            "success" => true,
        ]);
    }
    public function informasiBaru()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $category = DB::table('category')->get();
        return view('admin.informasiBaru', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'category' => $category,
        ]);
    }
    public function informasiEdit($id)
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $informasi = DB::table('informations')
            ->where('informations.id', $id)
            ->join("pictures", 'informations.idDisplay', 'pictures.id')
            ->select('informations.*', 'pictures.name')
            ->first();
        $category = DB::table('category')->get();
        return view('admin.informasiEdit', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'category' => $category,
            'informasi' => $informasi,
        ]);
    }
    public function deleteInformasi(Request $request)
    {
        $id = $request->id;
        $tempt = explode(',', $id);

        DB::table('informations')->whereIn('id', $tempt)->delete();
        return Response()->json([
            "id" => $id,
        ]);
    }
    public function informasiBaruAdd(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'idDisplay' => 'required',
            'idCategory' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        DB::table('informations')->insert([
            'title' => $request->title,
            'idDisplay' => $request->idDisplay,
            'idCategory' => $request->idCategory,
            'description' => $request->description,
            'content' => $request->content,
        ]);
        return Response()->json([
            "success" => true,
        ]);
    }
    public function informasiEditSave(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'idDisplay' => 'required',
            'idCategory' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);
        $informasi = informations::find($request->id);
        $informasi->title = $request->title;
        $informasi->idDisplay = $request->idDisplay;
        $informasi->idCategory = $request->idCategory;
        $informasi->description = $request->description;
        $informasi->content = $request->content;

        $informasi->save();
        return Response()->json([
            "success" => true,
        ]);
    }
    public function galeri()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $albums = DB::table('albums')
            ->join('pictures', 'albums.idDisplay', 'pictures.id')
            ->select('albums.*', 'pictures.name as picture', 'pictures.location',
                DB::raw("(SELECT COUNT(*) FROM album_picture WHERE idAlbum = albums.id) as count_picture"),
                DB::raw("(SELECT COUNT(*) FROM album_video WHERE idAlbum = albums.id) as count_video")
            )
            ->orderByDesc('created_at')
            ->paginate(9);
        return view('admin.galeri', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'albums' => $albums,
        ]);
    }
    public function galeriContents($id)
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $albums = DB::table('albums')
            ->where('id', $id)
            ->orderByDesc('created_at')
            ->first();
        return view('admin.galericontents', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'idAlbum' => $id,
            'album' => $albums,
        ]);
    }
    public function galeriPicture($id)
    {
        $picture = DB::table('pictures')
            ->join('album_picture', 'pictures.id', 'album_picture.idPicture')
            ->select('pictures.*')
            ->where('album_picture.idAlbum', $id)
            ->orderByDesc('created_at')
            ->get();
        return view('admin.galeriPicture', [
            'pictures' => $picture,
        ]);
    }
    public function galeriVideo($id)
    {
        $picture = DB::table('videos')
            ->join('album_video', 'videos.id', 'album_video.idVideo')
            ->select('videos.*')
            ->where('album_video.idAlbum', $id)
            ->orderByDesc('created_at')
            ->get();
        return view('admin.galeriVideo', [
            'video' => $picture,
        ]);
    }
    public function galeriAddPicture(Request $request)
    {
        $temp = explode(",", $request->idFiles);
        foreach ($temp as $idFiles) {
            $cek = DB::table('album_picture')->where("idPicture", $idFiles)->where("idAlbum", $request->idAlbum)->first();
            if ($cek === null) {
                $files = DB::table('album_picture')
                    ->insert([
                        "idAlbum" => $request->idAlbum,
                        "idPicture" => $idFiles,
                    ]);
            } else {
                continue;
            }

        }
        return Response()->json([
            "success" => true,
        ]);
    }
    public function galeriAddVideo(Request $request)
    {
        $temp = explode(",", $request->idFiles);
        foreach ($temp as $idFiles) {
            $cek = DB::table('album_video')->where("idVideo", $idFiles)->where("idAlbum", $request->idAlbum)->first();
            if ($cek === null) {
                $files = DB::table('album_video')
                    ->insert([
                        "idAlbum" => $request->idAlbum,
                        "idVideo" => $idFiles,
                    ]);
            } else {
                continue;
            }
        }
        return Response()->json([
            "success" => true,
        ]);
    }
    public function dataDiri()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        return view('admin.datadiri', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
        ]);
    }
    public function galeriDeletePicture(Request $request)
    {
        $find = DB::table('album_picture')
            ->where("idPicture", $request->idFiles)
            ->where('idAlbum', $request->idAlbum)
            ->delete();
        return Response()->json([
            "success" => true,
        ]);
    }
    public function galeriDeleteVideo(Request $request)
    {
        $find = DB::table('album_video')
            ->where("idVideo", $request->idFiles)
            ->where('idAlbum', $request->idAlbum)
            ->delete();
        return Response()->json([
            "success" => true,
        ]);
    }

    public function TakeDataID(Request $request)
    {
        $find = DB::table($request->table)
            ->where("id", $request->idFiles)
            ->first();
        return Response()->json($find);
    }
    public function addAlbum(Request $request)
    {
        $temp = DB::table('albums')
            ->insertGetId([
                'name' => $request->fileName,
                'description' => $request->Desc,
                'idDisplay' => $request->idDisplay,
            ]);
        DB::table('album_picture')
            ->insert([
                "idAlbum" => $temp,
                "idPicture" => $request->idDisplay,
            ]);
        return redirect('/admin/galeri');
    }
    public function editAlbum(Request $request)
    {
        $temp = DB::table('albums')->where("id", $request->idAlbum)->update([
            'name' => $request->fileName,
            'description' => $request->Desc,
            'idDisplay' => $request->idDisplay,
        ]);
        DB::table('album_picture')
            ->insertOrIgnore([
                "idAlbum" => $request->idAlbum,
                "idPicture" => $request->idDisplay,
            ]);
        return redirect('/admin/galeri');
    }
    public function deleteAlbum(Request $request)
    {
        $temp = explode(",", $request->idAlbum);

        foreach ($temp as $idAlbum) {
            $find = DB::table('albums')
                ->where("id", $idAlbum)
                ->delete();
        }
        return Response()->json([
            "success" => true,
        ]);
    }
    public function dataWeb()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $rules = data_web::find(15);
        $type = DB::table('data_web')
            ->select('type')
            ->groupBy('type')
            ->orderBy('type')
            ->get();
        return view('admin.dataWeb', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'type' => $type,
            'rules' => $rules,
        ]);
    }
    public function dataWebType($type)
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $rules = data_web::find(15);
        $data = data_web::where('type', $type)->get();
        return view('admin.dataWebType', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'type' => $type,
            'rules' => $rules,
            'data' => $data,
        ]);
    }
    public function dataWebTypeEdit($type, $id)
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $rules = data_web::find(15);
        $data = data_web::find($id);
        return view('admin.dataWebTypeEdit', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'type' => $type,
            'rules' => $rules,
            'data' => $data,
        ]);
    }
    public function dataWebTypeEditSave(Request $request, $type, $id)
    {
        $data = data_web::find($id);
        if ($type == 'links') {
            $data->information = $request->information;
        } else if ($type == 'slider') {
            $data->information = $request->information;
            $data->picture = $request->picture;
        } else if ($type == 'header') {
            $data->name = $request->name;
            $data->information = $request->information;
        } else if ($type == 'text' || $type == 'backgroud') {
            if ($request->hasfile('file')) {
                $file = $request->file('file');
                $name_file = "Lumban-Gaol_File-" . rand() . "-" . time() . "." . $file->getClientOriginalExtension();
                $tujuanUpload = 'uploads/img/AsetWeb';
                $file->move($tujuanUpload, $name_file);
                $data->picture = $name_file;
                if ($request->oldFile != null) {
                    unlink($tujuanUpload . '/' . $request->oldFile);
                }
            }
            $data->name = $request->name;
            $data->information = $request->information;
        } else if ($type == 'logo') {
            if ($request->hasfile('file')) {
                $file = $request->file('file');
                $name_file = $request->oldFile;
                $tujuanUpload = 'uploads/img/AsetWeb';
                $file->move($tujuanUpload, $name_file);
                $data->picture = $name_file;
            }
            $data->name = $request->name;
            $data->information = $request->information;
        }
        $data->save();

        return response()->json([
            'success' => true,
        ]);
    }
    public function uploadFile(Request $request)
    {
        $location = $request->location;
        $name = $request->name;
        $this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $file = $request->file('file');
        if ($name == 'random') {
            $name_file = "Lumban-Gaol_Video-" . rand() . "-" . time() . "." . $file->getClientOriginalExtension();
        } else {
            $name_file = $name . "." . $file->getClientOriginalExtension();
        }
        $tujuanUpload = $location;
        $file->move($tujuanUpload, $name_file);
        return Response()->json([
            "name_file" => $name_file,
        ]);
    }
    public function deleteFile(Request $request)
    {
        $location = $request->location;
        $name = $request->name;
        unlink($location . '/' . $name);
        return Response()->json([
            "name_file" => $name,
        ]);
    }
    public function newCategory(Request $request)
    {
        if (DB::table('category')->where('category', '=', $request->category)->first()) {
            return Response()->json([
                "error" => 'Duplicate Data',
            ]);
        } else {
            $id = DB::table('category')->insertGetId([
                'category' => $request->category,
            ]);
        }
        return Response()->json([
            "id" => $id,
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
    public function forum()
    {
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        return view('admin.adminForum', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
        ]);
    }
    public function paginateForum(Request $request)
    {
        $forums = DB::table('forums')
            ->select('forums.*',
                DB::raw("(SELECT COUNT(*) FROM messages a WHERE (SELECT idUser FROM message_reads WHERE idMessage=a.id AND idUser =" . Auth::user()->id . ") IS NULL AND idForum = forums.id AND idUser != " . Auth::user()->id . ") as counts"))
            ->orderByDesc('updated_at')
            ->where('name','like', '%'.$request->key.'%')
            ->paginate(8);
        return view('admin.rowForums',[
            'forums'=>$forums
        ]);
    }
    public function forumMessages($_id)
    {
        $id = base64_decode($_id);
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $forums = DB::table('forums')->where('id', $id)->first();
        $messages = DB::table('messages')->where('idForum', $id)->get();
        return view('admin.adminMessage', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'id' => $id,
            'forums' => $forums,
            'messages' => $messages,
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
        return view('admin.rowMessages', [
            'messages' => $messages,
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
        $data = ['forum'=>$request->idForum];
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
        $data = ['forum'=>$temp->idForum];
        $pusher->trigger('my-channel', 'my-event', $data);
        return response()->json([
            'success' => true,
        ]);
    }

    public function forumDelete($id){
        $temp = DB::table('forums')->where('id', $id)->first();
        if($temp->logo != 'LumbanGaol-LogoForum-Default.jpg'){
            unlink('uploads/img/Forums/Logo/'.$temp->logo);
        }
        DB::table('forums')->where('id', $id)->delete();
        return response()->json([
            'success' => true,
        ]);
    }
    public function forumNew(){
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        return view('admin.adminForumCreate', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
        ]);
    }
    public function forumEdit($_id){
        $id = base64_decode($_id);
        $logoweb = data_web::find(6);
        $logolembaga = data_web::find(5);
        $crfoot = data_web::find(14);
        $forum = DB::table('forums')->where('id', $id)->first();
        return view('admin.adminForumEdit', [
            'logoweb' => $logoweb,
            'logolembaga' => $logolembaga,
            'crfoot' => $crfoot,
            'forum'=>$forum
            ]);
    }
    public function forumNewStore(Request $request){
        $name_file = 'LumbanGaol-LogoForum-Default.jpg';
        if($request->hasFile('file')){
            $file = $request->file('file');
            $name_file = "Lumban-Gaol_LogoForum-" . rand() . "-" . time() . "." . $file->getClientOriginalExtension();
            $tujuanUpload = 'uploads/img/Forums/Logo';
            $file->move($tujuanUpload, $name_file);
        }

        DB::table('forums')->insert([
            'name'=>$request->name,
            'description'=>$request->description,
            'logo'=>$name_file
        ]);
        return response()->json([
            'success' => true,
        ]);
    }
    public function forumEditStore(Request $request){
        $name_file = $request->oldLogo;
        if($request->hasFile('file')){
            if($name_file !== 'LumbanGaol-LogoForum-Default.jpg'){
                unlink('uploads/img/Forums/Logo/'.$name_file);
            }
            $file = $request->file('file');
            $name_file = "Lumban-Gaol_LogoForum-" . rand() . "-" . time() . "." . $file->getClientOriginalExtension();
            $tujuanUpload = 'uploads/img/Forums/Logo';
            $file->move($tujuanUpload, $name_file);
        }

        DB::table('forums')->where('id', $request->idForum)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'logo'=>$name_file
        ]);
        return response()->json([
            'success' => true,
        ]);
    }
}
