<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function data(){
        return view('/posts/data');
    }

    public function store(Request $request )
    {

        request()->validate([
            'name' => 'required',
            'libellle' => 'required',
            'entreprise' => 'required',
            'destinataire' => 'required',
        ]);

        $query = DB::table('data')
                ->insert([
            'name' => $request->name,
            'libellle' => $request->libellle,
            'entreprise' => $request->entreprise,
            'destinataire' => $request->destinataire,
       ]);
       if(!$query){
        return ('erreur');
       }else{
        return redirect('/posts/export');

       }

    }
}
