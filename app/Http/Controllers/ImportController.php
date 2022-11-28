<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function import(Request $request){
        $files = File::where('documents', '!=', null);

        if($request->has('documentName'))
        {
            $files->where('documentName', 'LIKE',  "%".$request->query('documentName')."%");

       }
        $files = $files->get(['documentName', 'documents', 'description']);


        return view ('/posts/import', ['files'=>$files]);
    }
    public function file_path(Request $request){
       $file_path =  $request->file_path;
    //    dd($file_path);
       return Storage::download($file_path);


    }
    public function export(){
        $datas = Data::all();

        return view ('/posts/export', ['datas'=>$datas]);
    }
    public function import_file(Request $request){
       request()->validate([
            'file' => 'required|mimes:jpeg,jpg,png,pdf',
       ]);

       $files = File::where('documents', '!=', null);
       $path = request('file')->store('files');
       $fileName = request('file')->getClientOriginalName();
       $query = File::create(['documents' =>$path,
                              'description' =>$request->description,
                              'documentName' =>$fileName]);

                if($query){
                    return redirect()->back()->with('success', 'Importation réussi avec succès' );
                }else {
                    return redirect()->with('fail', 'Une erreur s\'est produite');
                }


    }
}
