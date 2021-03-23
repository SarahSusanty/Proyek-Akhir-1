<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileManagerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['admin', 'verified']);
    }
    public function index()
    {
        return view('FileManager.index');
    }
    public function video()
    {
        $files = DB::table('videos')
            ->orderByDesc('created_at')
            ->get();
        return view('FileManager.video', [
            'files' => $files,
        ]);
    }
    public function picture()
    {
        $files = DB::table('pictures')
            ->orderByDesc('created_at')
            ->get();
        return view('FileManager.gambar', [
            'files' => $files,
        ]);
    }
    public function pictureStore(Request $request)
    {
        $this->validate($request, [
            'foto.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->hasfile('foto')) {
            foreach ($request->file('foto') as $file) {
                $name_file = "Lumban-Gaol_Foto-".rand()."-". time() . "." . $file->getClientOriginalExtension();
                $tujuanUpload = "uploads/img/Album";
                $file->move($tujuanUpload, $name_file);

                DB::table('pictures')->insert([
                    'name' => $name_file,
                    'location' => "/" . $tujuanUpload . "/",
                ]);

            }
            return Response()->json([
                "success" => true,

            ]);
        }
        return Response()->json([
            "success" => false,
            "file" => '',
        ]);
    }
    public function videoStore(Request $request)
    {
        $this->validate($request, [
            'video' => 'required|mimes:mp4,mov,ogg',
        ]);
        if ($request->hasfile('video')) {
            $file = $request->file('video');
            $name_file = "Lumban-Gaol_Video-".rand()."-". time() . "." . $file->getClientOriginalExtension();
            $tujuanUpload = "uploads/video/Album";
            $file->move($tujuanUpload, $name_file);

            DB::table('videos')->insert([
                'name' => $name_file,
                'location' => "/" . $tujuanUpload . "/",
            ]);
            return Response()->json([
                "success" => true,

            ]);
        }
        return Response()->json([
            "success" => false,
            "file" => '',
        ]);
    }
    public function pictureDelete(Request $request)
    {
        $data = DB::table($request->table)->where('id', $request->idFiles)->first();
        $location = substr($request->location, 1, strlen($request->location) - 1);
        unlink("uploads/img/Album/" . $data->name);
        DB::table($request->table)->where('id', $request->idFiles)->delete();
        return Response()->json([
            "success" => true,
        ]);
    }
    public function videoDelete(Request $request)
    {
        $data = DB::table($request->table)->where('id', $request->idFiles)->first();
        $location = substr($request->location, 1, strlen($request->location) - 1);
        unlink("uploads/video/Album/" . $data->name);
        DB::table($request->table)->where('id', $request->idFiles)->delete();
        return Response()->json([
            "success" => true,
        ]);
    }
}
