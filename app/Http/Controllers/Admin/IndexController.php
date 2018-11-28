<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('mutual.admins',['title'=>'淘鞋吧后台主页']);
    }
}
