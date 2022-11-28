<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('/admins/welcome');
    }
    public function dashboard2(){
        return view('/admins/dashboard');
    }
    public function import(){
        return view ('/posts/import');
    }
}
