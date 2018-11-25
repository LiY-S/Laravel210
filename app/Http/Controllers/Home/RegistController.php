<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistController extends Controller
{
    //
    public function index()
    {
        return view('home.regist', [
            'title' => '淘鞋吧注册'
        ]);
    }
    public function doregist(Request $request)
    {
        $data = $request ->all();
        dd($data);
    }
}
