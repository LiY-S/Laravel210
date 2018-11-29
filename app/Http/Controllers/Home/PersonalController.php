<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    //
    public function personal()
    {
        return view('home.personal.personal',[
            'title' => '个人中心',
        ]);
    }

    public function upload(Request $request)
    {
        $data = $_POST['formData'];
        dump($data);
        echo 1;
    }

}
